<?php if (!defined('ABSPATH')){exit;} ?>

<header class="header-fluid">
    <div class="header-1280">
        <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url(); ?>" class="header-logo">
            <picture>
                <source media="(max-width: 666px)" srcset="<?php echo \PS::$assets_url; ?>images/logo-circle.png">
                <source media="(min-width: 667px)" srcset="<?php echo \PS::$assets_url; ?>images/logo_new.png">
                <img src="<?php echo \PS::$assets_url; ?>images/logo_new.png" alt="">
            </picture>
        </a>

        <div class="header-desktop-search-fluid">
            <div class="header-desktop-overlay"></div>
            <div class="header-desktop-search-1280">
                <form class="header-desktop-search-input" action="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/search/'); ?>">
                    <input name="find" type="text" value="<?php echo isset($_GET['find']) ? wp_strip_all_tags($_GET['find'], true) : ''; ?>" placeholder="<?php _e( 'I am looking for', \PS::$theme_name ); ?>" autocomplete="off">
                </form>
            </div>
        </div>

        <div class="header-menu">
            <a href="<?php echo get_the_permalink(\PS::$about_page); ?>" class="header-menu-item"><?php echo get_the_title(\PS::$about_page); ?></a>
            <?php $service_categories = get_terms(['taxonomy' => 'service_category']); if(is_array($service_categories) && count($service_categories)): ?>
                <div class="has-submenu">
                    <a href="<?php echo get_the_permalink(\PS::$services_page); ?>"><?php echo get_the_title(\PS::$services_page); ?></a>
                    <div class="header-submenu-fluid">
                        <div class="header-submenu-overlay"></div>
                        <div class="header-submenu-1280">
                            <?php foreach ($service_categories as $n => $service_category): ?>
                                <div class="header-submenu-col">
                                    <div class="header-submenu-title"><?php echo $service_category->name; ?></div>
                                    <?php
                                    global $wp_query;
                                    \PS\Functions\Helper\Helper::get_services($service_category->term_id);
                                    $custom_query = $wp_query;
                                    ?>
                                    <?php if ( $custom_query->have_posts() ): ?>
                                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                            <a href="<?php echo get_the_permalink(); ?>" class="header-submenu-item"><?php echo get_the_title(); ?></a><br>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <a href="<?php echo get_the_permalink(\PS::$projects_page); ?>" class="header-menu-item"><?php echo get_the_title(\PS::$projects_page); ?></a>
            <a href="<?php echo get_the_permalink(\PS::$join_page); ?>" class="header-menu-item"><?php echo get_the_title(\PS::$join_page); ?></a>
            <a href="<?php echo get_the_permalink(\PS::$blog_page); ?>" class="header-menu-item"><?php echo get_the_title(\PS::$blog_page); ?></a>
        </div>

        <div class="header-right">
            <div class="header-search-btn">
                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 1.95664C4.12849 1.95664 1.39535 4.61017 1.39535 7.88348C1.39535 11.1568 4.12849 13.8103 7.5 13.8103C10.8715 13.8103 13.6047 11.1568 13.6047 7.88348C13.6047 4.61017 10.8715 1.95664 7.5 1.95664ZM0 7.88348C0 3.86199 3.35786 0.601929 7.5 0.601929C11.6421 0.601929 15 3.86199 15 7.88348C15 11.905 11.6421 15.165 7.5 15.165C3.35786 15.165 0 11.905 0 7.88348Z" fill="#1E285A" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12.1905 12.4374C12.4445 12.1908 12.8563 12.1908 13.1103 12.4374L16.8095 16.0288C17.0635 16.2754 17.0635 16.6753 16.8095 16.9219C16.5555 17.1685 16.1437 17.1685 15.8897 16.9219L12.1905 13.3304C11.9365 13.0838 11.9365 12.684 12.1905 12.4374Z" fill="#1E285A" /></svg>
            </div>

            <?php /*if(get_field('active_languages', \PS::$option_page)): ?>
                <?php $languages = \PS\Functions\Plugins\Qtranslate::get_languages(); if(is_array($languages) && count($languages)): ?>
                    <?php foreach ($languages as $language): ?>
                        <?php if($language['active'] === false): ?>
                            <a href="<?php echo $language['url']; ?>" class="header-lang"><?php echo $language['name']; ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif;*/ ?>

            <div class="header-burger">
                <img src="<?php echo \PS::$assets_url; ?>images/burger.svg" alt="">
            </div>

            <div class="header-get js-modal-link" data-target="getintouch-popup">
                <div class="link--magnetised" id="magnetic-area" data-text="<?php _e( 'Get in touch', \PS::$theme_name ); ?>">
                    <div class="link__content">
                        <svg viewBox="0 0 11 11" class="magnetic--circle" id="magnetic-content"><circle cx="5.5" cy="5.5" r="5" stroke-width="0" style="stroke-dashoffset: 0rem;"></circle></svg>
                        <span class="link__text"><?php _e( 'Get in touch', \PS::$theme_name ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>