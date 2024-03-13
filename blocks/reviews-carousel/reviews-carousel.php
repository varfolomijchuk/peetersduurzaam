<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'reviews-carousel';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section style="background-color:<?php echo get_field('settings')['background_color']; ?>" class="<?php echo esc_attr($class_name); ?> <?php echo !isset(get_field('header')['header_align']) ? ' mt-4' : null; ?>">
    <div class="container">
        <div class="block-header">
            <?php if (isset(get_field('header')['header_align'])) : ?>
                <h5 class="subtitle <?php echo get_field('header')['header_align'] ?>"><?php echo get_field('header')['subtitle'] ?></h5>
            <?php endif; ?>
            <div class="title-reviews-wrapper d-block d-lg-flex">
                <?php if (isset(get_field('header')['header_align'])) : ?>
                    <h2 class="title <?php echo get_field('header')['header_align'] ?>"><?php echo get_field('header')['title'] ?></h2>
                <?php endif; ?>
<!--                 <div class="google-reviews ps-5">-->
<!--                    --><?php //echo do_shortcode('[trustindex no-registration=google]') ?>
<!--                </div>-->
            </div>
        </div>
        <div class="review-carousel-wrapper d-flex gap-3 <?php echo get_field('settings')['item_color'] ?>">
            <?php
            global $post;
            $args = array(
                'post_type' => 'klantervaringen',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $name = get_field('naam', $post->ID);
                $review = get_field('bedrijf', $post->ID);
                ?>
                <div class="single-carousel-item">
                    <p class="customer-review"><?php echo $review; ?></p>
                    <p class="customer-name"><?php  echo $name; ?></p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <path d="M3.38508 13.9471C3.0226 14.1314 2.61169 13.8071 2.68512 13.3949L3.4632 8.97966L0.161048 5.84771C-0.147528 5.5545 0.0126189 5.01942 0.426658 4.96109L5.0178 4.31168L7.06456 0.273664C7.1036 0.191777 7.16517 0.122596 7.24213 0.0741549C7.31908 0.0257136 7.40826 0 7.4993 0C7.59035 0 7.67953 0.0257136 7.75648 0.0741549C7.83344 0.122596 7.89501 0.191777 7.93404 0.273664L9.98237 4.31168L14.5743 4.96109C14.9875 5.01942 15.1477 5.5545 14.8383 5.84771L11.537 8.97966L12.315 13.3941C12.3877 13.8079 11.9776 14.1314 11.6151 13.9463L7.49891 11.841L3.38508 13.9471Z" fill="#FBBC05"/>
                        </svg>
                    </p>
                </div>

            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
<script>
    $('.review-carousel-wrapper').slick({
        infinite: true,
        draggable: true,
        slidesToShow: <?php echo get_field('settings')['slides_to_show']?>,
        slidesToScroll: 1,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
	
	$(document).ready(function() {
        if ($(window).width() >= 768 && $(window).width() <= 991.98) {
            var maxHeight = 0;
            $('.review-carousel-wrapper .single-carousel-item').each(function() {
                var height = $(this).height();
                maxHeight = Math.max(maxHeight, height);
            });

            $('.review-carousel-wrapper .single-carousel-item').height(maxHeight);
        }
    });
</script>