<?php

$class_name = 'partners';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="row">
            <?php
            $settings = get_field('settings');
            $bgrnd_color = $settings['background_color'];
            $img_style = $settings['image_style'] == 'inherit' ? 'display: block; width: inherit; margin: 20px auto' : 'width: 100%';
            if (have_rows('partner_item')):

                // Loop through rows.
                while (have_rows('partner_item')) : the_row(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a style="background-color: <?php echo $bgrnd_color; ?>" class="partners-item"
                           href="<?php echo get_sub_field('link') ?>">
                            <?php if (get_sub_field('image')): ?>
                                <div class="top-image-wrapper d-flex align-items-center">
                                    <img style="<?php echo $img_style; ?>" class="partner-img"
                                         src="<?php echo get_sub_field('image') ?>"
                                         alt="Product Overview">
                                </div>
                            <?php endif; ?>

                            <h5 class="partner-title"><?php echo get_sub_field('title') ?></h5>
                            <p class="partner-description"><?php echo get_sub_field('description') ?></p>
                            <div class="more-info"><span>Bekijk de website</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16"
                                     fill="none">
                                    <path d="M5.68248e-07 8L20 8M20 8L13.5 1.5M20 8L13.5 14.5" stroke="#36A9E1"
                                          stroke-width="1.6"/>
                                </svg>
                            </div>
                        </a>

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
