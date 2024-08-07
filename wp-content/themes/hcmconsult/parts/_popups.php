<?php if (!defined('ABSPATH')){exit;} ?>

<div class="menu-wrapper">
    <div class="menu-content">
        <div class="menu-top-line">
            <div class="menu-logo">
                <img src="<?php echo \PS::$assets_url; ?>images/logo2.png" alt="">
            </div>
            <div class="menu-close"><?php _e( 'close', \PS::$theme_name ); ?></div>
        </div>

        <div class="menu-links">
            <a href="<?php echo get_the_permalink(\PS::$about_page); ?>" class="menu-links-item"><?php echo get_the_title(\PS::$about_page); ?></a>
            <?php $service_categories = get_terms(['taxonomy' => 'service_category']); if(is_array($service_categories) && count($service_categories)): ?>
                <div class="menu-links-containing">
                    <div class="menu-links-containing-heading">
                        <p><?php echo get_the_title(\PS::$services_page); ?></p>
                        <img src="<?php echo \PS::$assets_url; ?>images/arrow2.svg" alt="">
                    </div>
                    <div class="menu-links-drop">
                        <?php foreach ($service_categories as $n => $service_category): ?>
                            <div class="menu-links-drop-item">
                                <div class="menu-links-drop-item__title"><?php echo $service_category->name; ?></div>
                                <?php
                                global $wp_query;
                                \PS\Functions\Helper\Helper::get_services($service_category->term_id);
                                $custom_query = $wp_query;
                                ?>
                                <?php if ( $custom_query->have_posts() ): ?>
                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                        <a href="<?php echo get_the_permalink(); ?>" class="menu-links-drop-item__link"><?php echo get_the_title(); ?></a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <a href="<?php echo get_the_permalink(\PS::$projects_page); ?>" class="menu-links-item"><?php echo get_the_title(\PS::$projects_page); ?></a>
            <a href="<?php echo get_the_permalink(\PS::$join_page); ?>" class="menu-links-item"><?php echo get_the_title(\PS::$join_page); ?></a>
            <a href="<?php echo get_the_permalink(\PS::$blog_page); ?>" class="menu-links-item"><?php echo get_the_title(\PS::$blog_page); ?></a>
        </div>

        <?php if(get_field('active_languages', \PS::$option_page)): ?>
            <div class="menu-bottom">
                <div class="menu-search-btn">
                    <img src="<?php echo \PS::$assets_url; ?>images/white-loop.svg" alt="">
                </div>
                <?php $languages = \PS\Functions\Plugins\Qtranslate::get_languages(); if(is_array($languages) && count($languages)): ?>
                    <div class="menu-lang">
                        <?php foreach ($languages as $n => $language): ?>
                            <?php if($language['active'] === true): ?>
                                <span class="menu-lang-item"><?php echo $language['name']; ?></span>
                            <?php else: ?>
                                <a href="<?php echo $language['url']; ?>" class="menu-lang-item"><?php echo $language['name']; ?></a>
                            <?php endif; ?>
                            <?php if($n + 1 < count($languages)): ?>
                                <div class="menu-lang-separator">|</div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form class="menu-search-input" action="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/search/'); ?>">
            <input name="find" type="text" value="<?php echo isset($_GET['find']) ? wp_strip_all_tags($_GET['find'], true) : ''; ?>" placeholder="<?php _e( 'I am looking for', \PS::$theme_name ); ?>" autocomplete="off">
        </form>
    </div>
</div>

<div class="modal modal--sm js-modal getintouch" data-modal="getintouch-popup">
    <div class="modal__overlay js-close-modal"></div>
    <div class="modal__content hire-us">
        <div class="modal__close js-close-modal js-hide-cursor"><?php _e( 'close', \PS::$theme_name ); ?></div>

        <div class="touch-modal-fluid">
            <div class="touch-left-circle">
                <div class="touch-left-circle-inner"></div>
            </div>
            <div class="touch-modal-1280">
                <div class="touch-modal-left">
                    <div class="touch-modal-title">
                        <div class="line1"><?php _e( 'LET’S', \PS::$theme_name ); ?></div>
                        <div class="line2"><?php _e( 'GET IN', \PS::$theme_name ); ?></div>
                        <div class="line3"><?php _e( 'TOUCH', \PS::$theme_name ); ?></div>
                    </div>
                </div>

                <form class="touch-modal-right letter-form parsley-form">
                    <input name="action" value="add_new_letter" type="hidden">
                    <div class="touch-modal-input">
                        <input type="text" name="name" placeholder="<?php _e( 'Full Name', \PS::$theme_name ); ?> *" class="parsley-check" data-parsley-required="true" autocomplete="off">
                        <div class="touch-modal-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                    </div>
                    <div class="touch-modal-input half">
                        <input type="text" name="email" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="parsley-check" data-parsley-required="true" data-parsley-type="email" autocomplete="off">
                        <div class="touch-modal-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                    </div>
                    <div class="touch-modal-input half">
                        <input type="text" name="phone" placeholder="<?php _e( 'Phone', \PS::$theme_name ); ?>" autocomplete="off">
                    </div>
                    <div class="touch-modal-textarea">
                        <textarea name="message" placeholder="<?php _e( 'Message', \PS::$theme_name ); ?> *" rows="1" class="parsley-check" data-parsley-required="true"></textarea>
                        <div class="touch-modal-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                    </div>

                    <div class="touch-modal-right-bottom">
                        <div class="touch-modal-right-address">
                            <div class="touch-modal-right-address-title"><?php _e( 'ADDRESS', \PS::$theme_name ); ?></div>
                            <?php $address = get_field('address', \PS::$option_page); if($address): ?><div class="touch-modal-right-address-street"><?php echo $address; ?></div><?php endif; ?>
                            <?php $phone = get_field('phone', \PS::$option_page); if($phone): ?><a href="tel:<?php echo $phone; ?>" class="touch-modal-right-address-phone"><?php _e( 'Phone', \PS::$theme_name ); ?>: <?php echo $phone; ?></a><?php endif; ?>
                            <?php $email = get_field('email', \PS::$option_page); if($email): ?><a href="mailto:<?php echo $email; ?>" class="touch-modal-right-address-email"><?php _e( 'E-mail', \PS::$theme_name ); ?>: <?php echo $email; ?></a><?php endif; ?>

                            <?php $address = get_field('address_2', \PS::$option_page); if($address): ?><br><div class="touch-modal-right-address-street"><?php echo $address; ?></div><?php endif; ?>
                            <?php $phone = get_field('phone_2', \PS::$option_page); if($phone): ?><a href="tel:<?php echo $phone; ?>" class="touch-modal-right-address-phone"><?php _e( 'Phone', \PS::$theme_name ); ?>: <?php echo $phone; ?></a><?php endif; ?>
                            <?php $email = get_field('email_2', \PS::$option_page); if($email): ?><a href="mailto:<?php echo $email; ?>" class="touch-modal-right-address-email"><?php _e( 'E-mail', \PS::$theme_name ); ?>: <?php echo $email; ?></a><?php endif; ?>
                        </div>
                        <div class="touch-modal-right-btn">
                            <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.648 6.53033C14.9409 6.23744 14.9409 5.76256 14.648 5.46967L9.87501 0.696699C9.58211 0.403806 9.10724 0.403806 8.81435 0.696699C8.52145 0.989593 8.52145 1.46447 8.81435 1.75736L13.057 6L8.81435 10.2426C8.52145 10.5355 8.52145 11.0104 8.81435 11.3033C9.10724 11.5962 9.58211 11.5962 9.87501 11.3033L14.648 6.53033ZM0 6.75L14.1176 6.75V5.25L0 5.25L0 6.75Z" fill="#1E285A" /></svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--sm js-modal thanks" data-modal="thanks-popup">
    <div class="modal__overlay js-close-modal"></div>
    <div class="modal__content">
        <div class="thanks-content">
            <div class="modal__close js-close-modal js-hide-cursor"><?php _e( 'close', \PS::$theme_name ); ?></div>
            <div class="thanks-content-title"><?php the_field('thanks_title', \PS::$option_page); ?></div>
            <div class="thanks-content-text"><?php the_field('thanks_text', \PS::$option_page); ?></div>
        </div>
    </div>
</div>

<?php if(!isset($_COOKIE['hide-cookies-banner'])): ?>
    <div class="cookies-fluid">
        <div class="cookies-1280">
            <div class="cookies-left"><?php the_field('cookies_text', \PS::$option_page); ?></div>
            <div class="cookies-right">
                <div class="cookies-right-accept-btn cookies-accept-button"><?php _e( 'Accept', \PS::$theme_name ); ?></div>
                <div class="cookies-right-close-btn"><?php _e( 'Reject Cookies', \PS::$theme_name ); ?></div>
                <div class="cookies-right-manage-btn js-modal-link" data-target="cookies-preferences-popup"><?php _e( 'Manage my preferences', \PS::$theme_name ); ?></div>
            </div>
        </div>
    </div>

    <div class="modal modal--sm js-modal cookies-preferences" data-modal="cookies-preferences-popup">
        <div class="modal__overlay js-close-modal"></div>
        <div class="cookies-preferences-content">
            <div>
                <div class="cookies-preferences-top">
                    <div class="cookies-preferences-top-logo">
                        <picture>
                            <source media="(max-width: 666px)" srcset="<?php echo \PS::$assets_url; ?>images/logo-circle.png">
                            <source media="(min-width: 667px)" srcset="<?php echo \PS::$assets_url; ?>images/logo1.png">
                            <img src="<?php echo \PS::$assets_url; ?>images/logo1.png" alt="">
                        </picture>
                    </div>
                    <div class="cookies-preferences-top-close js-close-modal"><?php _e( 'close', \PS::$theme_name ); ?></div>
                </div>

                <div class="cookies-preferences-center">
                    <?php $cookies_settings_text = get_field('cookies_settings_text', \PS::$option_page); if($cookies_settings_text['title'] || $cookies_settings_text['text']): ?>
                        <div class="cookies-preferences-heading"><?php echo __($cookies_settings_text['title']); ?></div>
                        <div class="cookies-preferences-paragraph margin-bottom-40"><?php echo __($cookies_settings_text['text']); ?></div>
                    <?php endif; ?>
                    <?php $cookies_settings = get_field('cookies_settings', \PS::$option_page); if(is_array($cookies_settings['settings']) || count($cookies_settings['settings'])): ?>
                        <div class="cookies-preferences-heading margin-bottom-30"><?php echo __($cookies_settings['title']); ?></div>
                        <?php foreach ($cookies_settings['settings'] as $m => $checkbox): ?>
                            <div class="cookies-preferences-checking<?php if($m + 1 === count($cookies_settings['settings'])): ?> bottom<?php endif; ?>">
                                <div class="cookies-preferences-cheking-title"><?php echo __($checkbox['title']); ?></div>
                                <div class="cookies-preferences-cheking-check">
                                    <?php if($checkbox['checkbox']): ?>
                                        <input type="checkbox" id="highload<?php echo $m + 1; ?>" name="highload<?php echo $m + 1; ?>"<?php if($checkbox['checkbox_active']): ?> checked<?php endif; ?>>
                                        <label for="highload<?php echo $m + 1; ?>" data-onlabel="<?php _e( 'Active', \PS::$theme_name ); ?>" data-offlabel="<?php _e( 'Inactive', \PS::$theme_name ); ?>" class="lb<?php echo $m + 1; ?>"></label>
                                    <?php else: ?>
                                        <?php _e( 'Always Active', \PS::$theme_name ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="cookies-preferences-paragraph"><?php echo __($checkbox['text']); ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="cookies-preferences-bottom">
                    <button class="cookies-preferences-save-btn js-close-modal"><?php _e( 'Save my preferences', \PS::$theme_name ); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="menu-overlay"></div>