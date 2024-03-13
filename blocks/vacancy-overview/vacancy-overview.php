<?php

$class_name = 'vacancy-overview';
if (!empty($block['className'])) {
    $class_name .= " " . $block['className'];
}
?>

<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">

        <?php
        if (have_rows('vacancy_item')):

            // Loop through rows.
            while (have_rows('vacancy_item')) : the_row(); ?>
                <div class="row vacancy-item">
                    <div class="title-container col-lg-7 ps-2">
                        <h4 class="job-title"><?php echo get_sub_field('title') ?></h4>
                        <p class="job-description"><?php echo get_sub_field('description') ?></p>

                    </div>
                    <div class="col-lg-4 d-flex">
                        <div class="row w-100">
                            <div class="location-container col-8 d-flex flex-column justify-content-center">
                                <p class="location"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 15 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5013 5.99815C1.5017 4.84351 1.83523 3.71351 2.46189 2.74372C3.08854 1.77393 3.9817 1.00555 5.0342 0.530759C6.0867 0.0559691 7.25384 -0.10506 8.39559 0.0669909C9.53733 0.239042 10.6052 0.736867 11.471 1.50074C12.3369 2.2646 12.9639 3.26207 13.277 4.37346C13.59 5.48486 13.5757 6.66297 13.2359 7.76644C12.896 8.86992 12.2449 9.8519 11.3608 10.5946C10.4767 11.3372 9.39711 11.809 8.25153 11.9533V20.2486C8.25153 20.4475 8.17251 20.6383 8.03185 20.779C7.89119 20.9196 7.70042 20.9987 7.5015 20.9987C7.30258 20.9987 7.11181 20.9196 6.97115 20.779C6.8305 20.6383 6.75148 20.4475 6.75148 20.2486V11.9533C5.30113 11.7706 3.96738 11.0647 3.00067 9.96819C2.03396 8.87167 1.5008 7.45996 1.5013 5.99815ZM5.23893 18.8611C5.27146 19.0572 5.22483 19.2581 5.10928 19.4199C4.99372 19.5816 4.8187 19.6908 4.62265 19.7236C3.55512 19.8999 2.70259 20.1661 2.14007 20.4624C1.93352 20.5619 1.74575 20.6964 1.58505 20.8599C1.5489 20.8995 1.52012 20.9452 1.50005 20.9949V20.9999L1.50255 21.0124C1.50871 21.0301 1.51711 21.0469 1.52755 21.0624C1.58637 21.1491 1.6595 21.2252 1.74381 21.2874C1.99132 21.4812 2.39633 21.6912 2.96385 21.8787C4.08889 22.2537 5.69394 22.4999 7.50025 22.4999C9.30531 22.4999 10.9091 22.2549 12.0354 21.8787C12.6029 21.6899 13.0079 21.4812 13.2554 21.2862C13.3406 21.2241 13.4146 21.1481 13.4742 21.0612C13.4838 21.0455 13.4914 21.0287 13.4967 21.0111L13.5005 20.9987V20.9936C13.48 20.9439 13.4508 20.8982 13.4142 20.8586C13.2536 20.6954 13.0658 20.5613 12.8592 20.4624C12.2954 20.1661 11.4441 19.8999 10.3766 19.7236C10.2768 19.7105 10.1806 19.6774 10.0939 19.6264C10.0071 19.5753 9.93154 19.5073 9.87162 19.4264C9.8117 19.3455 9.76867 19.2534 9.74511 19.1555C9.72154 19.0577 9.71792 18.9561 9.73446 18.8568C9.75099 18.7575 9.78735 18.6625 9.84136 18.5776C9.89536 18.4926 9.96592 18.4194 10.0488 18.3623C10.1317 18.3052 10.2253 18.2654 10.3239 18.2452C10.4225 18.225 10.5242 18.2249 10.6229 18.2448C11.7779 18.4348 12.8004 18.7361 13.558 19.1348C14.2492 19.4998 15.0005 20.0999 15.0005 20.9999C15.0005 21.6387 14.6092 22.1274 14.1842 22.4649C13.7492 22.8075 13.1642 23.085 12.5092 23.3025C11.1929 23.7425 9.42157 24 7.50025 24C5.57769 24 3.80638 23.7425 2.49008 23.3025C1.83506 23.085 1.25004 22.8075 0.815027 22.4649C0.390013 22.1274 0 21.6399 0 20.9999C0 20.1011 0.750025 19.4998 1.4413 19.1348C2.19882 18.7361 3.22136 18.4348 4.3764 18.2448C4.57248 18.2123 4.77346 18.2589 4.93519 18.3745C5.09691 18.49 5.20616 18.665 5.23893 18.8611Z" fill="#0D1A29"/>
                                    </svg> <?php echo get_sub_field('location') ?></p>
                                <p class="hours-per-week"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M24 12C24 15.1826 22.7357 18.2348 20.4853 20.4853C18.2348 22.7357 15.1826 24 12 24C8.8174 24 5.76516 22.7357 3.51472 20.4853C1.26428 18.2348 0 15.1826 0 12C0 8.8174 1.26428 5.76516 3.51472 3.51472C5.76516 1.26428 8.8174 0 12 0C15.1826 0 18.2348 1.26428 20.4853 3.51472C22.7357 5.76516 24 8.8174 24 12ZM12 5.25C12 5.05109 11.921 4.86032 11.7803 4.71967C11.6397 4.57902 11.4489 4.5 11.25 4.5C11.0511 4.5 10.8603 4.57902 10.7197 4.71967C10.579 4.86032 10.5 5.05109 10.5 5.25V13.5C10.4998 13.6323 10.5347 13.7623 10.6011 13.8768C10.6675 13.9913 10.763 14.0861 10.878 14.1516L16.128 17.1516C16.3003 17.2447 16.5022 17.2667 16.6905 17.213C16.8788 17.1592 17.0386 17.0339 17.1358 16.8639C17.2329 16.6939 17.2597 16.4926 17.2104 16.303C17.1612 16.1135 17.0397 15.9508 16.872 15.8496L12 13.0644V5.25Z" fill="#0D1A29"/>
                                    </svg> <?php echo get_sub_field('hours_per_week') ?></p>

                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <a class="p-btn-circle" href="<?php echo get_sub_field('link_to_job') ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="15" viewBox="0 0 22 15" fill="none">
                                        <path d="M5.68248e-07 7.5L20 7.5M20 7.5L13.5 0.999999M20 7.5L13.5 14" stroke="white" stroke-width="1.6"/>
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endwhile;

        // No value.
        else :
            // Do something...
        endif;
        ?>

    </div>
</section>
