<?php
/*
Template Name: Basic Blog Template
*/
 get_header();
$content = get_the_content();
 ?>

<main class="single-post">
    <section class="single-post__hero d-flex">
        <div class="hero-background">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
        </div>
        <div class="container d-flex align-items-center">
            <div class="row">
                <div class="col">
                    <div class="single-post__hero__title-wrapper">
                        <h1><?php echo get_the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($content) : ?>
        <section class="single-post__main-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                      <?php echo wpautop($content); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!--    <section  class="single-post__image-text">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-12 col-lg-6">-->
<!--                    <div class="text-wrapper">-->
<!--                        --><?php //echo wp_trim_words(get_the_content(), 55); ?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-12 col-lg-6 order-1">-->
<!--                    <div class="image-wrapper">-->
<!--                        --><?php //echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <?php if ($flex_content = get_field('flexible_content')) : ?>
        <?php foreach ($flex_content as $key => $layout) : ?>
            <?php show_template('flexible_content/' . $layout['acf_fc_layout'], $layout, 'template-parts'); ?>
        <?php endforeach; ?>
    <?php endif; ?>
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 mega-block">-->
<!--              --><?php //echo get_the_content(); ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <section class="free-consultation">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between justify-content-lg-start">
                <h5 class="heading mb-4 mb-md-0"><?php _e('Plan een gratis adviesgesprek in', 'peeters') ?></h5>
                <a class="p-btn-secondary" href="#"><?php _e('Gratis adviesgesprek', 'peeters') ?></a>
                <?php

                ?>
            </div>
        </div>
    </section>
    <section class="contact-form-advanced bgrnd-fluo-green">
        <div class="container">
            <div class="row">

                <div class="order-2 order-xl-0 col-lg-6 d-flex flex-column justify-content-around">
                    <div class="reviews-wrapper pb-3 d-block d-md-flex gap-3 justify-content-md-between">
                            <div class="heading">
                                <h6 class="contact-subtitle">Ervaring van onze klanten</h6>
                                <h5 class="contact-title">Lees enkele ervaringen</h5>
                            </div>
                            <div class="google-review-wrapper">
                                <!--                        <img src="/wp-content/uploads/2023/10/google-reviews.png" alt="Certificate Image">-->
                                <div class="to-g-counter"><?php echo do_shortcode('[trustindex no-registration=google]') ?></div>
                            </div>
                    </div>
                    <div class="contact-google-reviews-carousel">
                        <?php echo do_shortcode('[grw id="1314"]') ?>
                    </div>
                </div>

                <div class="order-1 col-lg-6">
                    <div class="contact-form-wrapper">
                        <h4 class="contact-form-title">Laat direct een bericht achter</h4>
                        <p class="contact-form-description">Neem gerust contact met ons op en we beantwoorden al je vragen!</p>
                        <?php
                        echo do_shortcode('[wpforms id="384"]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let upload_title = document.querySelector('span.modern-title');
            if (upload_title) {
                upload_title.innerText = "<?php echo __('Sleep je CV om te uploaden of selecteer je CV'); ?>";
            }

        </script>
    </section>

</main>
</div>


<?php get_footer(); ?>