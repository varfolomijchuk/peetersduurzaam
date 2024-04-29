<?php

$class_name = 'products-overview';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <?php if(get_field('header')['subtitle'] || get_field('header')['title']): ?>
        <div class="block-header">

                <h5 class="subtitle <?php echo get_field('header')['header_align'] ?> text-left"><?php echo get_field('header')['subtitle'] ?></h5>
                <h2 class="title <?php echo get_field('header')['header_align'] ?> text-left"><?php echo get_field('header')['title'] ?></h2>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php
            $settings = get_field('settings');
            $bgrnd_color = $settings['background_color'];
            $img_style = $settings['image_style'] == 'inherit' ? 'display: block; width: inherit; margin: 20px auto' : 'width: 100%';

            if (have_rows('product_overview_item')):
                // Loop through rows.
                while (have_rows('product_overview_item')) : the_row(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-overview-item">
                            <a style="background-color: <?php echo $bgrnd_color; ?>" class="product-overview-item"
                               href="<?php echo get_sub_field('product_link') ? get_sub_field('product_link')['url'] : '#'; ?>">
                                <?php if (get_sub_field('product_overview_image')): ?>
                                    <div class="top-image-wrapper">
                                        <img style="<?php echo $img_style; ?>" class="product-overview-img"
                                             src="<?php echo get_sub_field('product_overview_image') ?>"
                                             alt="Product Overview">
                                    </div>
                                <?php endif; ?>

                                <h5 class="product-overview-title"><?php echo get_sub_field('product_overview_title') ?></h5>
                                <p class="product-overview-description"><?php echo get_sub_field('product_overview_description') ?></p>
                                <?php if (get_sub_field('product_link')) : ?>
                                    <div class="more-info">
                                        <span>Meer Informatie</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16"
                                             fill="none">
                                            <path d="M5.68248e-07 8L20 8M20 8L13.5 1.5M20 8L13.5 14.5" stroke="#36A9E1"
                                                  stroke-width="1.6"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>

                    </div>


                <?php endwhile;

            // No value.
            else :
                // Do something...
            endif;
            ?>
        </div>
    </div>
</section>
