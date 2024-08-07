<?php get_header(); ?>

<body class="services-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="services-main">
            <div class="services-hero">
                <div class="services-hero-overlay"></div>
                <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                    <div class="services-hero-image">
                        <img src="<?php echo $img_1['sizes']['1600x0']; ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="services-hero-1280">
                    <?php $title_1 = get_field('title_1'); if($title_1): ?><div class="services-hero-title"><?php echo $title_1; ?></div><?php endif; ?>
                    <?php $text_1 = get_field('text_1'); if($text_1): ?><div class="services-hero-description"><?php echo $text_1; ?></div><?php endif; ?>
                </div>
            </div>

            <?php $service_categories = get_terms(['taxonomy' => 'service_category']); if(is_array($service_categories) && count($service_categories)): ?>
                <?php foreach ($service_categories as $n => $service_category): ?>
                    <div class="services-block-fluid<?php if($n % 2): ?> blue<?php endif; ?>">
                        <div class="services-block-1280" id="<?php echo $service_category->slug; ?>">
                            <div class="services-block-num"><?php echo sprintf( '%02d', ($n + 1)); ?></div>
                            <div class="services-block-content">
                                <div class="services-block-title"><?php echo $service_category->name; ?></div>
                                <div class="services-block-links">
                                    <?php
                                    global $wp_query;
                                    \PS\Functions\Helper\Helper::get_services($service_category->term_id);
                                    $custom_query = $wp_query;
                                    ?>
                                    <?php if ( $custom_query->have_posts() ): ?>
                                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                            <a href="<?php echo get_the_permalink(); ?>" class="services-block-links-item">
                                                <div class="services-block-links-item-name"><?php echo get_the_title(); ?></div>
                                                <div class="services-block-links-item-btn">
                                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
                                                </div>
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

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>