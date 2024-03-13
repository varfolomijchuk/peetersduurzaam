<?php
/*
Template Name: Blog Archive Template
*/
 get_header();
$per_page = 9;
$args = [
    'post_type'   => 'post',
    'order'       => 'DESC',
    'post_status' => 'publish',
    'posts_per_page' => $per_page,
];
$posts_query = new WP_Query($args);
$count_posts = wp_count_posts('post')->publish;
$cats = get_categories();
$year = 1;
 ?>

<div style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_the_post_thumbnail_url() ?>)'" class="header-img d-flex">
    <div class="container title-container justify-content-around">
        <h1 style="max-width: 750px" class="page-title text-center"><?php echo get_field('alternative_title') ?: the_title(); ?></h1>
        <?php if (get_field('personal_advice')) : ?>
            <div class="personal-advice">
                <h4>Persoonlijk advies!</h4>
                <p>Maak een afspraak voor een gratis adviesgesprek met één van onze zonnepanelen experts.</p>
                <a class="p-btn-green text-center" href="<?php echo esc_url(site_url('/contact/gratis-adviesgesprek', 'https')); ?>">Plan een gratis adviesgesprek</a>
            </div>
        <?php endif; ?>
    </div>


</div>
<main>
    <section class="post-filter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 post-filter-wrapper" data-post="post">
                    <div class="cat-block">
                        <span class="filter-title"><?php _e('Filteren op', 'peeters'); ?></span>
                        <div class="cat-block__select">
                                <span
                                    class="category-item chevron-items"
                                    data-cat="toggle"
                                    data-post="post"
                                >
                                    <?php _e('Categorieën', 'peeters'); ?>
                                </span>
                                <div class="accordion-wrapper">
                                    <div class="accordion-wrapper__inner">
                                        <span
                                              data-post="post"
                                              class="category-item"
                                              data-cat="all">
                                            <?php _e('Alles', 'peeters'); ?>
                                        </span>
                                        <?php foreach ($cats as $key => $item) : ?>
                                            <span
                                                data-post="post"
                                                class="category-item <?php echo 'category-item--' . $key + 1; ?>"
                                                data-cat="<?php echo $item->slug; ?>">
                                                <?php echo $item->name; ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="client-type-block">
                        <span class="filter-title"><?php _e('met periode', 'peeters'); ?></span>
                        <div class="cat-block__select">
                            <span class="client-type-items chevron-items" data-post="post" data-client-type="toggle"><?php _e('Jaar', 'peeters'); ?></span>
                            <div class="accordion-wrapper">
                                <div class="accordion-wrapper__inner">
                                    <span class="client-type-items" data-post="post" data-year="all"><?php _e('Alles', 'peeters'); ?></span>
                                    <span class="client-type-items" data-post="post" data-year="<?php echo date('Y', time()); ?>">
                                        <?php echo date('Y', time()); ?>
                                    </span>
                                    <?php if ($year <= 1) : ?>
                                        <span class="client-type-items"
                                              data-post="post"
                                              data-year="<?php echo date('Y', time() - 60*60*24*365); ?>">
                                            <?php echo date('Y', time() - 60*60*24*365); ?>
                                        </span>

                                    <?php else : ?>
                                        <?php for ($i = 1; $i <= $year; $i++) : ?>
                                            <span class="client-type-items"
                                                  data-year="<?php echo date('Y', time() - 60*60*24*365*$i); ?>">
                                                <?php echo date('Y', time() - 60*60*24*365*$i); ?>
                                            </span>
                                        <?php endfor; ?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mt-5">
                    <p class="color-light">Bij Peeters Duurzaam geloven we in de kracht van kennis om duurzame
                        keuzes te maken. Deze pagina is een bron van waardevolle informatie, waar we inzichtelijke
                        artikelen delen over een breed scala aan onderwerpen die te maken hebben met duurzame
                        energie, groene technologie en praktische tips voor een milieuvriendelijker leven.</p>
                </div>
                <div class="col-xl-6 mt-5">
                    <p class="color-light">Of je nu geïnteresseerd bent in het begrijpen van de nieuwste
                        technologieën, het ontdekken van hoe onze producten werken, of het verkennen van
                        mogelijkheden voor subsidies en financiële voordelen, ons kenniscentrum is jouw gids. We
                        zijn hier om je te helpen bij elke stap van je duurzame reis, met heldere en toegankelijke
                        informatie.</p>
                </div>

            </div>
    </section>

    <section class="blog-archive">
        <div class="container">
            <div class="blogs-row row">

                <?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) :
                    $posts_query->the_post(); ?>

                    <?php echo get_template_part('parts/loop', 'posts'); ?>

                <?php endwhile;
                endif; ?>
            </div>
            <?php if ($count_posts > $per_page) : ?>
                <div class="load-more-wrapper text-center p-4">
                    <span class="load-more p-btn-primary"
                          data-post="post"
                          data-per-page="<?php echo $per_page; ?>"
                          data-count="<?php echo $count_posts; ?>">
                        <?php _e('Meer laden', 'peeters'); ?>
                    </span>
                </div>
            <?php endif; ?>
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

</div>
<?php get_footer(); ?>