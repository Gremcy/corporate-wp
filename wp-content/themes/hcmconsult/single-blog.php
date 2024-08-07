<?php get_header(); ?>

<body class="article-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="article">
            <div class="article-hero-fluid">
                <div class="article-hero-overlay"></div>
                <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                    <div class="article-hero-image">
                        <img src="<?php echo $img_1['sizes']['1600x0']; ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="article-hero-1280">
                    <div class="article-hero-title"><?php echo get_the_title(); ?></div>
                    <div class="article-hero-date">
                        <p><?php _e( 'Published', \PS::$theme_name ); ?>:</p>
                        <span><?php echo get_the_time('d/m/Y'); ?></span>
                    </div>
                </div>
            </div>

            <?php $text = get_field('text_2'); if(is_array($text) && count($text)): ?>
                <?php foreach ($text as $m => $block): ?>
                    <?php if($block['acf_fc_layout'] === 'text'): ?>

                        <div class="article-content-fluid">
                            <div class="article-content-1280">
                                <div class="article-content-block">
                                    <div class="article-content-block-left">
                                        <div class="article-content-block-title<?php if($m === 0): ?>1<?php else: ?>2<?php endif; ?>"><?php echo $block['title']; ?></div>
                                    </div>
                                    <div class="article-content-block-right"><?php echo str_ireplace(['width', 'height'], ['data-width', 'data-height'], $block['text']); ?></div>
                                </div>
                            </div>
                        </div>

                    <?php elseif($block['acf_fc_layout'] === 'img'): ?>

                        <?php if(is_array($block['img']) && count($block['img'])): ?>
                            <div class="article-image-fluid">
                                <img src="<?php echo $block['img']['sizes']['1600x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="article-autor-fluid">
                    <div class="article-autor-rectangles">
                        <div class="left-rectangle"></div>
                        <div class="right-rectangle"></div>
                    </div>
                    <div class="article-autor-1280">
                        <div class="article-autor-text">
                            <?php $title_3 = get_field('title_3'); if($title_3): ?><div class="article-autor-text-name"><?php echo $title_3; ?></div><?php endif; ?>
                            <?php $text_3 = get_field('text_3'); if($text_3): ?><div class="article-autor-text-description"><?php echo $text_3; ?></div><?php endif; ?>
                        </div>
                        <?php $img_3 = get_field('img_3'); if(is_array($img_3) && count($img_3)): ?>
                            <div class="article-autor-image">
                                <img src="<?php echo $img_3['sizes']['960x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_random_articles(get_the_ID());
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <div class="article-more-fluid">
                    <div class="article-more-1280">
                        <div class="article-more-title"><?php _e( 'More articles in this series', \PS::$theme_name ); ?></div>
                    </div>
                    <div class="blog-container">
                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                            <?php get_template_part('parts/elements/blog'); ?>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="blog-mobile-more-articles">
                    <div class="customers-steps-mob__inner">
                        <div class="customers-steps-mob__slider js-customers-steps-slider">
                            <div class="swiper-wrapper">
                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                    <div class="customers-steps-mob__slide swiper-slide">
                                        <?php get_template_part('parts/elements/blog'); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="customers-steps-mob__pagination js-customers-steps-slider-pagination"></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

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