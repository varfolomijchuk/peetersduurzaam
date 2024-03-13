<?php
/*
Template Name: Single Project
*/
?>
<?php get_header(); ?>
    <body>
    <div class="container">
        <img src="<?php echo get_field('header_image') ?>" >
                <div>
            <h1><?php the_title(); ?></h1>
            <main>
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </main>
        </div>
    </div>

    </body>

<?php get_footer(); ?>