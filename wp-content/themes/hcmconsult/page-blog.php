<?php get_header(); ?>

<body class="blog-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="blog">
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

            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_blog();
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <div class="blog-fluid">
                    <div class="blog-container blog-ajax-loading" data-query_vars='<?php echo serialize($custom_query->query_vars); ?>' data-max_num_pages='<?php echo $custom_query->max_num_pages; ?>'>
                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                            <?php get_template_part('parts/elements/blog'); ?>
                        <?php endwhile; ?>
                    </div>

                    <?php if($custom_query->max_num_pages > 1): ?>
                        <a href="javascript:void(0)" class="blog-see-more" data-default="<?php _e( 'See More', \PS::$theme_name ); ?>" data-wait="<?php _e( 'Wait', \PS::$theme_name ); ?>.."><?php _e( 'See More', \PS::$theme_name ); ?></a>
                    <?php endif; ?>
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
    <script>
        var query_vars = $('.blog-ajax-loading').data('query_vars');
        var current_page = 1;
        var max_num_pages = parseInt($('.blog-ajax-loading').data('max_num_pages'));
        var block_loading = false;
        $(document).on('click', '.blog-see-more', function() {
            if(block_loading === false){
                // button
                var load_button = $(this);
                load_button.html(load_button.data('wait'));

                // ajax
                var data = {
                    'action': 'loading_of_blog',
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
                            var $data = $(data.posts).filter(".blog-item");
                            var imgLoad = imagesLoaded($data);
                            imgLoad.on('always', function () {
                                $('.blog-ajax-loading').append($data.hide().fadeIn(150));

                                // increase page
                                current_page++;

                                // button
                                if(current_page === max_num_pages){
                                    load_button.remove();
                                }else{
                                    load_button.html(load_button.data('default'));
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