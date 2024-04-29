<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'logo-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>">

            <div class="container carousel-wrapper" data-to-show="<?php echo get_field('settings')['slides_to_show']; ?>">
                <?php if(have_rows('images')):
                    while(have_rows('images')) : the_row(); ?>
                        <div class="carousel-img-container">
                            <img src="<?php echo get_sub_field('image') ?>" alt="Carousel Image">
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

</section>
<script>
    //$('.carousel-wrapper').slick({
    //    autoplay: true,
    //    swipeToSlide: true,
    //    pauseOnHover: false,
    //    pauseOnFocus: false,
    //    arrows: false,
    //    infinite: true,
    //    slidesToShow: <?php //echo get_field('settings')['slides_to_show'] ?>//,
    //    variableWidth: true,
    //});
    if ($('.logo-carousel').length) {
        $('.logo-carousel .carousel-wrapper').each((id, el) => {
            $(el).slick({
                autoplay: true,
                swipeToSlide: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                infinite: true,
                slidesToShow: <?php echo get_field('settings')['slides_to_show'] ?>,
                variableWidth: true,
            });
        });
    }
</script>