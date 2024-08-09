<?php get_header(); ?>

<body class="error-page">
    <div class="fluid-wrapper">
        <main class="error-main">
            <div class="error-background">
                <picture>
                    <source media="(max-width: 768px)" srcset="<?php echo \PS::$assets_url; ?>images/43.jpg">
                    <source media="(min-width: 769px)" srcset="<?php echo \PS::$assets_url; ?>images/42.jpg">
                    <img src="<?php echo \PS::$assets_url; ?>images/42.jpg" alt="">
                </picture>
            </div>

            <div class="error-content">
                <div class="error-content-num">404</div>
                <div class="error-content-text"><?php _e( 'Page is not found', \PS::$theme_name ); ?></div>
                <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url(); ?>" class="error-content-link">
                    <div class="error-content-link-circle">
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.598175 5.48007C0.311026 5.76722 0.311026 6.23278 0.598175 6.51993L5.27756 11.1993C5.56471 11.4865 6.03027 11.4865 6.31742 11.1993C6.60457 10.9122 6.60457 10.4466 6.31742 10.1595L2.15797 6L6.31742 1.84055C6.60457 1.5534 6.60457 1.08784 6.31742 0.800685C6.03027 0.513535 5.56471 0.513535 5.27756 0.800685L0.598175 5.48007ZM12.8828 5.26471L1.11811 5.26471V6.73529L12.8828 6.73529V5.26471Z" fill="white" /></svg>
                    </div>
                    <div class="error-content-link-text"><?php _e( 'Go back', \PS::$theme_name ); ?></div>
                </a>
            </div>
        </main>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>