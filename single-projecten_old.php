<?php
/*
Template Name: Single Project Template
*/
?>
<?php get_header(); ?>
<?php

?>
    <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_the_post_thumbnail_url() ?>)'" class="header-img d-flex">
        <div class="container title-container">
            <h1 class="page-title"><?php echo get_field('alternative_title') ?: the_title(); ?></h1>
        </div>


    </div>

    <main class="single-project">
        <section>
            <div class="container">
                <p class="breadcrumb">
                    <span><a href="/projecten">Projecten</a></span>
                    <span><a href="#">Zonnepanelen</a></span>
                    <span><?php echo get_field('project_title') ?></span>
                </p>

                <div class="row mt-2 mt-md-4">
                    <div class="col-xl-8 mt-2 mt-md-4  project-description">
                        <?php echo get_field('project_description') ?>
                    </div>
                    <div class="col-xl-4">
                        <div class="project-features">
                            <h5>Project kenmerken</h5>
                            <figure class="wp-block-table table table-borderless">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="feature-caption">Locatie</td>
                                        <td class="feature-data"><?php echo get_field('project_features')['location'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="feature-caption">Periode</td>
                                        <td class="feature-data"><?php echo get_field('project_features')['period'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="feature-caption">Type project</td>
                                        <td class="feature-data"><?php echo get_field('project_features')['project_type'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </figure>
                        </div>
                    </div>
                </div>
			</div>
        </section>
        <section class="project-details-section">
            <div class="container">
                <div class="row project-details">
                    <div class="col-lg-4 item">
                        <h2><?php echo get_field('project_details')['besparing'] ?></h2>
                        <h6>Besparing per jaar</h6>
                    </div>
                    <div class="col-lg-4 item">
                        <h2><?php echo get_field('project_details')['zonnepanelen'] ?></h2>
                        <h6>Zonnepanelen</h6>
                    </div>
                    <div class="col-lg-4 item">
                        <h2><?php echo get_field('project_details')['power'] ?></h2>
                        <h6>Gezamenlijk vermogen</h6>
                    </div>

                </div>
            </div>
        </section>
        <section class="image-carousel right-edge left-edge">
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


            });
        </script>


        <section class="cpt-carousel">
            <div class="container">
                <div class="block-header d-flex justify-content-between align-items-center">
                    <div class="left-block">
                        <h5 class="subtitle">Ontdek ons werk</h5>
                        <h2 class="title">Bekijk ook de volgende projecten</h2>
                    </div>
                    <div class="right-block">
                        <a class="p-btn-sub" href="/projecten">Alle projecten</a>
                    </div>

                </div>
                <div class="cpt-carousel-wrapper-projecten d-flex gap-3">
                    <?php
                    $args = array(
                        'post_type' => 'projecten',
                        'post_status' => 'publish',
                        'post__not_in' => [get_the_ID()],
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="single-carousel-item">

                            <div class="taxonomy-btns">
                                <?php if($categories = get_the_category()): ?>
                                    <?php foreach ($categories as $category) : ?>
                                        <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                                            <?php echo $category->name; ?>
                                        </a>
                                    <?php  endforeach; endif ?>
                            </div>

                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?><?php the_title('<h4>', '</h4>'); ?></a>

                        </div>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
        <script>
            $('.cpt-carousel-wrapper-projecten').slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
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

        <section class="free-consultation">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <h5 class="heading mb-2 mb-md-0">Plan een gratis adviesgesprek in</h5>
                    <a class="p-btn-secondary" href="<?php echo esc_url(site_url('/contact/gratis-adviesgesprek', 'https')); ?>">Gratis adviesgesprek</a>
                </div>
            </div>
        </section>
        <section class="contact-form-advanced bgrnd-fluo-green">
            <div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 d-flex flex-column justify-content-around">
                        <div class="text-content-wrapper pb-3">
                            <h5 class="contact-subtitle">Ervaring van onze klanten</h5>
                            <h2 class="contact-title">Lees enkele ervaringen</h2>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form-wrapper">
                            <h4 class="contact-form-title">Laat direct een bericht achter</h4>
                            <p class="contact-form-description">Neem gerust contact met ons op en we beantwoorden al je vragen!</p>
                            <?php
                            echo do_shortcode('[wpforms id="1119"]');
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
        <section class="mega-block" style="background-color:#FFFFFF">
            <div class="container">
                <div class="d-flex gap-4 flex-wrap flex-xl-nowrap  flex-row justify-content-between">
                    <div style="width:450px" class="sub-title-headers flex-grow-0 flex-shrink-0">
                        <h3 style="color:#0D1A29; " class="p-title">Volledig gecertificeerd</h3>            </div>


                    <div class="megablock-right d-flex align-items-center gap-2">
                        <div class="bordered-img-container">
                            <img decoding="async" src="/wp-content/uploads/2023/10/Certificaat-installq.png" alt="Image">
                        </div>
                        <div class="bordered-img-container">
                            <img decoding="async" src="/wp-content/uploads/2023/10/Certificaat-vca.png" alt="Image">
                        </div>
                        <div class="bordered-img-container">
                            <img decoding="async" src="/wp-content/uploads/2023/10/Certificaat-holland-solar.png" alt="Image">
                        </div>
                    </div>


                </div>

            </div>
        </section>
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile;
        endif;
        ?>
    </main>
    </div>


<?php get_footer(); ?>