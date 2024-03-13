<?php
/*
Template Name: Projecten Template
*/
?>
<?php get_header(); ?>
<div style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?php echo get_the_post_thumbnail_url() ?>)'" class="header-img d-flex">
    <div class="container title-container justify-content-around">
        <h1 style="max-width: 650px" class="page-title text-center"><?php echo get_field('alternative_title') ?: the_title(); ?></h1>
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
                <div class="col-xl-10">
                    <?php
                    $per_page = 3;
                    $args = [
                        'post_type' => 'projecten',
                        'post_status' => 'publish',
                        'posts_per_page' => $per_page,
                        'paged' => 1,
                        'meta_query' => [
                                [
                                        'key' => 'project_features_client_type',
                                        'compare' => 'EXISTS'
                                ]
                            ]
                    ];
                    $projecten = new WP_Query($args);
                    $projecten_cats = get_terms(['taxonomy'   => 'category',]);
                    $count_projectens = wp_count_posts('projecten')->publish;
                    ?>
                    <div class="post-filter-wrapper">
                        <div class="cat-block">
                            <span class="filter-title"><?php _e('Filteren op', 'peeters'); ?></span>
                            <div class="cat-block__select">
                                <?php if (count($projecten_cats) > 1) : ?>
                                    <span
                                        data-post="projecten"
                                        class="category-item chevron-items"
                                        data-cat="toggle"
                                    >
                                        <?php _e('Categorieën', 'peeters'); ?>
                                    </span>
                                    <div class="accordion-wrapper">
                                        <div class="accordion-wrapper__inner">
                                              <span
                                                      data-post="projecten"
                                                      class="category-item"
                                                      data-cat="all">
                                                <?php _e('Alles', 'peeters'); ?>
                                            </span>
                                            <?php foreach ($projecten_cats as $key => $item) : ?>
                                                <span
                                                        data-post="projecten"
                                                        class="category-item <?php echo 'category-item--' . $key + 1; ?>"
                                                        data-cat="<?php echo $item->slug; ?>">
                                                    <?php echo $item->name; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="client-type-block">
                            <span class="filter-title"><?php _e('met klanttype', 'peeters'); ?></span>
                            <div class="cat-block__select">
                                <span class="client-type-items chevron-items" data-post="projecten" data-client-type="toggle"><?php _e('Types', 'peeters'); ?></span>
                                <div class="accordion-wrapper">
                                    <div class="accordion-wrapper__inner">
                                        <span class="client-type-items" data-post="projecten" data-client-type="all"><?php _e('Alles', 'peeters'); ?></span>
                                        <span class="client-type-items" data-post="projecten" data-client-type="private"><?php _e('Particulier', 'peeters'); ?></span>
                                        <span class="client-type-items" data-post="projecten" data-client-type="commercial"><?php _e('Zakelijk', 'peeters'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="container mb-4rem">
        <div class="projects-row row">


            <?php if ($projecten->have_posts()) : while ($projecten->have_posts()) :
                $projecten->the_post(); ?>

                <?php echo get_template_part('parts/loop', 'projecten'); ?>

            <?php endwhile;
            endif; ?>
        </div>
        <?php if ($count_projectens > $per_page) : ?>
            <div class="load-more-wrapper text-center p-4">
                <span class="load-more p-btn-primary" data-post="projecten" data-per-page="<?php echo $per_page; ?>" data-count="<?php echo $count_projectens; ?>"><?php _e('Load more', 'peeters'); ?></span>
            </div>
        <?php endif; ?>
    </div>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>
</div>


<?php get_footer(); ?>