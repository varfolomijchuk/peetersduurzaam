<?php

$class_name = 'projects-with-testimonial';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>
<?php
$header_subtitle = get_field('heading')['subtitle'];
$header_title = get_field('heading')['title'];
$button = get_field('heading')['button'];
$project_type = get_field('project_type');
$projects_array = [];
switch ($project_type) {
    case 'zonnepanelen':
        $projects_array = get_field('projecten')['zonnepanelen_projecten'];
        break;
    case 'laadpalen':
        $projects_array = get_field('projecten')['laadpalen_projecten'];
        break;
    case 'warmtepompen':
        $projects_array = get_field('projecten')['warmtepompen_projecten'];
        break;
}
$mini_subtitle = get_field('testimonial_block')['subtitle'];
$mini_title = get_field('testimonial_block')['title'];
$testimonial = get_field('testimonial_block')['testimonial'];

$name = get_field('naam', $testimonial->ID);
$review = get_field('bedrijf', $testimonial->ID);
?>
<section style="background-color: #EDFFE7" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="top-container">
            <div class="top-left">
                <h5 class="p-subtitle"><?php echo $header_subtitle; ?></h5>
                <h2 class="p-title"><?php echo $header_title; ?></h2>
            </div>
            <div class="top-right">
                <a class="<?php echo $button['style'] ?>"
                   href="<?php echo $button['link'] ?>"><?php echo $button['caption']; ?></a>
            </div>


        </div>
        <div class="projects-wrapper">
            <?php foreach ($projects_array as $project): ?>
                <div class="project">
                    <div class="taxonomy-btns">
                        <?php if($tags = get_the_tags($project->ID)): ?>
                            <?php foreach ($tags as $tag) : ?>
                                <a class="btn-taxonomy <?php echo $tag->slug ?>" href="#">
                                    <?php echo $tag->name; ?>
                                </a>
                            <?php  endforeach; endif ?>
                        <?php if($categories = get_the_category($project->ID)): ?>
                            <?php foreach ($categories as $category) : ?>
                                <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php  endforeach; endif ?>
                    </div>
                    <a href="<?php echo get_the_permalink($project) ?>">
                        <?php echo get_the_post_thumbnail($project, 'large'); ?>
						<div class="overlay overlay-project"></div>
                        <h4><?php echo get_the_title($project); ?></h4>
                    </a>

                </div>
            <?php endforeach; ?>
            <div class="testimonial-wrapper">
                <div class="top-testimonial align-items-start align-items-lg-end">
                    <div class="mini-header">
                        <h5 class="mini-subtitle"><?php echo $mini_subtitle; ?></h5>
                        <h4 class="mini-title"><?php echo $mini_title; ?></h4>
                    </div>
                    <div class="google-reviews">
<!--                        <img src="/wp-content/uploads/2023/10/google-reviews.png" alt="Certificate Image">-->
                        <div class="to-g-counter"><?php echo do_shortcode('[trustindex no-registration=google]') ?></div>
                    </div>
                </div>
                <div class="testimonial">
                    <?php echo do_shortcode('[grw id="1651"]') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
let countReviews = $('.ti-header.source-Google .ti-text strong').text(),
        rating = $('.ti-header.source-Google .ti-rating').text();
    $('.ti-header.source-Google .ti-text strong').text(countReviews.replace(/recensie/g, 'review'));
    $('.ti-header.source-Google .ti-rating').text(rating + ' / 5');
</script>
