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
                <div class="col-xl-10 post-filter-wrapper">
                    <form class="post-filter" action="" method="get">
                        <div class="d-flex align-items-lg-center gap-4 form-inner-wrapper">

                            <?php
                            $cats = get_categories();
                            if (!empty($cats)) { ?>
                                <label class="label-big" for="choose-category">Filteren op</label>
                                <select name="cat" id="choose-category">
                                    <option value="-1" <?php if (!isset($_GET['cat']) || empty($_GET['cat'])) echo 'selected'; ?>>Projecten</option>
                                    <?php foreach ($cats as $cat) { ?>
                                        <?php
                                        $query_for_cat = new WP_Query([
                                            'post_type' => 'projecten',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 1,
                                            'cat' => $cat->term_id
                                        ]);
                                        if (empty($query_for_cat->post_count)) continue;
                                        ?>
                                        <option value="<?php echo $cat->term_id ?>" <?php if (isset($_GET['cat']) && $_GET['cat'] == $cat->term_id) echo 'selected'; ?>><?php echo $cat->name ?></option>
                                        <?php wp_reset_postdata(); ?>
                                    <?php } ?>
                                </select>
                            <?php } ?>

                            <?php
                            $query_for_client = new WP_Query([
                                'post_type' => 'projecten',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                /*
                                'meta_key' => 'project_features_client_type',
                                'meta_value' => [],
                                'meta_compare' => 'NOT IN'
                                */
                                'meta_query' => [
                                    [
                                        'key' => 'project_features_client_type',
                                        'compare' => 'EXISTS'
                                    ]
                                ]
                            ]);
                            if (!empty($query_for_client->post_count)) {
                                $client_types = [];
                                while ($query_for_client->have_posts()) {
                                    $query_for_client->the_post();
                                    $client_type = get_field('project_features')['client_type'];
                                    $client_types[$client_type['value']] = $client_type['label'];
                                }

                                wp_reset_postdata();
                            ?>
                                <?php if (isset($client_types) && !empty($client_types)) { ?>
                                    <label class="choose-date-label" for="choose-client_type">met klanttype</label>
                                    <select name="client-type" id="choose-client_type">
                                        <option value="" <?php if (!isset($_GET['client-type']) || empty($_GET['client-type'])) echo 'selected'; ?>>Type</option>
                                        <?php foreach ($client_types as $k => $v) { ?>
                                            <option <?php if (isset($_GET['client-type']) && $_GET['client-type'] == $k) echo 'selected'; ?> value="<?php echo $k ?>"><?php echo $v ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            <?php } ?>

                            <button class="p-btn-primary ms-auto" type="submit">Filters toepassen</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    $projecten_args = [
        'post_type' => 'projecten',
        'post_status' => 'publish',
        'posts_per_page' => 9,
    ];
    if (isset($_GET['cat'])) $projecten_args['cat'] = $_GET['cat'];

    if (isset($_GET['client-type']) && !empty($_GET['client-type'])) {
        $projecten_args['meta_query'][] = [
            'key' => 'project_features_client_type',
            'value' => $_GET['client-type']
        ];
    }

    $custom_post_type = new WP_Query($projecten_args);
    ?>
    <div class="container mb-4rem">
        <div class="projects-row row">


            <?php if ($custom_post_type->have_posts()) : while ($custom_post_type->have_posts()) :
                    $custom_post_type->the_post(); ?>

                    <div class="single-project col-12 col-md-6 col-xl-4">
                        <div class="taxonomy-btns">
                            <?php if ($tags = get_the_tags()) : ?>
                                <?php foreach ($tags as $tag) : ?>
                                    <a class="btn-taxonomy <?php echo $tag->slug ?>" href="#">
                                        <?php echo $tag->name; ?>
                                    </a>
                            <?php endforeach;
                            endif ?>
                            <?php if ($categories = get_the_category()) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                                        <?php echo $category->name; ?>
                                    </a>
                            <?php endforeach;
                            endif ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?>
                            <div class="overlay overlay-project"></div>
                            <?php the_title('<h4>', '</h4>'); ?>
                        </a>

                    </div>


            <?php endwhile;
            endif; ?>
        </div>
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