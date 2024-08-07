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
                </div>
            </div>

            <?php $text = get_field('text_2'); if(is_array($text) && count($text)): ?>
                <?php foreach ($text as $m => $block): ?>
                    <div class="article-content-fluid">
                        <div class="article-content-1280">
                            <div class="article-content-block">
                                <div class="article-content-block-left">
                                    <div class="article-content-block-title<?php if($m === 0): ?>1<?php else: ?>2<?php endif; ?>"><?php echo $block['title']; ?></div>
                                </div>
                                <div class="article-content-block-right"><?php echo $block['text']; ?></div>
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