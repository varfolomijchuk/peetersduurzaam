<?php

$class_name = 'text-button-media';
if (!empty($block['className'])) {
    $class_name = $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>" >
    <div class="container">
        <div class="row">
            <div class="text-wrapper col-lg-6">
                <h4 class="block-subtitle">Over ons</h4>
                <h2 class="block-title">Wij zijn Peeters Duurzaam</h2>
                <p>Ons familiebedrijf heeft een sterke reputatie in Zuidoost-Brabant, Noord- en Midden-Limburg, dankzij vele tevreden klanten. Wij voorzien woningen, bedrijfspanden en bouwprojecten in Weert, Nederweert, Roermond, Eindhoven en omgeving van zonnepanelen, laadpalen en (hybride) warmtepompen. Als erkend duurzaam installateur (InstallQ) werken we met kwaliteitsmaterialen en ervaren monteurs en adviseurs. We begrijpen dat elke situatie anders is en staan klaar voor persoonlijke adviesgesprekken, waarin jouw wensen en vragen centraal staan. Ben je klaar om te besparen?</p>
                <a class="btn p-btn-primary" href="#">Gratis adviesgesprek</a>
            </div>
            <div class="media-wrapper col-lg-6">
                <img class="media-preview" src="/wp-content/uploads/2023/10/video_preview1.jpg" alt="">
                <a class="watch-our-video btn p-btn-primary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                        <circle opacity="0.6" cx="17" cy="17" r="17" fill="white"/>
                        <circle cx="17" cy="17.0001" r="11.5909" fill="white"/>
                        <path d="M21.0456 17.7551L15.3916 21.0356C14.9118 21.3141 14.2957 20.9771 14.2957 20.4166V13.8555C14.2957 13.2949 14.9103 12.9572 15.3916 13.2364L21.0456 16.5169C21.1547 16.5793 21.2454 16.6694 21.3085 16.7782C21.3715 16.8869 21.4048 17.0103 21.4048 17.136C21.4048 17.2617 21.3715 17.3852 21.3085 17.4939C21.2454 17.6026 21.1547 17.6927 21.0456 17.7551Z" fill="#B7CD00"/>
                    </svg><span>Bekijk onze video</span></a>
            </div>
            <?php

            ?>
        </div>
    </div>
</section>
