<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'image-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="container-fluid carousel-wrapper">
            <?php if(have_rows('images')):
                while(have_rows('images')) : the_row(); ?>
                    <div class="carousel-img-container">
                        <img src="<?php echo get_sub_field('image') ?>" alt="Carousel Image">
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>
<script>
    $('.carousel-wrapper').slick({
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 3,
        slidesToScroll: 1,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    centerMode: false,
                    centerPadding: '10px',
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: false,
                }
            },
        ]
    });
</script>