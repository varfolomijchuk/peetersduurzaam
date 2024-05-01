<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cpt-carousel blog-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="cpt-carousel-wrapper blog-carousel-wrapper d-flex gap-3">
            <?php
            $args = array(
                'post_type' => get_field('custom_post_type'),
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="single-carousel-item">
                    <?php if ($args['post_type']!='post'): ?>
                    <div class="taxonomy-btns"><a class="btn-taxonomy" href="#">Deurne</a><a class="btn-taxonomy" href="#">Zonnepanelen</a></div>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?><?php the_title('<h4>','</h4>'); ?></a>

                </div>

            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
<script>
    // $('.cpt-carousel-wrapper').slick({
    //     infinite: true,
    //     draggable: true,
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     variableWidth: false,
    // });

    // if ($('.cpt-carousel').length) {
    //     $('.cpt-carousel .cpt-carousel-wrapper').each((id, el) => {
    //         $(el).slick({
    //             infinite: true,
    //             draggable: true,
    //             slidesToShow: 3,
    //             slidesToScroll: 1,
    //             variableWidth: false,
    //         });
    //     });
    // }
</script>