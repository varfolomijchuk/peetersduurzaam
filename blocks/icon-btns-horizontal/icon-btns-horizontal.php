<?php

$class_name = 'icon-btns-horizontal';
if (!empty($block['className'])) {
    $class_name = $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="row">
            <?php
            if (have_rows('buttons')) :

                // Loop through rows.
                while (have_rows('buttons')) : the_row();
                    echo "<div class='icon-btns-horizontal-wrapper col-md-6 col-lg-3'>";
                    echo "<a class='icon-btns-horizontal-container' href=" . esc_html(get_sub_field('page_link')) . ">";
                    $icon = get_sub_field('icon');
                    $icon_url = get_sub_field('icon')['url'];
                    $item_title = get_sub_field('title');
                    $item_content = get_sub_field('content');
                    // echo "<img class=\"icon-btns-horizontal-icon\" src=\"" . $icon_url . "\" />";
                    // echo str_replace('<svg ', '<svg class="icon-btns-horizontal-icon"', file_get_contents($icon_url));
                    $icon_result = wp_get_attachment_image($icon['ID'], array($icon['width'], $icon['height']));
                    echo str_replace('class="', 'class="icon-btns-horizontal-icon ', $icon_result);
                    echo "<h5 class=\"icon-btns-horizontal-title\">" . $item_title . "</h5>";
                    //
                    echo "<div class='icon-btns-horizontal-content'> $item_content </div>";
                    echo '<svg class="icon-right-arrow" width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.68248e-07 7.5L20 7.5M20 7.5L13.5 0.999999M20 7.5L13.5 14" stroke="#203669" stroke-width="1.6"/>
</svg></a></div>';

                // End loop.
                endwhile;

            // No value.
            else :
            // Do something...
            endif;
            ?>
        </div>
    </div>
</section>