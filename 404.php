<?php
/*
Template Name: Basic Blog Template
*/
?>
<?php get_header(); ?>
<main class="page-404">
    <section class="page-404__hero">
        <div class="background-image">
            <?php echo wp_get_attachment_image(get_field('404_image', 'options'), 'large'); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php _e('404 pagina', 'peeters') ?></h1>
                    <?php echo get_field('404_text', 'options'); ?>

                    <a href="<?php echo home_url(); ?>"
                       class="p-btn-primary"
                       aria-label="<?php _e('Home', 'peeters') ?>"
                       target="_self"
                    >
                         <?php _e('Home', 'peeters') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>