<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'single-item-slider';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="block-header">
            <h5 class="subtitle <?php echo get_field('header')['header_align'] ?>"><?php echo get_field('header')['subtitle'] ?></h5>
            <h2 class="title <?php echo get_field('header')['header_align'] ?>"><?php echo get_field('header')['title'] ?></h2>
        </div>
        <div class="single-item-slider-container d-flex gap-3">
            <?php if(have_rows('slider_item')):
                while(have_rows('slider_item')) : the_row(); ?>
                    <div class="one-slide d-block d-lg-flex">
                        <div class="carousel-img-wrapper">
                            <img src="<?php echo get_sub_field('image') ?>" alt="Carousel Image">
                        </div>

                        <div class="text-content">
                            <h4><?php echo get_sub_field('title') ?></h4>
                            <p><?php echo get_sub_field('description') ?></p>
                        </div>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>


        </div>

    </div>
</section>
<script>
    // if ($('.single-item-slider').length) {
    //     $('.single-item-slider .single-item-slider-container').each((id, el) => {
    //         $(el).slick({
    //             autoplay: false,
    //             dots: true,
    //             customPaging : function(slider, i) {
    //                 i++;
    //                 var thumb = $(slider.$slides[i]).data();
    //                 return '<a>'+i+'</a>';
    //             },
    //             arrows: true,
    //             prevArrow: "<button class='simple-prev '>Vorige</button>",
    //             nextArrow: "<button class='simple-next '>Volgende</button>",
    //             infinite: true,
    //             draggable: true,
    //             slidesToShow: 1,
    //             slidesToScroll: 1,
    //         });
    //     });
    // }
    // $('.single-item-slider-container').slick({
    //     autoplay: false,
    //     dots: true,
    //     customPaging : function(slider, i) {
    //         i++;
    //         var thumb = $(slider.$slides[i]).data();
    //         return '<a>'+i+'</a>';
    //     },
    //     arrows: true,
    //     prevArrow: "<button class='simple-prev '>Vorige</button>",
    //     nextArrow: "<button class='simple-next '>Volgende</button>",
    //     infinite: true,
    //     draggable: true,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    // });
	
	
    $(document).ready(function() {
        if ($(window).width() < 1200) {
            var maxHeight = 0;
            $('.single-item-slider-container .one-slide').each(function() {
                var height = $(this).height();
                maxHeight = Math.max(maxHeight, height);
            });

            $('.single-item-slider-container .one-slide').height(maxHeight);
        }
    });
</script>