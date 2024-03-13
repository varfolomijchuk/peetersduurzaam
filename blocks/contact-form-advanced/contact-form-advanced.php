<?php

$class_name = 'contact-form-advanced';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
$left_block = get_field('left_block')['custom_text'];
$right_block = get_field('right_block');
$adjust_top_margin  = get_field('adjust_top_margin');
?>
<section style="background-color: <?php echo get_field('settings')['background_color'] ?>"
         class="<?php echo esc_attr($class_name); ?><?php echo $adjust_top_margin ? ' adjust-top-margin' : null; ?>">
    <div >
    </div>
    <div class="container">
        <div class="row">

            <div class="order-2 order-xl-0 col-lg-6 d-flex flex-column justify-content-around">
                <?php if (get_field('left_block')['left_block_type'] == "custom_text"): ?>
                    <div class="text-content-wrapper pt-5">
                        <h5 class="contact-subtitle"><?php echo $left_block['subtitle'] ?></h5>
                        <h2 class="contact-title"><?php echo $left_block['title'] ?></h2>
                        <p class="contact-description"><?php echo $left_block['description'] ?></p>
                        <div class="button-wrapper">
                            <a class="<?php echo $left_block['button']['style'] ?>"
                               href="<?php echo $left_block['button']['link'] ?>"><?php echo $left_block['button']['caption'] ?></a>

                        </div>
                    </div>
                <?php else: ?>
                <div class="reviews-wrapper pb-3 d-block d-md-flex gap-3 justify-content-md-between">
                    <div class="heading">
                        <h6 class="contact-subtitle">Ervaring van onze klanten</h6>
                        <h5 class="contact-title">Lees enkele ervaringen</h5>
                    </div>
                    <div class="google-review-wrapper">
                        <?php echo do_shortcode('[trustindex no-registration=google]') ?>
                    </div>

                </div>
                <div class="contact-google-reviews-carousel">
                    <?php echo do_shortcode( '[grw id="1314"]' ); ?>
                </div>
                <?php endif; ?>


            </div>

            <div class="order-1 col-lg-6">
                <div class="contact-form-wrapper">
                    <h4 class="contact-form-title"><?php echo $right_block['title']; ?></h4>
                    <p class="contact-form-description"><?php echo $right_block['description']; ?></p>
                    <?php
                    echo do_shortcode(get_field('right_block')['wpforms_shortcode']);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <script>
        $('.contact-google-reviews-carousel .wp-google-reviews').slick({
            infinite: true,
            draggable: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            variableWidth: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
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

        let upload_title = document.querySelector('span.modern-title');
        if( upload_title ){
            upload_title.innerText ="<?php echo __('Sleep je CV om te uploaden of selecteer je CV'); ?>";
        }
		let countReviews = $('.ti-header.source-Google .ti-text strong').text(),
        	rating = $('.ti-header.source-Google .ti-rating').text();
    	$('.ti-header.source-Google .ti-text strong').text(countReviews.replace(/recensie/g, 'review'));
    	$('.ti-header.source-Google .ti-rating').text(rating + ' / 5');
    </script>
</section>
