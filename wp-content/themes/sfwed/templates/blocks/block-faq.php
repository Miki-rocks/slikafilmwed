<?php
$data = get_fields();

if (!$data) {
	$data = $args;
}

if (!array_filter($data)) {
	return;
}

$sidebar = array();

$baseClass = 'faq';
?>

<section class="bb-section <?php echo $baseClass; ?> py-6 py-lg-13 my-8 my-lg-10" data-js="accordion" <?php echo (isset($block['anchor']) && !empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '' ; ?>>
    <div class="container">
        <?php if ($data['title'] || $data['content']) { ?>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <?php if ($data['title']) { ?>
                        <h2 class="font-size-5  mb-4"><?php echo $data['title']; ?></h2>
                    <?php } ?>
                    <?php if ($data['content']) { ?>
                        <div class="">
                            <?php echo $data['content']; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if(!empty($data['accordion_group'])) { ?>
            <div class="row bg-el--left light">
                <div class="col-12 col-lg-7 offset-lg-1">
                    <?php foreach ($data['accordion_group'] as $group) { ?>
                        
                        <div class="<?php echo $baseClass; ?>__item position-relative mt-4 mb-6 py-6 py-lg-0" id="<?php echo sfwed_make_id($group['accordion_title']); ?>">
                            <div class="<?php echo $baseClass; ?>__item-inner">
                                <div class="accordion">
                                    <h3 class="accordion__title "><?php echo $group['accordion_title']; ?></h3>
                                    <?php foreach ($group['accordion_items'] as $item) { ?>
                                        <div class="accordion__item">
                                            <button aria-expanded="false">
                                                <span class="accordion__item-title ">
                                                    <?php echo $item['title']; ?>
                                                </span>
                                                <span class="accordion__icon" aria-hidden="true"></span>
                                            </button>
                                            <div class="accordion__content ">
                                                <p><?php echo $item['content']; ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
