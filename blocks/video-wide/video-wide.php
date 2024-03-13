<?php

$class_name = 'video-wide';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="p-video-container">

        <iframe src="<?php echo manage_youtube_link(get_field('youtube_link')); ?>" frameborder="0" allowfullscreen class="video"></iframe>
        <div class="video-caption">
            <h4><?php echo get_field('video_caption') ?></h4>
        </div>

    </div>
</section>