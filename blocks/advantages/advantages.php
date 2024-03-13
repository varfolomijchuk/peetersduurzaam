<?php

$class_name = 'advantages';
if (!empty($block['className'])) {
    $class_name = $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="row">
            <?php
            if (have_rows('advantage_item')):

                // Loop through rows.
                while (have_rows('advantage_item')) : the_row(); ?>
                   <div class="advantage-item col-lg-4">
                       <img class="advantage-icon" src="<?php echo get_sub_field('advantage_icon') ?>" alt="Our Advantages">
                       <h5 class="advantage-text"><?php echo get_sub_field('advantage_text') ?></h5>
                   </div>


                <?php endwhile;

            // No value.
            else :
                // Do something...
            endif;
            ?>
        </div>
    </div>
</section>
