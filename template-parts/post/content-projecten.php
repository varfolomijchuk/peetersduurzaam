<div <?php echo post_class('post projecten__item') ?>>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large', array('class' => 'projecten__item--thumbnail')); ?></a>
    <div class="projecten__item--category">
        <?php
        $categories = get_the_category(); // Get the categories for the current post

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $category_link = get_category_link($category->term_id); // Get the category archive link
                echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>'; // Output the category link
                if ($category !== end($categories)) {
                    echo ', '; // Add a comma after each category except the last one
                }
            }
        }
        ?>
    </div>
    <div class="projecten__item--content">
        <div class="row align-items-center justify-content-between">
            <h4 class="projecten__item--title">
                <?php the_title(); ?></h4>
            <p><?php echo get_field('project_description'); ?></p>

        </div>
    </div>
</div>