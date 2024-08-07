<?php get_header(); ?>

<body class="social-engagement-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="social-main">
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
                <?php $blocks_2 = get_field('blocks_2'); if(is_array($blocks_2) && count($blocks_2)): ?>
                    <section class="social-articles container-1280">
                        <ul class="social-articles__articles-list articles-list">
                            <?php foreach ($blocks_2 as $block): ?>
                                <li class="articles-list__item">
                                    <article class="articles-list__article article">
                                        <div class="article__header">
                                            <p class="title"><?php echo $block['title']; ?></p>
                                            <div class="article__button">
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                        <?php echo str_ireplace('<p>', '<p class="article__description description secondary" style="height: 0">', $block['text']); ?>
                                        <?php if(is_array($block['img']) && count($block['img'])): ?>
                                            <img src="<?php echo $block['img']['sizes']['960x0']; ?>" class="article__image" alt="">
                                        <?php endif; ?>
                                    </article>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                <?php endif; ?>
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