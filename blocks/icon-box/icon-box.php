<?php

$class_name = 'icon-box';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container <?php echo get_field('header')['title'] ? esc_attr('mt-4') : ''; ?>">
        <div class="row">
            <div class="col-xl-6 col-12 left-block order-0">
                <?php
                if (get_field('header')['subtitle']) :?>
                    <h5 class="subtitle"><?php echo get_field('header')['subtitle']; ?></h5>
                <?php endif; ?>
                <?php if (get_field('header')['title']) : ?>
                    <h2 class="title"><?php echo get_field('header')['title']; ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-xl-6 col-12 d-flex align-items-end justify-content-center justify-content-sm-end justify-content-md-start justify-content-lg-end  order-3 order-sm-1">
                <?php
                if (get_field('header')['button']['caption']) :?>
                    <a class="p-btn-secondary mb-4"
                       href="<?php echo get_field('header')['button']['link']; ?>"><?php echo get_field('header')['button']['caption']; ?></a>
                <?php endif; ?>
            </div>
            <div class="col-xl-12 <?php echo get_field('header')['title']? 'mt-5' : '' ?> order-2">
                <div class="row <?php echo get_field('carousel')? 'icon-carousel-wrapper' : ''; ?>">

                    <?php

                    if (have_rows('icon_box_item')):

                        $num_of_icons = count(get_field('icon_box_item'));
                        while (have_rows('icon_box_item')) : the_row();
                            $block_width_class = 'col-lg-' . 12 / $num_of_icons; ?>
                            <div class="icon-box-item  <?php echo get_field('carousel')? '' : $block_width_class  ?>">
                                <div class="icon-box-head">
                                    <img class="icon-box-icon" src="<?php echo get_sub_field('icon') ?>"
                                         alt="Our Advantages">
                                    <h5 class="icon-box-title"><?php echo get_sub_field('title') ?></h5>
                                </div>

                                <?php if (get_sub_field('body_text')): ?>
                                    <div class="icon-box-body">
                                        <p class="icon-box-text"><?php echo get_sub_field('body_text') ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>


                        <?php endwhile;


                    else :
                        // Do something...
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // $('.icon-carousel-wrapper').slick({
    //     autoplay: true,
    //     swipeToSlide: true,
    //     pauseOnHover: false,
    //     pauseOnFocus: false,
    //     arrows: false,
    //     infinite: true,
    //     slidesToShow: 3,
    //     responsive: [
    //         {
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 1,
    //                 slidesToScroll: 1,
    //
    //             }
    //         }
    //
    //     ]
    // });
</script>
