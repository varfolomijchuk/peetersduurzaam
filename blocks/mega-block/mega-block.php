<?php
$h_type = "h2";
$class_name = 'mega-block';
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
}
$space_margin  = get_field('add_margins');
$space_padding  = get_field('add_paddings');
?>
<section class="<?php echo esc_attr($class_name); ?><?php echo $space_margin ? ' mt-4 mb-4' : null; ?>" style="<?php echo "background-color:" . get_field('settings')['background_color'] ?>">
    <div class="container<?php echo $space_padding ? ' pt-4 pb-4' : null; ?>">
        <div class="mega-block-wrapper d-flex gap-4 gap-md-5 flex-wrap flex-xl-nowrap align-items-center <?php echo get_field('settings')['justify_content'] . " ";
                                                                                                            echo $reversed_order ? "flex-row-reverse " : "flex-row "; ?> justify-content-md-center justify-content-lg-between">
            <div style="width:<?php echo $settings['custom_width'] . "px"; ?>" class="sub-title-headers flex-grow-0 flex-shrink-0">
                <?php
                /* $title = "";
                $title_arr = explode("--", get_field('left_block')['title']['heading_text']);
                if(count($title_arr)>1) {
                   $title = implode("<br>", $title_arr );
                }
                else {
                    $title = get_field('left_block')['title']['heading_text'];
                }*/
                ?>


                <?php
                if (get_field('left_block')['subtitle']['heading_text']) {
                    $subtitle = get_field('left_block')['subtitle'];
                    $h_type = $subtitle['heading_type'];
                    $h_color = $subtitle['heading_color'];
                    echo "<$h_type style=\"color:$h_color; $additional_styles\" class=\"p-subtitle\" >" . $subtitle['heading_text'] . "</$h_type>";
                }
                if (get_field('left_block')['title']['heading_text']) {
                    $title = "";
                    $title_arr = explode("--", get_field('left_block')['title']['heading_text']);
                    if (count($title_arr) > 1) {
                        $title = implode("<br>", $title_arr);
                    } else {
                        $title = get_field('left_block')['title']['heading_text'];
                    }
                    $h_type = get_field('left_block')['title']['heading_type'];
                    $h_color = get_field('left_block')['title']['heading_color'];
                    echo "<$h_type style=\"color:$h_color; $additional_styles\" class=\"p-title\">" . $title . "</$h_type>";
                }
                if (get_field('left_block')['description']) {
                    $description = get_field('left_block')['description'];
                    echo "<p class='p-body mb-4 pb-2'>$description</p>";
                }
                if (get_field('left_block')['bottom_button']['caption']) {
                    $bottom_button = get_field('left_block')['bottom_button'];
                    $bottom_button_caption = $bottom_button['caption'];
                    $bottom_button_link = $bottom_button['link'];
                    $bottom_button_style = $bottom_button['style'];
                    echo "<a href=\"$bottom_button_link\" class=\"$bottom_button_style\">" . $bottom_button_caption . "</a>";
                }
                if (get_field('left_block')['bottom_button2']['caption']) {
                    $bottom_button = get_field('left_block')['bottom_button2'];
                    $bottom_button_caption = $bottom_button['caption'];
                    $bottom_button_link = $bottom_button['link'];
                    $bottom_button_style = $bottom_button['style'];
                    echo "<a href=\"$bottom_button_link\" class=\"$bottom_button_style\">" . $bottom_button_caption . "</a>";
                }
                ?>


            </div>

            <?php if ($additional_content['content_type'] == "button") : ?>
                <div class="megablock-right d-flex">
                    <a class="<?php echo $additional_content['button']['style'] ?> mt-auto mb-4" href="<?php echo $additional_content['button']['link'] ?>"><?php echo $additional_content['button']['caption'] ?></a>
                </div>
            <?php endif; ?>

            <?php if ($additional_content['content_type'] == "text") : ?>
                <div class="d-flex align-items-center">
                    <p class="p-body mb-2"><?php echo $additional_content['text'] ?></p>
                </div>
            <?php endif; ?>
            <?php if ($additional_content['content_type'] == "images") :
                $num_of_images = count(get_field('images'));
                if (have_rows('images')) : ?>
                    <div class="megablock-right d-flex justify-content-center align-items-center gap-2">
                        <?php while (have_rows('images')) : the_row(); ?>
                            <?php if ($num_of_images > 1) : ?>
                                <div class="bordered-img-container">
                                    <img src="<?php echo get_sub_field('image') ?>" alt="Image">
                                </div>
                            <?php else : ?>
                                <img class="rounded-img" src="<?php echo get_sub_field('image') ?>" alt="Image">
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($additional_content['content_type'] == "reviews") : ?>
                <div class="megablock-right google-reviews">
                    <!--                    <img class="reviews-img" src="/wp-content/uploads/2023/10/google-reviews.png" alt="Google Reviews">-->
                    <?php echo do_shortcode('[trustindex no-registration=google]') ?>
                </div>
            <?php endif; ?>
            <?php if ($additional_content['content_type'] == "video") : ?>

                <div class="megablock-right wp-video video">
                    <video controls id="video" preload="metadata" poster="<?php echo $additional_content['video']['video_poster'] ?>">
                        <source src="<?php echo $additional_content['video']['video_file']; ?>" type="video/mp4">
                    </video>
                    <button id="play-btn" class="watch-our-video btn p-btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                            <circle opacity="0.6" cx="17" cy="17" r="17" fill="white" />
                            <circle cx="17" cy="17.0001" r="11.5909" fill="white" />
                            <path d="M21.0456 17.7551L15.3916 21.0356C14.9118 21.3141 14.2957 20.9771 14.2957 20.4166V13.8555C14.2957 13.2949 14.9103 12.9572 15.3916 13.2364L21.0456 16.5169C21.1547 16.5793 21.2454 16.6694 21.3085 16.7782C21.3715 16.8869 21.4048 17.0103 21.4048 17.136C21.4048 17.2617 21.3715 17.3852 21.3085 17.4939C21.2454 17.6026 21.1547 17.6927 21.0456 17.7551Z" fill="#B7CD00" />
                        </svg>
                        <span>Bekijk onze video</span></button>
                    <script>
                        const video = document.getElementById('video');
                        const playBtn = document.getElementById('play-btn');

                        function togglePlay(e) {
                            e.preventDefault();
                            console.log("OK");
                            if (video.paused || video.ended) {
                                video.play();
                            } else {
                                video.pause();
                            }
                        }

                        playBtn.addEventListener('click', togglePlay);
                        video.addEventListener("playing", function() {
                            playBtn.style.opacity = 0;
                        });
                        video.addEventListener("pause", function() {
                            playBtn.style.opacity = 1;
                        });
                    </script>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>