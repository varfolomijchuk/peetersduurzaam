<?php

$class_name = 'free-consultation';
if (!empty($block['className'])) {
    $class_name .=" " . $block['className'];
}
$custom_class  = get_field('custom_class');
?>

<section class="<?php echo esc_attr($class_name); ?> <?php echo $custom_class ?: null; ?>">
    <div class="container">
         <div class="d-flex flex-column flex-md-row align-items-center justify-content-between justify-content-lg-start">
            <h5 class="heading mb-4 mb-md-0"><?php echo get_field('heading') ?></h5>
            <a class="<?php echo get_field('button')['button_style'] ?>" href="<?php echo get_field('button')['link'] ?>"><?php echo get_field('button')['caption'] ?></a>
            <?php

            ?>
        </div>
    </div>
</section>
