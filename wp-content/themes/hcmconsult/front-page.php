<?php get_header(); ?>

<body class="home-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="home">
            <?php if(get_field('active_1')): ?>
                <div class="home-hero-fluid">
                    <div class="home-hero-1280">
                        <div class="home-hero-left">
                            <?php $title_1 = get_field('title_1'); if($title_1): ?><div class="home-hero-left-title"><?php echo $title_1; ?></div><?php endif; ?>
                            <?php $text_1 = get_field('text_1'); if($text_1): ?><div class="home-hero-left-description"><?php echo $text_1; ?></div><?php endif; ?>
                            <div class="home-hero-left-bottom">
                                <a href="<?php echo get_the_permalink(\PS::$about_page); ?>" class="home-hero-left-more-btn"><?php _e( 'More about us', \PS::$theme_name ); ?></a>
                                <?php $video_1 = get_field('video_1'); if($video_1): ?>
                                    <div class="home-hero-left-video-btn js-modal-link" data-target="video-popup">
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.3999 12.205V6.60004L12.4889 9.44705L7.3999 12.205Z" fill="#C85904" /><circle cx="9.4002" cy="9.39995" r="8.8" stroke="#C85904" stroke-width="0.8" /></svg>
                                        <span><?php _e( 'Watch video', \PS::$theme_name ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="home-hero-right">
                            <?php $media_1 = get_field('media_1'); if($media_1['type'] === 'img'): ?>
                                <?php if(is_array($media_1['img']) && count($media_1['img'])): ?>
                                    <img src="<?php echo $media_1['img']['sizes']['1600x0']; ?>" alt="">
                                <?php endif; ?>
                            <?php elseif($media_1['type'] === 'mp4'): ?>
                                <?php if($media_1['mp4']): ?>
                                    <video preload="auto" no-controls autoplay loop playsinline muted>
                                        <source src="<?php echo $media_1['mp4']; ?>" type='video/mp4' />
                                    </video>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <div class="home-what-fluid">
                    <div class="home-what-1280">
                        <?php $title_2 = get_field('title_2'); if($title_2): ?><div class="home-what-left"><?php echo $title_2; ?></div><?php endif; ?>
                        <div class="home-what-right">
                            <?php $blocks_2 = get_field('blocks_2'); if(is_array($blocks_2) && count($blocks_2)): ?>
                                <div class="home-what-container">
                                    <?php foreach ($blocks_2 as $block): ?>
                                        <div class="home-what-item">
                                            <div class="home-what-item-name"><?php echo $block['text']; ?></div>
                                            <div class="home-what-item-number" style="color: #f07d00"><?php echo $block['number']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php $text_2 = get_field('text_2'); if($text_2): ?><div class="home-what-description"><?php echo $text_2; ?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <?php $service_categories = get_terms(['taxonomy' => 'service_category']); if(is_array($service_categories) && count($service_categories)): ?>
                    <div class="home-services-fluid">
                        <div class="home-services-background-image">
                            <img src="<?php echo \PS::$assets_url; ?>images/2.jpg" alt="">
                        </div>
                        <div class="home-services-background-overlay"></div>
                        <div class="home-services-1280">
                            <?php $title_3 = get_field('title_3'); if($title_3): ?><div class="home-services-left"><?php echo $title_3; ?></div><?php endif; ?>
                            <div class="home-services-right">
                                <div class="home-services-container">
                                    <?php foreach ($service_categories as $n => $service_category): ?>
                                        <div class="home-services-item">
                                            <div class="home-services-item__num"><?php echo sprintf( '%02d', ($n + 1)); ?></div>
                                            <div class="home-services-item__title"><?php echo $service_category->name; ?></div>
                                            <?php $description = get_field('description', 'term_' . $service_category->term_id); if($description): ?><div class="home-services-item__description"><?php echo $description; ?></div><?php endif; ?>
                                            <a href="<?php echo get_the_permalink(\PS::$services_page); ?>#<?php echo $service_category->slug; ?>" class="home-services-item__btn">
                                                <div class="home-services-item__btn-circle">
                                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.35355 4.35355C8.54882 4.15829 8.54882 3.84171 8.35355 3.64645L5.17157 0.464466C4.97631 0.269204 4.65973 0.269204 4.46447 0.464466C4.2692 0.659728 4.2692 0.976311 4.46447 1.17157L7.29289 4L4.46447 6.82843C4.2692 7.02369 4.2692 7.34027 4.46447 7.53553C4.65973 7.7308 4.97631 7.7308 5.17157 7.53553L8.35355 4.35355ZM0 4.5L8 4.5V3.5L0 3.5L0 4.5Z" fill="white" /></svg>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php $projects_4 = get_field('projects_4'); if(is_array($projects_4) && count($projects_4)): ?>
                    <div class="home-projects-fluid">
                        <div class="home-projects-1280">
                            <div class="home-projects-left">
                                <?php $title_4 = get_field('title_4'); if($title_4): ?><div class="home-projects-left-title"><?php echo $title_4; ?></div><?php endif; ?>
                                <a href="<?php echo get_the_permalink(\PS::$projects_page); ?>" class="home-projects-left-more-btn"><?php _e( 'See more projects', \PS::$theme_name ); ?></a>
                            </div>
                            <div class="home-projects-right">
                                <div class="home-projects-container">
                                    <?php foreach ($projects_4 as $project_id): ?>
                                        <a href="javascript:void(0)" class="home-projects-item js-modal-link" data-target="projects-popup-<?php echo $project_id; ?>">
                                            <?php $img = get_field('img', $project_id); if(is_array($img) && count($img)): ?>
                                                <div class="home-projects-item-image">
                                                    <img src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                                </div>
                                            <?php endif; ?>

                                            <div class="home-projects-item-center">
                                                <div class="home-projects-item-center-name"><?php echo get_the_title($project_id); ?></div>
                                                <div class="home-projects-item-center-date"><?php echo get_the_time('j F Y', $project_id); ?></div>
                                            </div>

                                            <div class="home-projects-item__btn">
                                                <div class="home-projects-item__btn-circle">
                                                    <svg viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.35355 4.35355C8.54882 4.15829 8.54882 3.84171 8.35355 3.64645L5.17157 0.464466C4.97631 0.269204 4.65973 0.269204 4.46447 0.464466C4.2692 0.659728 4.2692 0.976311 4.46447 1.17157L7.29289 4L4.46447 6.82843C4.2692 7.02369 4.2692 7.34027 4.46447 7.53553C4.65973 7.7308 4.97631 7.7308 5.17157 7.53553L8.35355 4.35355ZM0 4.5L8 4.5V3.5L0 3.5L0 4.5Z" fill="white" /></svg>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="home-contact-fluid">
                    <div class="home-contact-1280">
                        <div class="home-bottom-circle">
                            <div class="home-bottom-circle-inner"></div>
                        </div>
                        <?php $title_5 = get_field('title_5'); if($title_5): ?><div class="home-contact-left"><?php echo $title_5; ?></div><?php endif; ?>
                        <div class="home-contact-right">
                            <?php $email = get_field('email', \PS::$option_page); if($email): ?>
                                <a href="mailto:<?php echo $email; ?>" class="home-contact-email"><?php echo $email; ?></a>
                            <?php endif; ?>
                            <?php $text_5 = get_field('text_5'); if($text_5): ?><div class="home-contact-description"><?php echo $text_5; ?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </main>

        <?php get_template_part('parts/_footer'); ?>

        <?php get_template_part('parts/_popups'); ?>

        <?php $video_1 = get_field('video_1'); if($video_1): ?>
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

        <?php if(isset($projects_4) && is_array($projects_4) && count($projects_4)): ?>
            <?php foreach ($projects_4 as $project_id): ?>
                <div class="modal modal--sm js-modal projects" data-modal="projects-popup-<?php echo $project_id; ?>">
                    <div class="modal__overlay js-close-modal"></div>
                    <div class="modal__content">
                        <div class="modal__close js-close-modal js-hide-cursor"><?php _e( 'close', \PS::$theme_name ); ?></div>
                        <div class="projects-popup__content">
                            <p class="title"><?php echo get_the_title($project_id); ?></p>

                            <?php $file = get_field('file', $project_id); if($file): ?>
                                <a href="<?php echo $file; ?>" class="projects-popup__download" target="_blank">
                                    <img src="<?php echo \PS::$assets_url; ?>images/projects-popup/download-icon.svg" alt=""/>
                                    <p class="description"><?php _e( 'Download', \PS::$theme_name ); ?></p>
                                </a>
                            <?php endif; ?>

                            <?php $img = get_field('img', $project_id); if(is_array($img) && count($img)): ?>
                                <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="" class="projects-popup__image"/>
                            <?php endif; ?>

                            <?php $text_2 = get_field('text_2', $project_id); if(is_array($text_2) && count($text_2)): ?>
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
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>