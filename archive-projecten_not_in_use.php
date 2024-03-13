<?php
/*
Template Name: Basic Template
*/
?>
<?php get_header(); ?>
    <div style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>)'" class="header-img d-flex">
        <div class="container title-container justify-content-around">

            <h1 class="page-title">Projecten waar we trots op zijn</h1>
            <?php if (get_field('personal_advice')): ?>
                <div class="personal-advice">
                    <h4>Persoonlijk advies!</h4>
                    <p>Maak een afspraak voor een gratis adviesgesprek met één van onze zonnepanelen experts.</p>
                    <a  class="p-btn-green text-center" href="#">Plan een gratis adviesgesprek</a>
                </div>
            <?php endif; ?>
        </div>


    </div>
    <div>

        <main>
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