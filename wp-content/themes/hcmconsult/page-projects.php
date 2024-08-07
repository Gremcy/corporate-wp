<?php get_header(); ?>

<body class="projects-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="projects-main">
            <?php if(get_field('active_1')): ?>
                <div class="about-hero">
                    <div class="about-hero-overlay"></div>
                    <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                        <div class="about-hero-image">
                            <picture>
                                <source media="(max-width: 650px)" srcset="<?php echo $img_1['sizes']['1600x0']; ?>">
                                <source media="(max-width: 999px)" srcset="<?php echo $img_1['sizes']['1600x0']; ?>">
                                <source media="(min-width: 1000px)" srcset="<?php echo $img_1['sizes']['1600x0']; ?>">
                                <img src="<?php echo $img_1['sizes']['1600x0']; ?>" alt="">
                            </picture>
                        </div>
                    <?php endif; ?>
                    <div class="about-hero-1280">
                        <?php $title_1 = get_field('title_1'); if($title_1): ?><div class="about-hero-title"><?php echo $title_1; ?></div><?php endif; ?>
                        <?php $text_1 = get_field('text_1'); if($text_1): ?><div class="about-hero-description"><?php echo $text_1; ?></div><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php
                global $wp_query;
                \PS\Functions\Helper\Helper::get_projects();
                $custom_query = $wp_query;
                ?>
                <?php if ( $custom_query->have_posts() ): ?>
                    <div class="projects-projects__fluid">
                        <div class="container-1280">
                            <div class="projects-projects__content">
                                <?php $title_2 = get_field('title_2'); if($title_2): ?><div class="projects-projects__label"><?php echo $title_2; ?></div><?php endif; ?>
                                <div class="projects-projects__wrapper">
                                    <div class="projects-projects__list projects-ajax-loading" data-query_vars='<?php echo serialize($custom_query->query_vars); ?>' data-max_num_pages='<?php echo $custom_query->max_num_pages; ?>'>
                                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                            <?php get_template_part('parts/elements/project'); ?>
                                        <?php endwhile; ?>
                                    </div>

                                    <?php if($custom_query->max_num_pages > 1): ?>
                                        <div class="projects-projects__button description warning projects-see-more" data-default="<?php _e( 'See More', \PS::$theme_name ); ?>" data-wait="<?php _e( 'Wait', \PS::$theme_name ); ?>..">
                                            <div class="projects-projects__right-read-arrow right-read-arrow">
                                                <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A"/></svg>
                                            </div>
                                            <span><?php _e( 'See More', \PS::$theme_name ); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="projects-customers__fluid">
                    <div class="container-1280">
                        <div class="projects-customers__content">
                            <?php $title_3 = get_field('title_3'); if($title_3): ?><div class="projects-customers__label"><?php echo $title_3; ?></div><?php endif; ?>
                            <div class="projects-customers__wrapper">
                                <div class="projects-customers__header">
                                    <?php $title_3 = get_field('title_3'); if($title_3): ?><p class="title-s"><?php echo $title_3; ?></p><?php endif; ?>
                                    <?php $text_3 = get_field('text_3'); if($text_3): ?><?php echo str_ireplace('<p>', '<p class="description">', $text_3); ?><?php endif; ?>
                                </div>
                                <?php $logo_3 = get_field('logo_3'); if(is_array($logo_3) && count($logo_3)): ?>
                                    <div class="projects-customers__logos-list">
                                        <?php foreach ($logo_3 as $logo): ?>
                                            <div class="projects-customers__logos-item">
                                                <img src="<?php echo $logo['sizes']['480x0']; ?>" alt="" class="projects-customers__logos-image"/>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php $mobile_logos = array_chunk($logo_3, ceil(count($logo_3) / 3)); if(is_array($mobile_logos) && count($mobile_logos)): ?>
                                        <div class="customers-steps-mob__inner">
                                            <div class="customers-steps-mob__slider js-customers-steps-slider">
                                                <div class="swiper-wrapper">
                                                    <?php foreach ($mobile_logos as $logos): ?>
                                                        <div class="customers-steps-mob__slide swiper-slide">
                                                            <ul class="projects-customers-mob__logos-list">
                                                                <?php foreach ($logos as $logo): ?>
                                                                    <li class="projects-customers-mob__logos-item">
                                                                        <img src="<?php echo $logo['sizes']['480x0']; ?>" alt="" class="projects-customers-mob__logos-image"/>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="customers-steps-mob__pagination js-customers-steps-slider-pagination"></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <div class="home-contact-fluid">
                    <div class="home-contact-1280">
                        <div class="home-bottom-circle">
                            <div class="home-bottom-circle-inner"></div>
                        </div>
                        <?php $title_5 = get_field('title_5', \PS::$front_page); if($title_5): ?><div class="home-contact-left"><?php echo $title_5; ?></div><?php endif; ?>
                        <div class="home-contact-right">
                            <?php $email = get_field('email', \PS::$option_page); if($email): ?>
                                <a href="mailto:<?php echo $email; ?>" class="home-contact-email"><?php echo $email; ?></a>
                            <?php endif; ?>
                            <?php $text_5 = get_field('text_5', \PS::$front_page); if($text_5): ?><div class="home-contact-description"><?php echo $text_5; ?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </main>

        <?php get_template_part('parts/_footer'); ?>

        <?php get_template_part('parts/_popups'); ?>

        <?php
        global $wp_query;
        \PS\Functions\Helper\Helper::get_projects(true);
        $custom_query = $wp_query;
        ?>
        <?php if ( $custom_query->have_posts() ): ?>
            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                <div class="modal modal--sm js-modal projects" data-modal="projects-popup-<?php echo get_the_ID(); ?>">
                    <div class="modal__overlay js-close-modal"></div>
                    <div class="modal__content">
                        <div class="modal__close js-close-modal js-hide-cursor"><?php _e( 'close', \PS::$theme_name ); ?></div>
                        <div class="projects-popup__content">
                            <p class="title"><?php echo get_the_title(); ?></p>

                            <?php $file = get_field('file'); if($file): ?>
                                <a href="<?php echo $file; ?>" class="projects-popup__download" target="_blank">
                                    <img src="<?php echo \PS::$assets_url; ?>images/projects-popup/download-icon.svg" alt=""/>
                                    <p class="description"><?php _e( 'Download', \PS::$theme_name ); ?></p>
                                </a>
                            <?php endif; ?>

                            <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="" class="projects-popup__image"/>
                            <?php endif; ?>

                            <?php $text_2 = get_field('text_2'); if(is_array($text_2) && count($text_2)): ?>
                                <ul class="projects-popup__list">
                                    <?php foreach ($text_2 as $text): ?>
                                        <li class="projects-popup__item">
                                            <p class="subtitle"><?php echo $text['title']; ?></p>
                                            <div><?php echo str_ireplace([
                                                    '<p>',
                                                    '<ul>',
                                                    '<li>'
                                                ],
                                                [
                                                    '<p class="description">',
                                                    '<ul class="projects-popup-content__list">',
                                                    '<li class="projects-popup-content__item description">'
                                                ],
                                                $text['text']); ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        var query_vars = $('.projects-ajax-loading').data('query_vars');
        var current_page = 1;
        var max_num_pages = parseInt($('.projects-ajax-loading').data('max_num_pages'));
        var block_loading = false;
        $(document).on('click', '.projects-see-more', function() {
            if(block_loading === false){
                // button
                var load_button = $(this);
                load_button.find('span').html(load_button.data('wait'));

                // ajax
                var data = {
                    'action': 'loading_of_projects',
                    'query': query_vars,
                    'page': current_page
                };
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        // block
                        block_loading = true;
                    },
                    success: function (data) {
                        if (data.success) {
                            var $data = $(data.posts).filter(".projects-projects__item");
                            var imgLoad = imagesLoaded($data);
                            imgLoad.on('always', function () {
                                $('.projects-ajax-loading').append($data.hide().fadeIn(150));

                                // increase page
                                current_page++;

                                // button
                                if(current_page === max_num_pages){
                                    load_button.remove();
                                }else{
                                    load_button.find('span').html(load_button.data('default'));
                                }
                            });
                        }
                    },
                    complete: function () {
                        setTimeout(function(){
                            // block
                            block_loading = false;
                        }, 500);
                    }
                });
            }
            return false;
        });
    </script>
    <?php /* END */ ?>

</body>
</html>