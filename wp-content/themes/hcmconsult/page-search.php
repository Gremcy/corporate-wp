<?php get_header(); ?>

<?php
$post_types = [
    'service' => __( 'Services', \PS::$theme_name ),
    'project' => __( 'Projects', \PS::$theme_name ),
    'blog' => __( 'Blog', \PS::$theme_name ),
    'team' => __( 'Team', \PS::$theme_name ),
    'page' => __( 'Pages', \PS::$theme_name )
];
$find = isset($_GET['find']) ? wp_strip_all_tags($_GET['find'], true) : '';
$current_post_type = isset($_GET['type']) ? wp_strip_all_tags($_GET['type'], true) : '';
$results = [];
?>

<body class="search-result-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="search-result-main">
            <form class="result-input" action="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/search/'); ?>">
                <input name="find" type="text" value="<?php echo $find; ?>" placeholder="<?php _e( 'I am looking for', \PS::$theme_name ); ?>" autocomplete="off">
                <button type="submit" class="result-input-btn">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
                </button>
            </form>

            <?php $search_results = \PS\Functions\Helper\Helper::search_results($find); if(count($search_results)): ?>

                <div class="result-categories">
                    <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/search/?find=' . $find); ?>" class="result-categories-item<?php if(!$current_post_type): ?> active<?php endif; ?>"><?php _e( 'All', \PS::$theme_name ); ?></a>
                    <?php foreach ($post_types as $post_type => $title): ?>
                        <?php $results[$post_type] = $search_results = \PS\Functions\Helper\Helper::search_results($find, $post_type); if(is_array($results[$post_type]) && count($results[$post_type])): ?>
                            <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/search/?find=' . $find . '&type=' . $post_type); ?>" class="result-categories-item<?php if($current_post_type === $post_type): ?> active<?php endif; ?>"><?php echo $title; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="result-container-1280">
                    <?php foreach ($post_types as $post_type => $title): ?>
                        <?php if(is_array($results[$post_type]) && count($results[$post_type])): ?>
                            <?php if($current_post_type && $current_post_type !== $post_type): ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php foreach ($results[$post_type] as $post_id): ?>
                                <a href="<?php if($post_type === 'project' || $post_type === 'team'): ?>javascript:void(0)<?php else: ?><?php echo get_the_permalink($post_id); ?><?php endif; ?>" class="result-item<?php if($post_type === 'project' || $post_type === 'team'): ?> js-modal-link"<?php endif; ?>"<?php if($post_type === 'project'): ?> data-target="projects-popup-<?php echo $post_id; ?>"<?php elseif($post_type === 'team'): ?> data-target="member-popup-<?php echo $post_id; ?>"<?php endif; ?>>
                                    <div class="result-item-left">
                                        <div class="result-item-left-category"><?php echo $post_types[$post_type]; ?></div>
                                        <div class="result-item-left-heading"><?php echo get_the_title($post_id); ?></div>
                                        <?php if($post_type === 'project'): ?>
                                            <div class="result-item-left-text"><?php echo wp_strip_all_tags(get_field('text', $post_id), true); ?></div>
                                        <?php elseif($post_type === 'blog'): ?>
                                            <div class="result-item-left-text"><?php echo wp_strip_all_tags(get_field('text_1', $post_id), true); ?></div>
                                        <?php endif; ?>
                                        <?php if(in_array($post_type, ['service', 'project', 'blog'])): ?>
                                            <div class="result-item-left-date"><?php _e( 'Published', \PS::$theme_name ); ?>: <?php echo get_the_time('d/m/Y', $post_id); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="result-item-right">
                                        <div class="result-item-button">
                                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>

                <div class="result-container-1280">
                    <div class="result-item" style="border-bottom: none"><?php _e( 'Nothing found.', \PS::$theme_name ); ?></div>
                </div>

            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php if(is_array($results['project']) && count($results['project'])): ?>
            <?php foreach ($results['project'] as $post_id): ?>
                <div class="modal modal--sm js-modal projects" data-modal="projects-popup-<?php echo $post_id; ?>">
                    <div class="modal__overlay js-close-modal"></div>
                    <div class="modal__content">
                        <div class="modal__close js-close-modal js-hide-cursor"><?php _e( 'close', \PS::$theme_name ); ?></div>
                        <div class="projects-popup__content">
                            <p class="title"><?php echo get_the_title($post_id); ?></p>

                            <?php $file = get_field('file', $post_id); if($file): ?>
                                <a href="<?php echo $file; ?>" class="projects-popup__download" target="_blank">
                                    <img src="<?php echo \PS::$assets_url; ?>images/projects-popup/download-icon.svg" alt=""/>
                                    <p class="description"><?php _e( 'Download', \PS::$theme_name ); ?></p>
                                </a>
                            <?php endif; ?>

                            <?php $img = get_field('img', $post_id); if(is_array($img) && count($img)): ?>
                                <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="" class="projects-popup__image"/>
                            <?php endif; ?>

                            <?php $text_2 = get_field('text_2', $post_id); if(is_array($text_2) && count($text_2)): ?>
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

        <?php if(is_array($results['team']) && count($results['team'])): ?>
            <?php foreach ($results['team'] as $post_id): ?>
                <div class="modal modal--sm js-modal member" data-modal="member-popup-<?php echo $post_id; ?>">
                    <div class="modal__overlay js-close-modal"></div>
                    <div class="modal__content">
                        <div class="modal__close js-close-modal js-hide-cursor">
                            <?php _e( 'close', \PS::$theme_name ); ?>
                        </div>
                        <div class="member-content">
                            <div class="member-left-wrapper">
                                <div class="member-left-inner">
                                    <div class="member-left-name"><?php echo get_the_title($post_id); ?></div>

                                    <?php $position = get_field('position', $post_id); if($position): ?>
                                        <div class="member-left-post"><?php echo $position; ?></div>
                                    <?php endif; ?>

                                    <div class="member-left-text">
                                        <?php the_field('text_2', $post_id); ?>

                                        <?php $cols_2 = get_field('cols_2', $post_id); if(is_array($cols_2) && count($cols_2)): ?>
                                            <div class="member-list-wrapper">
                                                <?php foreach ($cols_2 as $col): ?>
                                                    <div class="member-list-item">
                                                        <?php if($col['title']): ?><div class="member-list-item-heading"><?php echo $col['title']; ?></div><?php endif; ?>
                                                        <?php if($col['text']): ?><?php echo $col['text']; ?><?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php $phone = get_field('phone', $post_id); if($phone): ?>
                                            <p><strong><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></strong></p>
                                        <?php endif; ?>

                                        <?php $email = get_field('email', $post_id); if($email): ?>
                                            <p><strong><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></strong></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php $img = get_field('img', $post_id); if(is_array($img) && count($img)): ?>
                                <div class="member-image">
                                    <img src="<?php echo $img['sizes']['1600x0']; ?>" alt="">
                                </div>
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