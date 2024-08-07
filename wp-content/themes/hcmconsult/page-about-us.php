<?php get_header(); ?>

<body class="about-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="about-main">
            <?php if(get_field('active_1')): ?>
                <div class="about-hero">
                    <div class="about-hero-overlay"></div>
                    <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                        <div class="about-hero-image">
                            <picture>
                                <?php $img_1_3 = get_field('img_1_3'); if(is_array($img_1_3) && count($img_1_3)): ?><source media="(max-width: 650px)" srcset="<?php echo $img_1_3['sizes']['960x0']; ?>"><?php endif; ?>
                                <?php $img_1_2 = get_field('img_1_2'); if(is_array($img_1_2) && count($img_1_2)): ?><source media="(max-width: 999px)" srcset="<?php echo $img_1_2['sizes']['1600x0']; ?>"><?php endif; ?>
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

            <?php if(get_field('active_6')): ?>
                <div class="home-what-fluid">
                    <div class="home-what-1280">
                        <?php $title_2 = get_field('title_2', \PS::$front_page); if($title_2): ?><div class="home-what-left"><?php echo $title_2; ?></div><?php endif; ?>
                        <div class="home-what-right">
                            <?php $blocks_2 = get_field('blocks_2', \PS::$front_page); if(is_array($blocks_2) && count($blocks_2)): ?>
                                <div class="home-what-container">
                                    <?php foreach ($blocks_2 as $block): ?>
                                        <div class="home-what-item">
                                            <div class="home-what-item-name"><?php echo $block['text']; ?></div>
                                            <div class="home-what-item-number" style="color: #f07d00"><?php echo $block['number']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php $text_2 = get_field('text_2', \PS::$front_page); if($text_2): ?><div class="home-what-description"><?php echo $text_2; ?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <div class="about-offer-fluid">
                    <div class="about-offer-1280">
                        <?php $title_2 = get_field('title_2'); if($title_2): ?><div class="about-offer-title"><?php echo $title_2; ?></div><?php endif; ?>
                        <?php $blocks_2 = get_field('blocks_2'); if(is_array($blocks_2) && count($blocks_2)): ?>
                            <div class="about-offer-container">
                                <?php foreach ($blocks_2 as $block): ?>
                                    <div class="about-offer-item">
                                        <div class="about-offer-item-content">
                                            <div class="about-offer-item-content-top">
                                                <div class="about-offer-item-content__name"><?php echo $block['title']; ?></div>
                                                <?php if(is_array($block['icon']) && count($block['icon'])): ?>
                                                    <div class="about-offer-item-content__icon">
                                                        <img src="<?php echo $block['icon']['sizes']['480x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="about-offer-item-content__description"><?php echo $block['text']; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="about-approach-fluid">
                    <div class="about-approach-1280">
                        <?php $title_3 = get_field('title_3'); if($title_3): ?><div class="about-approach-title"><?php echo $title_3; ?></div><?php endif; ?>
                        <?php $blocks_3 = get_field('blocks_3'); if(is_array($blocks_3) && count($blocks_3)): ?>
                            <div class="about-approach-container">
                                <div class="about-approach-circle"></div>
                                <?php foreach ($blocks_3 as $m => $block): ?>
                                    <div class="about-approach-item<?php if(($m + 1) === count($blocks_3)): ?> full <?php endif; ?>">
                                        <div class="about-approach-item-name"><?php echo $block['title']; ?></div>
                                        <div class="about-approach-item-description"><?php echo $block['text']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php $team_categories = get_terms(['taxonomy' => 'team_category']); if(is_array($team_categories) && count($team_categories)): ?>
                    <div class="about-people-fluid">
                        <div class="about-people-top-line-1280">
                            <?php $title_4 = get_field('title_4'); if($title_4): ?><div class="about-people-top-left"><?php echo $title_4; ?></div><?php endif; ?>
                            <?php $text_4 = get_field('text_4'); if($text_4): ?><div class="about-people-top-right"><?php echo $text_4; ?></div><?php endif; ?>
                        </div>
                    </div>

                    <?php foreach ($team_categories as $n => $team_category): ?>
                        <div class="about-<?php if($n % 2): ?>consultants<?php else: ?>leadership<?php endif; ?>-fluid">
                            <div class="about-<?php if($n % 2): ?>consultants<?php else: ?>leadership<?php endif; ?>-1280">
                                <div class="about-<?php if($n % 2): ?>consultants<?php else: ?>leadership<?php endif; ?>-content">
                                    <div class="pin-rect pin-label<?php echo $n + 1; ?>">
                                        <div class="about-leadership-label">
                                            <div class="about-leadership-label-inner"><?php echo $team_category->name; ?></div>
                                        </div>
                                    </div>
                                    <div class="about-leadership-container">
                                        <?php
                                        global $wp_query;
                                        \PS\Functions\Helper\Helper::get_team($team_category->term_id);
                                        $custom_query = $wp_query;
                                        ?>
                                        <?php if ( $custom_query->have_posts() ): ?>
                                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                <a href="javascript:void(0)" class="about-leadership-item js-modal-link" data-target="member-popup-<?php echo get_the_ID(); ?>">
                                                    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                                        <div class="about-leadership-item-image">
                                                            <img src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php $position = get_field('position'); if($position): ?>
                                                        <div class="about-<?php if($n % 2): ?>consultants<?php else: ?>leadership<?php endif; ?>-item-post"><?php echo $position; ?></div>
                                                    <?php endif; ?>
                                                    <div class="about-<?php if($n % 2): ?>consultants<?php else: ?>leadership<?php endif; ?>-item-name"><?php echo get_the_title(); ?></div>
                                                </a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="about-engagement-fluid">
                    <div class="about-engagement-1280">
                        <?php $title_5 = get_field('title_5'); if($title_5): ?><div class="about-engagement-left"><?php echo $title_5; ?></div><?php endif; ?>
                        <div class="about-engagement-right">
                            <?php $text_5 = get_field('text_5'); if($text_5): ?><div class="about-engagement-right-text"><?php echo $text_5; ?></div><?php endif; ?>
                            <a href="<?php echo get_the_permalink(\PS::$social_page); ?>" class="about-engagement-right-read">
                                <span><?php _e( 'Read', \PS::$theme_name ); ?></span>
                                <div class="about-engagement-right-read-arrow">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php $video_1 = get_field('video_1', \PS::$front_page); if($video_1): ?>
            <div class="modal modal--sm js-modal video" data-modal="video-popup">
                <div class="modal__overlay js-close-modal video-popup-overlay"></div>
                <div class="video-popup-content">
                    <div class="video-popup-close js-close-modal"><?php _e( 'close', \PS::$theme_name ); ?></div>
                    <div class="video-popup-container">
                        <video id="video-in-popup" preload="auto" controls loop playsinline>
                            <source src="<?php echo $video_1; ?>" type='video/mp4' />
                        </video>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        global $wp_query;
        \PS\Functions\Helper\Helper::get_team();
        $custom_query = $wp_query;
        ?>
        <?php if ( $custom_query->have_posts() ): ?>
            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                <div class="modal modal--sm js-modal member" data-modal="member-popup-<?php echo get_the_ID(); ?>">
                    <div class="modal__overlay js-close-modal"></div>
                    <div class="modal__content">
                        <div class="modal__close js-close-modal js-hide-cursor">
                            <?php _e( 'close', \PS::$theme_name ); ?>
                        </div>
                        <div class="member-content">
                            <div class="member-left-wrapper">
                                <div class="member-left-inner">
                                    <div class="member-left-name"><?php echo get_the_title(); ?></div>

                                    <?php $position = get_field('position'); if($position): ?>
                                        <div class="member-left-post"><?php echo $position; ?></div>
                                    <?php endif; ?>

                                    <div class="member-left-text">
                                        <?php the_field('text_2'); ?>

                                        <?php $cols_2 = get_field('cols_2'); if(is_array($cols_2) && count($cols_2)): ?>
                                            <div class="member-list-wrapper">
                                                <?php foreach ($cols_2 as $col): ?>
                                                    <div class="member-list-item">
                                                        <?php if($col['title']): ?><div class="member-list-item-heading"><?php echo $col['title']; ?></div><?php endif; ?>
                                                        <?php if($col['text']): ?><?php echo $col['text']; ?><?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php $phone = get_field('phone'); if($phone): ?>
                                            <p><strong><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></strong></p>
                                        <?php endif; ?>

                                        <?php $email = get_field('email'); if($email): ?>
                                            <p><strong><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></strong></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                <div class="member-image">
                                    <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="">
                                </div>
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
    <?php if($video_1): ?>
        <script>
            $(document).ready(function(){
                // video
                if(window.location.hash === '#video'){
                    $('body').addClass('is-hidden');
                    $("[data-modal='video-popup']").fadeIn(100).addClass("is-open");
                }
            });
        </script>
    <?php endif; ?>
    <?php /* END */ ?>

</body>
</html>