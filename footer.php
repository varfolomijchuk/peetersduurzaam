<footer class="container-fluid">
    <div class="container footer-top">
        <div class="row">
            <div class="col-lg-4">
                <?php
                $site_logo_id = get_theme_mod('custom_logo');
                $site_logo = wp_get_attachment_image_src($site_logo_id, 'full');
                ?>
                <img class="footer-logo" src="<?php echo esc_url($site_logo[0]) ?>" alt="<?php echo get_bloginfo('name') ?>">
                <p>Al meer dan 10 jaar uw vertrouwde partner voor advies en integratie van duurzame energie met behulp
                    van
                    zonnepanelen en laadpalen.</p>
            </div>
            <div class="col-lg-4">
                <h5>Neem contact met ons op</h5>
				<p class="info-mail"><a href="mailto:info@peetersduurzaam.nl">info@peetersduurzaam.nl</a><span class="phone-dot"><a href="tel:0495230032">0495 - 230 032</a></span></p>
                <h6>Locatie Nederweert</h6>
                <p>Platinastraat 6a <br>
                    6031 TW Nederweert</p>
            </div>
            <div class="col-lg-4">
                <h5>Volg ons op</h5>
                <p>Blijf op de hoogte en praat mee.</p>
                <div class="social-icons test">
                    <?php if ($instagram_url = get_field('social_icons', 'option')['instagram']) : ?>
                        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <style>svg {
                                        fill: #ffffff
                                    }</style>
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($facebook_url = get_field('social_icons', 'option')['facebook']) : ?>
                        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                <style>svg {
                                        fill: #ffffff
                                    }</style>
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($linkedin_url = get_field('linkedin', 'option')) : ?>
                        <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                <style>svg {
                                        fill: #ffffff
                                    }</style>
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <div class="container footer-middle">
        <div class="row footer-menus">

            <div class="col-lg-3">
                <h6><?php echo wp_get_nav_menu_object(3)->name; ?></h6>
                <nav class="footer__column--navigation" role="navigation">
                    <?php
                    $args = [
                        'theme_location' => 'footer-menu-1'
                    ];
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
            <div class="col-lg-3">
                <h6><?php echo wp_get_nav_menu_object(4)->name; ?></h6>
                <nav class="footer__column--navigation" role="navigation">
                    <?php
                    $args = [
                        'theme_location' => 'footer-menu-2'
                    ];
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
            <div class="col-lg-3">
                <h6><?php echo wp_get_nav_menu_object(5)->name; ?></h6>
                <nav class="footer__column--navigation" role="navigation">
                    <?php
                    $args = [
                        'theme_location' => 'footer-menu-3'
                    ];
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
            <div class="col-lg-3">
                <h6><?php echo wp_get_nav_menu_object(6)->name; ?></h6>
                <nav class="footer__column--navigation" role="navigation">
                    <?php
                    $args = [
                        'theme_location' => 'footer-menu-4'
                    ];
                    wp_nav_menu($args);
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 copyright-links">
                    <ul>
                        <li>© Peeters Duurzaam B.V.</li>
						<?php
							$locations = get_nav_menu_locations();
							$menu_slug = isset($locations['footer-copyright-menu']) ? $locations['footer-copyright-menu'] : '';
							$menu_items = wp_get_nav_menu_items($menu_slug);
							if (!empty($menu_items) && is_array($menu_items)) {
								foreach($menu_items as $menu_item) {
									?>
										<li>
											<a href="<?php echo esc_url($menu_item->url); ?>" title="<?php echo esc_attr($menu_item->title); ?>" target="<?php echo !empty($menu_item->target) ? esc_attr($menu_item->target) : '_self' ?>"><?php echo  esc_html($menu_item->title); ?></a>
										</li>
									<?php
								}
							}
						?>
<!--                         <li><a href="#">Algemene voorwaarden</a></li>
                        <li><a href="#">Privacybeleid</a></li> -->
                    </ul>
                </div>
                <div class="col-12 col-md-4 col-lg-4 trienekens-link">
                    <span>Website door <a href="https://trienekensonline.com/" target="_blank">Trienekens Online</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<?php wp_footer(); ?>
</html>