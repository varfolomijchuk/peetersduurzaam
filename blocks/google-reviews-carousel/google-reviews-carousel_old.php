<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'google-reviews-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
$space_bottom  = get_field('space_bottom');
?>
<section style="background-color:<?php echo get_field('settings')['background_color']; ?>" class="<?php echo esc_attr($class_name); ?> <?php echo get_field('settings')['item_color'] ?> <?php echo $space_bottom ? ' mb-4 pb-4' : null; ?>">
    <div class="container">
        <div class="block-header">
            <h5 class="subtitle"><?php echo get_field('header')['subtitle'] ?></h5>
            <div class="title-reviews-wrapper d-block d-lg-flex">
                <h2 class="title"><?php echo get_field('header')['title'] ?></h2>
                <div class="google-reviews ps-lg-5">
                    <div class="to-g-counter"><?php echo do_shortcode('[trustindex no-registration=google]') ?></div>
                </div>
            </div>
        </div>
        <div class="google-review-carousel-wrapper d-flex gap-3 <?php echo get_field('settings')['item_color'] ?>">
            <?php echo do_shortcode('[grw id="2156"]'); ?>
        </div>
    </div>
</section>
<script>
    $('.wp-google-reviews').slick({
        infinite: true,
        draggable: true,
        slidesToShow: <?php echo get_field('settings')['slides_to_show'] ?>,
        slidesToScroll: 1,
        variableWidth: false,
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
</script>