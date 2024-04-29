<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'profiles';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
$profiles  = get_field('profiles');
?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="block-header">
            <h5 class="subtitle"><?php echo get_field('header')['subtitle'] ?></h5>
            <h2 class="title"><?php echo get_field('header')['title'] ?></h2>
        </div>
        <div class="container carousel-wrapper">
            <?php if (have_rows('profiles')):
                while (have_rows('profiles')) : the_row(); ?>
                    <div class="profile-container">
                        <div class="img-wrapper">
                            <img src="<?php echo get_sub_field('image') ?>" alt="Carousel Image">
                        </div>

                        <div class="info">
                            <h5 class="profile-name"><?php echo get_sub_field('name') ?></h5>
                            <h6 class="profile-role"><?php echo get_sub_field('role') ?></h6>
                        </div>
                        <div class="contacts">
                            <a class="phone" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M1.4141 0.382754C1.54528 0.251717 1.7028 0.150054 1.87623 0.0845033C2.04967 0.0189524 2.23505 -0.00899018 2.4201 0.00252689C2.60514 0.014044 2.78563 0.0647578 2.9496 0.151308C3.11357 0.237858 3.25727 0.358269 3.3712 0.504562L4.71753 2.23446C4.83928 2.39105 4.92383 2.57327 4.96478 2.76736C5.00574 2.96144 5.00202 3.16229 4.95391 3.35473L4.54353 4.99762C4.52237 5.08275 4.52356 5.1719 4.547 5.25643C4.57044 5.34096 4.61534 5.41799 4.67733 5.48005L6.51923 7.32216C6.58137 7.38441 6.65859 7.42946 6.74336 7.45291C6.82812 7.47637 6.91752 7.47742 7.00281 7.45597L8.64432 7.04614C8.83679 6.9979 9.0377 6.99406 9.23186 7.03491C9.42603 7.07576 9.60836 7.16024 9.76507 7.28196L11.4942 8.62783C11.6408 8.74166 11.7615 8.88539 11.8482 9.04947C11.935 9.21354 11.9859 9.39421 11.9975 9.57946C12.009 9.76471 11.9811 9.9503 11.9154 10.1239C11.8497 10.2975 11.7479 10.4551 11.6166 10.5863L10.8408 11.3616C10.2858 11.9166 9.45668 12.1602 8.68332 11.8884C6.70442 11.192 4.90769 10.0589 3.42639 8.57323C1.94087 7.09178 0.807914 5.29485 0.111564 3.31573C-0.160223 2.54348 0.0833649 1.71363 0.638336 1.158L1.4141 0.383355V0.382754Z"
                                          fill="#B7CD00"/>
                                </svg>
                            </a>
                            <a class="e-mail" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M6.70625 0.17873C6.48899 0.061383 6.24654 0 6.00031 0C5.75408 0 5.51163 0.061383 5.29438 0.17873L0.794375 2.60906C0.554529 2.73868 0.35398 2.93187 0.214171 3.16798C0.074362 3.40409 0.00054943 3.67424 0.000624955 3.94954V4.18751L5.03188 7.17415L6.00062 6.62859L6.96875 7.17415L12 4.18751V3.94954C12.0001 3.67424 11.9263 3.40409 11.7865 3.16798C11.6466 2.93187 11.4461 2.73868 11.2063 2.60906L6.70625 0.17873ZM12 5.06787L7.73062 7.60262L12 10.0038V5.06787ZM11.9563 10.8481L6 7.49756L0.0443749 10.8481C0.125303 11.1772 0.31264 11.4693 0.576546 11.6781C0.840453 11.8868 1.16575 12.0002 1.50063 12H10.5006C10.8353 11.9999 11.1603 11.8864 11.4239 11.6777C11.6876 11.469 11.8747 11.177 11.9556 10.8481H11.9563ZM0 10.0045L4.27 7.60262L0 5.06787V10.0045Z" fill="#B7CD00"/>
                                </svg>
                            </a>
                            <a class="linkedin" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M10.5396 3.71094C8.94416 3.71094 8.23009 4.49579 7.82906 5.04829V5.07669H7.80887L7.82906 5.04829V3.9007H4.82422C4.86173 4.66102 4.82422 11.9971 4.82422 11.9971H7.82906V7.47772C7.82906 7.23503 7.84926 6.99364 7.9286 6.82066C8.14498 6.33787 8.63978 5.83701 9.47069 5.83701C10.5584 5.83701 10.994 6.57798 10.994 7.66748V11.9997H14.0003V7.35638C14.0003 4.86756 12.5174 3.71094 10.5396 3.71094Z" fill="#B7CD00"/>
                                    <path d="M3.18546 3.90039H0.177734V11.9968H3.18546V3.90039Z" fill="#B7CD00"/>
                                    <path d="M1.70222 0C0.670788 0 0 0.604131 0 1.39802C0 2.19191 0.652035 2.79604 1.66182 2.79604H1.68202C2.72931 2.79604 3.38279 2.17513 3.38279 1.39802C3.36404 0.60284 2.73076 0 1.70222 0Z" fill="#B7CD00"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>
<script>
    //$('.carousel-wrapper').slick({
    //    autoplay: false,
    //    arrows: true,
    //    infinite: true,
    //    slidesToShow: <?php //echo count($profiles) - 1 ?>//,
    //    slidesToScroll: 1,
    //    variableWidth: true
    //});
    if ($('.profiles').length) {
        $('.profiles .carousel-wrapper').each((id, el) => {
            $(el).slick({
                autoplay: false,
                arrows: true,
                infinite: true,
                slidesToShow: <?php echo count($profiles) - 1 ?>,
                slidesToScroll: 1,
                variableWidth: true
            });
        });
    }
</script>