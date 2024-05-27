<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

  <meta name="theme-color" content="#DFF9EA" media="(prefers-color-scheme: light)">
  <meta name="theme-color" content="#007EFF" media="(prefers-color-scheme: dark)">

  <?php if ( SFWED_ENV == 'production' ) { ?>
    <!-- Google tag (gtag.js) -->
    
  <?php } ?>
</head>
