<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'text-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section style='background-color:<?php echo get_field('settings')['background_color'] ?>' class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="block-header">
            <h5 class="subtitle"><?php echo get_field('header')['subtitle'] ?></h5>
            <h2 class="title"><?php echo get_field('header')['title'] ?></h2>
        </div>
        <div class="text-carousel-wrapper d-flex">
            <?php
            if (have_rows('carousel_item')):
                while (have_rows('carousel_item')) : the_row(); ?>
                <div class="single-carousel-item-wrapper">
                    <div class="single-carousel-item">
                        <div class="text-carousel-head">
                            <h5 class="text-carousel-title"><?php echo get_sub_field('title') ?></h5>
                        </div>

                        <?php if (get_sub_field('content')): ?>
                            <div class="text-carousel-body">
                                <p class="text-carousel-text"><?php echo get_sub_field('content') ?></p>
                            </div>
                        <?php endif; ?>
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
<script>
    $('.text-carousel-wrapper').slick({
        autoplay: true,
        infinite: true,
        draggable: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,

                }
            }

        ]
    });
</script>