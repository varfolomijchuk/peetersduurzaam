<?php
$h_type = "h2";
$class_name = 'subtitle-title';
$custom_width = "";
$reversed_order = false;
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
if (get_field('settings')['enable']) {
    $additional_styles_enabled = true;
} else {
    $additional_styles_enabled = false;
}

$additional_styles = "";
$additional_content = get_field('additional_content');
if ($additional_styles_enabled) {

    $settings = get_field('settings');
    $custom_width = $settings['custom_width'] ? "width:" . $settings['custom_width'] . "px" : "";
    $reversed_order = $settings['reversed_order'];
    switch ($settings['align']) {
        case 'right':
            $additional_styles .= "text-align:right; margin-left: auto";
            break;
        case 'center':
            $additional_styles .= "text-align:center; margin: 0 auto;";
            break;
        default:
            $additional_styles .= "";

    }

}

?>
<section class="<?php echo esc_attr($class_name); ?>"
         style="<?php echo "background-color:" . get_field('settings')['background_color'] ?>">
    <div class="container">
        <?php ?>
        <div class="d-flex gap-4 flex-wrap flex-xl-nowrap  <?php echo $reversed_order ? "flex-row-reverse ": "flex-row "; echo  $additional_content['content_type'] == "none" && get_field('settings')['align'] == "center" ? "justify-content-around" : "justify-content-between" ?>">
            <div style="<?php echo $custom_width; ?>" class="sub-title-headers flex-grow-0 flex-shrink-0">
                <?php

                if (get_field('left_block')['subtitle']['heading_text']) {
                    $subtitle = get_field('left_block')['subtitle'];
                    $h_type = $subtitle['heading_type'];
                    $h_color = $subtitle['heading_color'];
                    echo "<$h_type style=\"color:$h_color; $additional_styles\" class=\"p-subtitle\" >" . $subtitle['heading_text'] . "</$h_type>";
                }
                if (get_field('left_block')['title']['heading_text']) {
                    $title = get_field('left_block')['title'];
                    $h_type = $title['heading_type'];
                    $h_color = $title['heading_color'];
                    echo "<$h_type style=\"color:$h_color; $additional_styles\" class=\"p-title\">" . $title['heading_text'] . "</$h_type>";
                }
                if (get_field('left_block')['description']) {
                    $description = get_field('left_block')['description'];
                    echo "<p>$description</p>";
                }
                if (get_field('left_block')['bottom_button']['caption']) {
                    $bottom_button = get_field('left_block')['bottom_button'];
                    $bottom_button_caption = $bottom_button['caption'];
                    $bottom_button_link = $bottom_button['link'];
                    $bottom_button_style = $bottom_button['style'];
                    echo "<a href=\"$bottom_button_link\" class=\"$bottom_button_style\">" . $bottom_button_caption . "</a>";
                }
                ?>
            </div>

            <?php if ($additional_content['content_type'] == "button"): ?>
                <div class="d-flex">
                    <a class="<?php echo $additional_content['button']['style'] ?> mt-auto mb-4"
                       href="<?php echo $additional_content['button']['link'] ?>"><?php echo $additional_content['button']['caption'] ?></a>
                </div>
            <?php endif; ?>

            <?php if ($additional_content['content_type'] == "text"): ?>
                <div class="d-flex">
                    <p class="mt-auto mb-2"><?php echo $additional_content['text'] ?></p>
                </div>
            <?php endif; ?>
            <?php if ($additional_content['content_type'] == "images"):
                $num_of_images = count(get_field('images'));
                if (have_rows('images')): ?>
                    <div class="d-flex align-items-center gap-2">
                        <?php while (have_rows('images')) : the_row(); ?>
                            <?php if ($num_of_images > 1): ?>
                                <div class="bordered-img-container">
                                    <img src="<?php echo get_sub_field('image') ?>" alt="Certificate Image">
                                </div>
                            <?php else: ?>
                                <img src="<?php echo get_sub_field('image') ?>" alt="Certificate Image">
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>


        </div>

    </div>
</section>
