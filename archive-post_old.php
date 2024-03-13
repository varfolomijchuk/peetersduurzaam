<?php
/*
Template Name: Blog Archive Template
*/
?>
<?php get_header(); ?>
<?php
$search_cat = isset($_GET['cat']) && !empty($_GET['cat']) ? $_GET['cat'] : null;
$search_date = isset($_GET['date']) && !empty($_GET['date']) ? $_GET['date'] : null;
$blog_posts_years = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 9
)); ?>

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
                <div class="col-xl-10 post-filter-wrapper">
                    <form class="post-filter" action="" method="get">
                        <div class="d-flex align-items-lg-center gap-4 form-inner-wrapper">
                            <?php
                            $cats = get_categories();
                            if (!empty($cats)) { ?>
                                <label class="label-big" for="choose-category">Filteren op</label>
                                <select name="cat" id="choose-category">
                                    <option value="-1" <?php if (!isset($_GET['cat']) || empty($_GET['cat'])) echo 'selected'; ?>>Alles</option>
                                    <?php foreach ($cats as $cat) { ?>
                                        <?php
                                        $query_for_cat = new WP_Query([
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 1,
                                            'cat' => $cat->term_id
                                        ]);
                                        if (empty($query_for_cat->post_count)) continue;
                                        ?>
                                        <option value="<?php echo $cat->term_id ?>" <?php if (isset($_GET['cat']) && $_GET['cat'] == $cat->term_id) echo 'selected'; ?>><?php echo $cat->name ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                            <label class="choose-date-label" for="choose-date">met periode</label>
                            <select name="date" id="choose-date">
                                <option value="" <?php if (!isset($_GET['date']) || empty($_GET['date'])) echo 'selected'; ?>>Alles</option>

                                <?php
                                $years = [];
                                if ($blog_posts_years->have_posts()) {

                                    while ($blog_posts_years->have_posts()) {
                                        $blog_posts_years->the_post();
                                        $year = get_the_date('Y');
                                        if (!in_array($year, $years)) {
                                            $years[] = $year;
                                        }
                                    }
                                }
                                ?>
                                <?php foreach ($years as $y) : ?>
                                    <option value="<?php echo $y; ?>" <?php if (isset($_GET['date']) && $_GET['date'] == $y) echo 'selected'; ?>><?php echo $y;  ?></option>
                                <?php endforeach; ?>


                            </select>
                            <button class="p-btn-primary ms-auto" type="submit">Filters toepassen</button>
                        </div>

                    </form>
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

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $custom_post_type = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 9,
                    'paged' => $paged,
                    'cat' => $search_cat,
                    'year' => $search_date
                ));
                if ($custom_post_type->have_posts()) : while ($custom_post_type->have_posts()) :
                        $custom_post_type->the_post(); ?>

                    <?php echo get_template_part('parts/loop', 'posts'); ?>

                <?php endwhile;
                endif; ?>
            </div>
            <?php next_posts_link('Meer laden', $custom_post_type->max_num_pages); ?>
            <style>
                .loadmore-posts {
                    max-width: fit-content;
                    margin: 2rem auto 1rem;
                    display: block;
                }
            </style>
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