<?php
/*
Template Name: Basic Template
*/
?>
<?php get_header(); ?>
    <div style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>)'" class="header-img">
        <div class="container title-container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>

    </div>
    <div>

        <main>
            <section id="post-container" class="container">
                <div class="row">
                    <?php
                   if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-xl-6">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo get_field('project_description') ?></p>
                        </div>
                    <?php endwhile;
                    else : ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif ?>


                </div>
            </section>
        </main>
    </div>
    </div>


<?php get_footer(); ?>