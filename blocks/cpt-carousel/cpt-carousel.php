<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cpt-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>
<section class="<?php echo get_field('custom_post_type') . "-type " . esc_attr($class_name); ?><?php echo is_front_page() ? ' home-page' : ''; ?>" style="background-color: <?php echo get_field('settings')['background_color'] ?>">
    <div class="container">
        <div class="block-header d-flex justify-content-between align-items-end">
            <div class="left-block">
                <h5 class="subtitle"><?php echo get_field('header')['subtitle'] ?></h5>
                <h2 class="title"><?php echo get_field('header')['title'] ?></h2>
            </div>
            <div class="right-block">
                <a class="p-btn-sub" href="<?php echo get_field('header')['button']['link'] ?>"><?php echo get_field('header')['button']['title'] ?></a>
            </div>

        </div>
        <div class="cpt-carousel-wrapper-<?php echo get_field('custom_post_type') ?> d-flex gap-3">
            <?php
            $args = array(
                'post_type' => get_field('custom_post_type'),
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php if ($args['post_type'] != 'post') : ?>
                        <div class="single-carousel-item">

                            <div class="taxonomy-btns">
                                <?php if ($tags = get_the_tags()) : ?>
                                    <?php foreach ($tags as $tag) : ?>
                                        <a class="btn-taxonomy <?php echo $tag->slug ?>" href="#">
                                            <?php echo $tag->name; ?>
                                        </a>
                                <?php endforeach;
                                endif ?>
                                <?php if ($categories = get_the_category()) : ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                                            <?php echo $category->name; ?>
                                        </a>
                                <?php endforeach;
                                endif ?>
                            </div>

                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?>
                                <div class="overlay overlay-project"></div>
                                <?php the_title('<h4>', '</h4>'); ?>
                            </a>

                        </div>
                    <?php else : ?>
                        <div class="single-blog-carousel-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?>

                                <?php the_title('<h5 class="blog-title">', '</h5>'); ?>
                                <p class="blog-excerpt"><?php echo get_the_excerpt(); ?> </p>
                                <div class="more-info"><span>Meer Informatie</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                                        <path d="M5.68248e-07 8L20 8M20 8L13.5 1.5M20 8L13.5 14.5" stroke="#36A9E1" stroke-width="1.6" />
                                    </svg>
                                </div>
                            </a>

                        </div>

                    <?php endif; ?>

            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
        <div class="all-posts d-md-none d-flex justify-content-center">
            <a class="p-btn-sub" href="<?php echo get_field('header')['button']['link'] ?>"><?php echo get_field('header')['button']['title'] ?></a>
        </div>
    </div>
</section>
<script>
    //$('.cpt-carousel-wrapper-<?php //echo get_field('custom_post_type') ?>//').slick({
    //    infinite: true,
    //    draggable: true,
    //    slidesToShow: 3,
    //    slidesToScroll: 1,
    //    responsive: [{
    //            breakpoint: 1024,
    //            settings: {
    //                slidesToShow: 2,
    //                slidesToScroll: 1
    //            }
    //        },
    //        {
    //            breakpoint: 480,
    //            settings: {
    //                slidesToShow: 1,
    //                slidesToScroll: 1
    //            }
    //        }
    //
    //    ]
    //
    //});
    if ($('.cpt-carousel').length) {
        $('.cpt-carousel-wrapper-<?php echo get_field('custom_post_type') ?>').each((id, el) => {
            $(el).slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }

                ]
            });
        });
    }
</script>