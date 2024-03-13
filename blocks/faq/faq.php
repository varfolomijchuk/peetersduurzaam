<?php

$class_name = 'faq';
if (!empty($block['className'])) {
    $class_name .=" " . $block['className'];
}

$args = array(
    'post_type' => 'vaak-gestelde-vraag',
    'post_status' => 'publish',
    'cat' => get_field('filter')['category'],
    'posts_per_page' => get_field('filter')['limit']?:'-1'

);
$faq = new WP_Query($args);
?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="col-lg-10 faq">
            <h5 class="p-subtitle"><?php echo get_field('heading_group')['subtitle']; ?></h5>
            <h2 class="p-title"><?php echo get_field('heading_group')['title']; ?></h2>
            <div class="accordion" id="faq-accordion">
                <?php
                $index = 0;
                if ($faq->have_posts()) : while ($faq->have_posts()) :
                    $faq->the_post();
                    $index++; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo  $index; ?>">
                            <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $index; ?>"
                                    aria-expanded="false"
                                    aria-controls="collapse<?php echo $index; ?>">
                                <?php echo get_field('question',$faq->post->ID) ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $index; ?>"
                             class="accordion-collapse collapse"
                             aria-labelledby="heading<?php echo $index; ?>"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><?php echo get_field('answer', $faq->post->ID) ?></p>
                            </div>
                        </div>
                    </div>

                <?php endwhile;
                endif; ?>

            </div>
            <a class="<?php echo get_field('button')['style']; ?>" href="<?php echo get_field('button')['link']; ?>"><?php echo get_field('button')['caption']; ?></a>
        </div>
    </div>
</section>
