<?php
/*
Template Name: Single Vacature Template
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
    <main class="single-vacature">
        <section>
            <div class="container">
                <p class="breadcrumb"><span><a href="/">Home</a></span><span><a
                                href="/vacatures">Vacatures</a></span><span><?php echo get_field('job_title') ?></span></p>

                <div class="row mt-4 mb-5 mb-lg-0 pb-md-3 pb-lg-0">
                    <div class="col-xl-8 mt-4  job-description">
                        <?php echo get_field('job_description') ?>
                    </div>
                    <div class="col-xl-4">
                        <div class="direct-solliciteren">
                            <h5>Direct solliciteren</h5>
                            <p>Klinkt deze vacature interessant voor jou? Laat van je horen, we nemen graag snel contact
                                met je op voor een kopje koffie!</p>
                            <a class="p-btn-primary d-inline-block mt-3 text-center w-100" href="/contact/">Nu solliciteren</a>
                        </div>
                    </div>
                </div>

        </section>
        <section class="job-details-section">
            <div class="container mb-0">
                <div class="row job-details gap-5 gap-lg-0">
                    <div class="col-md-12 col-lg-4 item text-center text-lg-start">
                        <h2><?php echo get_field('job_details')['hours'] ?></h2>
                        <h6>Minimaal werkzaam</h6>
                    </div>
                    <div class="col-md-12 col-lg-4 item text-center text-lg-start">
                        <h2><?php echo get_field('job_details')['holydays'] ?></h2>
                        <h6>Vakantiedagen</h6>
                    </div>
                    <div class="col-md-12 col-lg-4 item text-center text-lg-start">
                        <h2><?php echo get_field('job_details')['salary'] ?></h2>
                        <h6>Bijpassend salaris (o.b.v. parttime)</h6>
                    </div>

                </div>
            </div>
        </section>
        <section class="text-carousel single-vacature">
            <div class="container">
                <div class="block-header">
                    <h5 class="subtitle">Onze voordelen</h5>
                    <h2 class="title ">Waarom voor ons kiezen?</h2>
                </div>
                <div class="text-carousel-wrapper d-flex">
                    <div class="single-carousel-item-wrapper">
                        <div class="single-carousel-item">
                            <div class="text-carousel-head">
                                <h5 class="text-carousel-title">Een leerzame reis</h5>
                            </div>
                            <div class="text-carousel-body">
                                <p class="text-carousel-text">Bij Peeters Duurzaam staan we voor leren en groeien. We bieden een ondersteunende omgeving waarin je de kans krijgt om expertise op te bouwen in zonnepanelen en laadpalen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-carousel-item-wrapper">
                        <div class="single-carousel-item">
                            <div class="text-carousel-head">
                                <h5 class="text-carousel-title">Een toegewijd team</h5>
                            </div>
                            <div class="text-carousel-body">
                                <p class="text-carousel-text">Sluit je aan bij ons enthousiaste en ervaren team van professionals die gepassioneerd zijn over duurzame energie. Je zult werken met mensen die jouw toewijding aan groen ondernemen delen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-carousel-item-wrapper">
                        <div class="single-carousel-item">
                            <div class="text-carousel-head">
                                <h5 class="text-carousel-title">Flexibiliteit</h5>
                            </div>
                            <div class="text-carousel-body">
                                <p class="text-carousel-text">Wij begrijpen dat jij je leven hebt, en daarom bieden we een parttime rol aan van minimaal 16 uur per week. Zo kun je leren en tegelijkertijd geld verdienen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="single-carousel-item-wrapper">
                        <div class="single-carousel-item">
                            <div class="text-carousel-head">
                                <h5 class="text-carousel-title">Competitieve vergoeding</h5>
                            </div>
                            <div class="text-carousel-body">
                                <p class="text-carousel-text">Verdien tussen € 900 en € 1.400 per maand (o.b.v. parttime), afhankelijk van je inzet en groei binnen ons bedrijf.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $('.text-carousel-wrapper').slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: false,
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
			
		$(document).ready(function() {
			if ($(window).width() >= 768) {
				var maxHeight = 0;
        		$('.text-carousel.single-vacature .single-carousel-item').each(function() {
            		var height = $(this).height();
            		maxHeight = Math.max(maxHeight, height);
        		});

        		$('.text-carousel.single-vacature .single-carousel-item').height(maxHeight);	
			}
    	});
        </script>
        <section class="vacature-offer-list">
            <div class="container">
                <div class="row gap-5 gap-lg-0">
                    <div class="col-xl-6">
                        <h2>Wat ga je doen</h2>
                        <ul>
                            <?php if (have_rows('wat_ga_je_doen')):
                                while (have_rows('wat_ga_je_doen')) : the_row(); ?>
                                    <li><?php echo get_sub_field('task'); ?></li>
                                <?php endwhile; endif; ?>
                        </ul>
                    </div>
                    <div class="col-xl-6">
                        <h2>Dit vragen we van jou</h2>
                        <ul>
                            <?php if (have_rows('dit_vragen')):
                                while (have_rows('dit_vragen')) : the_row(); ?>
                                    <li><?php echo get_sub_field('task'); ?></li>
                                <?php endwhile; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="image-carousel right-edge left-edge">
            <div class="container">
                <div class="container-fluid carousel-wrapper">
                    <div class="carousel-img-container">
                        <img src="/wp-content/uploads/2023/12/Peeters-Duurzaam-vacatures-01-1.jpg" alt="Carousel Image">
                    </div>
                    <div class="carousel-img-container">
                        <img src="/wp-content/uploads/2023/12/Peeters-Duurzaam-vacatures-02-1.jpg" alt="Carousel Image">
                    </div>
                    <div class="carousel-img-container">
                        <img src="/wp-content/uploads/2023/12/Peeters-Duurzaam-vacatures-03-1.jpg" alt="Carousel Image">
                    </div>
                    <div class="carousel-img-container">
                        <img src="/wp-content/uploads/2023/12/Peeters-Duurzaam-vacatures-04-1.jpg" alt="Carousel Image">
                    </div>
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
        <section class="reviews-carousel">
            <div class="container">
                <div class="block-header">
                    <h5 class="subtitle ">Ervaring van onze medewerkers</h5>
                    <h2 class="title ">Zo denken je collega’s</h2>
                </div>
                <div class="review-carousel-wrapper d-flex gap-3">
                    <?php
                    global $post;
                    $args = array(
                        'post_type' => 'klantervaringen',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query($args);

                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        $name = get_field('naam', $post->ID);
                        $review = get_field('bedrijf', $post->ID);
                        ?>
                        <div class="single-carousel-item">
                            <p class="customer-review"><?php echo $review; ?></p>
                            <p class="customer-name"><?php  echo $name; ?></p>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                    <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                                </svg>
                            </p>
                        </div>

                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
        <script>
            $('.review-carousel-wrapper').slick({
                infinite: true,
                draggable: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: false,
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
        <section class="contact-form-advanced bgrnd-fluo-green">
            <div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-around mb-4 mb-lg-0">
                        <div class="text-content-wrapper pb-3">
                            <h5 class="contact-subtitle">Gelijk contact opnemen</h5>
                            <h2 class="contact-title">Past deze vacature bij jou?</h2>
                            <p class="contact-description">Als je op zoek bent naar een boeiende en leerzame carrière in
                                duurzame energie, dan is dit jouw kans. We nodigen je graag uit om deel uit te maken van
                                ons team en samen te werken aan een groenere toekomst.</p>
                            <div class="button-wrapper">
                                <a class="p-btn-secondary"
                                   href="/contact/">Contact opnemen</a>

                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form-wrapper">
                            <h4 class="contact-form-title">Solliciteer direct</h4>
                            <p class="contact-form-description">Heb je vragen of wil je solliciteren? Neem contact met ons op. We kijken er naar uit om van je te horen en samen deze duurzame reis te beginnen.</p>
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
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile;
        endif;
        ?>
    </main>
    </div>


<?php get_footer(); ?>