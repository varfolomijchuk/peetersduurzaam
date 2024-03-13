<?php

$class_name = 'media-wide';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}

$media_type = get_field('media_type');
?>

<section style='background-color:<?php echo get_field('settings')['background_color'] ?>' class="<?php echo esc_attr($class_name); ?>">
    <?php if ($media_type == "youtube") : ?>
        <div class="p-video-container">
            <iframe src="<?php echo manage_youtube_link(get_field('youtube_link')); ?>" frameborder="0" allowfullscreen class="video"></iframe>
            <div style='background-color:<?php echo get_field('settings')['background_color'] ?>' class="video-caption">
                <h4><?php echo get_field('video_caption') ?></h4>
            </div>
        </div>
    <?php elseif ($media_type == "image") : ?>
        <div style="background-image: url('<?php echo get_field('image_block')['image'] ?>)'" class="wide-image-wrapper d-flex">

            <?php if (get_field('image_block')['title_position'] == 'bottom-left') : ?>
                <div style='background-color:<?php echo get_field('settings')['background_color'] ?>' class="image-caption">
                    <h4><?php echo get_field('image_block')['title'];  ?></h4>
                </div>
            <?php else : ?>
                <div class="container title-container">
                    <h2 class="page-title"><?php echo get_field('image_block')['title']; ?></h2>
                    <?php if (get_field('image_block')['personal_advice']) : ?>
                        <div class="personal-advice d-none d-lg-flex">
                            <h4>Persoonlijk advies!</h4>
                            <p>Maak een afspraak voor een gratis adviesgesprek met één van onze zonnepanelen experts.</p>
                            <a class="p-btn-green text-center" href="#">Plan een gratis adviesgesprek</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

    <?php endif; ?>
</section>