<?php

/**
 * BEM style walker Class.
 */
class sfwed_Walker extends Walker_Nav_Menu {

  /**
   * Just a construct.
   *
   * @param string $css_class_prefix - Prefix.
   */
  public function __construct( $css_class_prefix ) {
    $this->css_class_prefix = $css_class_prefix;
  }

  /**
   * Traverse elements to create list from elements.
   *
   * @param object $element           Data object.
   * @param array  $children_elements List of elements to continue traversing (passed by reference).
   * @param int    $max_depth         Max depth to traverse.
   * @param int    $depth             Depth of current element.
   * @param array  $args              An array of arguments.
   * @param string $output            Used to append additional content (passed by reference).
   */
  public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

  /**
   * Starts the list before the elements are added.
   *
   * @param string $output Used to append additional content (passed by reference).
   * @param int    $depth  Depth of the item.
   * @param array  $args   An array of additional arguments.
   */
  public function start_lvl( &$output, $depth = 1, $args = null ) {
    if ( is_array( $args ) ) {
      $args = (object) $args;
    }
    $real_depth  = $depth + 1;
    $indent      = str_repeat( "\t", $real_depth );
    $prefix      = $this->css_class_prefix;
    $classes     = [ $prefix . '__sub-menu' ];
    $class_names = implode( ' ', $classes );
    $output     .= "\n" . $indent . '<ul class="' . $class_names . ' depth-' . $real_depth . '">' . "\n";
  }

  /**
   * Add main/sub classes to li's and links
   *
   * @param string $output            Used to append additional content (passed by reference).
   * @param object $item              The data object.
   * @param int    $depth             Depth of the item.
   * @param object $args              An object of additional arguments.
   * @param int    $id                ID of the current item.
   */
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    if ( is_array( $args ) ) {
      $args = (object) $args;
    }
    global $wp_query;
    $indent       = ( $depth > 0 ? str_repeat( '', $depth ) : '' ); /** Code indent */
    $prefix       = $this->css_class_prefix;
    $item_classes = [
      'item_class'          => $prefix . '__item',
      'parent_class'        => !empty($args->has_children) ? $prefix . '__item--is-parent' : '',
      'active_page_class'   => in_array( 'current-menu-item', $item->classes, true ) ? $prefix . '__item--is-active' : '',
      'active_parent_class' => in_array( 'current-menu-parent', $item->classes, true ) ? $prefix . '__item--is-parent-of-active' : '',
      'item_id_class'       => $prefix . '__item--' . $item->object_id, /** if you need item specific class */
      // 'admin_class'         => implode( ' ', $item->classes),
    ];

    $class_string = implode( '  ', array_filter( $item_classes ) );
    $output      .= $indent . '<li class="' . $class_string . '">';
    $link_classes = [
      'item_link' => $prefix . '__link ' . implode( ' ', $item->classes),
    ];

    $link_class_string = implode( '  ', array_filter( $link_classes ) );
    $link_class_output = 'class="' . $link_class_string . '"';

    $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

    $crtica = '';
    if ($depth > 1) {
      $crtica = '- ';
    }

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . ' ' . $link_class_output . '><span>' .$crtica;
    $item_output .= $args->link_before;
    $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= $args->link_after;
    $item_output .= $args->after;
    $item_output .= '</span>';
    $item_output .= !empty($args->has_children) ? '<span class="icon">' . sfwed_render_svg('icon-chevron-down', 'icons') . '</span>' : '';
    $item_output .= '</a>';

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
