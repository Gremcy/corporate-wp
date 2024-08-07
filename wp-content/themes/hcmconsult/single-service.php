<?php get_header(); ?>

<body class="service-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="service">
            <?php if(get_field('active_1')): ?>
                <div class="service-hero-fluid">
                    <div class="service-hero-overlay"></div>
                    <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                        <div class="service-hero-image">
                            <img src="<?php echo $img_1['sizes']['1600x0']; ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="service-hero-1280">
                        <div class="service-hero-title"><?php echo get_the_title(); ?></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $list_2 = get_field('list_2'); if(is_array($list_2) && count($list_2)): ?>
                    <div class="service-directions-fluid">
                        <div class="service-directions-1280">
                            <?php foreach ($list_2 as $li): ?>
                                <div class="service-directions-item">
                                    <div class="service-directions-item-title"><?php echo $li['title']; ?></div>
                                    <div class="service-directions-item-description"><?php echo $li['text']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="service-expertise-fluid">
                    <?php $list_2_2 = get_field('list_2_2'); if(is_array($list_2_2) && count($list_2_2)): ?>
                        <div class="service-expertise-left">
                            <div class="service-expertise-left-content">
                                <?php $title_2_2 = get_field('title_2_2'); if($title_2_2): ?><div class="service-expertise-left-content-title"><?php echo $title_2_2; ?></div><?php endif; ?>
                                <ul class="service-expertise-left-content-list">
                                    <?php foreach ($list_2_2 as $li): ?>
                                        <li><?php echo $li['text']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $img_2_2 = get_field('img_2_2'); if(is_array($img_2_2) && count($img_2_2)): ?>
                        <div class="service-expertise-right">
                            <img src="<?php echo $img_2_2['sizes']['1600x0']; ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="service-benefit-fluid">
                    <div class="service-benefit-1280">
                        <?php $img_2_3 = get_field('img_2_3'); if(is_array($img_2_3) && count($img_2_3)): ?>
                            <div class="service-benefit-left">
                                <div class="service-benefit-left-circle"></div>
                                <div class="service-benefit-left-image">
                                    <img src="<?php echo $img_2_3['sizes']['1600x0']; ?>" alt="">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $list_2_3 = get_field('list_2_3'); if(is_array($list_2_3) && count($list_2_3)): ?>
                            <div class="service-benefit-right">
                                <?php $title_2_3 = get_field('title_2_3'); if($title_2_3): ?><div class="service-benefit-right-title"><?php echo $title_2_3; ?></div><?php endif; ?>
                                <ul class="service-benefit-right-list">
                                    <?php foreach ($list_2_3 as $li): ?>
                                        <li><?php echo $li['text']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <?php $projects_3 = get_field('projects_3'); if(is_array($projects_3) && count($projects_3)): ?>
                    <div class="service-projects-fluid">
                        <div class="home-projects-1280">
                            <div class="home-projects-left">
                                <div class="home-projects-left-title"><?php _e( 'Related Projects', \PS::$theme_name ); ?></div>
                                <a href="<?php echo get_the_permalink(\PS::$projects_page); ?>" class="home-projects-left-more-btn"><?php _e( 'See more projects', \PS::$theme_name ); ?></a>
                            </div>
                            <div class="home-projects-right">
                                <div class="home-projects-container">
                                    <?php foreach ($projects_3 as $project_id): ?>
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

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php if(isset($projects_3) && is_array($projects_3) && count($projects_3)): ?>
            <?php foreach ($projects_3 as $project_id): ?>
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