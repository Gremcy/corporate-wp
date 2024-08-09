<?php if (!defined('ABSPATH')){exit;} ?>

<footer class="footer-fluid">
    <div class="footer-1280">
        <div class="footer-left">
            <div class="footer-social">
                <?php $linkedin = get_field('linkedin', \PS::$option_page); if($linkedin): ?>
                    <a href="<?php echo $linkedin; ?>" class="footer-social-item" target="_blank">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.03621 8.59525H12.5955V10.3682C13.1082 9.3485 14.423 8.43233 16.3981 8.43233C20.1845 8.43233 21.0834 10.4621 21.0834 14.1862V21.0833H17.2501V15.0343C17.2501 12.9135 16.7374 11.7175 15.4321 11.7175C13.6218 11.7175 12.8695 13.0065 12.8695 15.0333V21.0833H9.03621V8.59525ZM2.463 20.9204H6.29633V8.43233H2.463V20.9204ZM6.84546 4.36038C6.8456 4.68168 6.78188 4.99981 6.65799 5.29627C6.53411 5.59273 6.35254 5.86162 6.12383 6.08729C5.66038 6.54789 5.03307 6.80571 4.37966 6.80413C3.72741 6.80369 3.10155 6.54653 2.63741 6.08825C2.40953 5.86181 2.22858 5.59262 2.10491 5.29612C1.98125 4.99962 1.9173 4.68163 1.91675 4.36038C1.91675 3.71158 2.1755 3.09058 2.63837 2.6325C3.1021 2.17361 3.72823 1.91634 4.38062 1.91663C5.03421 1.91663 5.66096 2.17442 6.12383 2.6325C6.58575 3.09058 6.84546 3.71158 6.84546 4.36038Z" fill="white" /></svg>
                    </a>
                <?php endif; ?>
                <?php $xing = get_field('xing', \PS::$option_page); if($xing): ?>
                    <a href="<?php echo $xing; ?>" class="footer-social-item" target="_blank">
                        <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.79178 4.75001C1.71892 4.74123 1.64508 4.75355 1.57901 4.7855C1.51295 4.81746 1.45745 4.8677 1.4191 4.93027C1.38075 4.99284 1.36117 5.0651 1.36268 5.13847C1.36419 5.21184 1.38672 5.28323 1.42761 5.34417L3.34428 8.58334L0.41178 13.7583C0.37393 13.8239 0.354004 13.8983 0.354004 13.974C0.354004 14.0497 0.37393 14.124 0.41178 14.1896C0.451515 14.2489 0.505968 14.2968 0.569805 14.3287C0.633643 14.3607 0.704675 14.3755 0.775947 14.3717H3.52636C3.68981 14.3657 3.84808 14.3128 3.98231 14.2193C4.11654 14.1259 4.22107 13.9958 4.28345 13.8446C4.28345 13.8446 7.15845 8.75584 7.26386 8.56417L5.3472 5.24834C5.27879 5.10387 5.172 4.98098 5.03848 4.89309C4.90496 4.80521 4.74986 4.75571 4.59011 4.75001H1.79178ZM13.4451 0.916672C13.2834 0.92022 13.1265 0.972404 12.9949 1.06642C12.8632 1.16044 12.763 1.29193 12.7072 1.44376L6.58345 12.3496L10.503 19.5563C10.5687 19.709 10.6767 19.8397 10.8142 19.9331C10.9518 20.0265 11.1131 20.0786 11.2793 20.0833H14.0393C14.1097 20.0882 14.1801 20.0748 14.2439 20.0446C14.3076 20.0144 14.3626 19.9684 14.4034 19.9108C14.4413 19.8453 14.4612 19.7709 14.4612 19.6952C14.4612 19.6195 14.4413 19.5451 14.4034 19.4796L10.503 12.3592L16.598 1.52042C16.6359 1.45486 16.6558 1.3805 16.6558 1.3048C16.6558 1.2291 16.6359 1.15473 16.598 1.08917C16.5565 1.03231 16.5015 0.986737 16.4379 0.956606C16.3743 0.926476 16.3041 0.912747 16.2339 0.916672H13.4451Z" fill="white" /></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-right">
            <div class="footer-right-copyright">
                © <?php echo date('Y'); ?> <?php the_field('footer_copy', \PS::$option_page); ?>
            </div>
            <?php $footer_menu = get_field('footer_menu', \PS::$option_page); if(is_array($footer_menu) && count($footer_menu)): ?>
                <div class="footer-right-policies">
                    <?php foreach ($footer_menu as $m => $li): ?>
                        <?php if($m > 0): ?><p> | </p><?php endif; ?>
                        <a href="<?php echo $li['link']; ?>" class="footer-right-policy"><?php echo $li['text']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-lang">
            <?php if(get_field('active_languages', \PS::$option_page)): ?>
                <?php $languages = \PS\Functions\Plugins\Qtranslate::get_languages(); if(is_array($languages) && count($languages)): ?>
                    <?php foreach ($languages as $n => $language): ?>
                        <?php if($language['active'] === true): ?>
                            <span class="footer-lang-item"><?php echo $language['name']; ?></span>
                        <?php else: ?>
                            <a href="<?php echo $language['url']; ?>" class="footer-lang-item"><?php echo $language['name']; ?></a>
                        <?php endif; ?>
                        <?php if($n + 1 < count($languages)): ?>
                            <div class="footer-lang-separator"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="footer-bottom-mob">
            <?php $footer_menu = get_field('footer_menu', \PS::$option_page); if(is_array($footer_menu) && count($footer_menu)): ?>
                <div class="footer-bottom-mob-links">
                    <?php foreach ($footer_menu as $m => $li): ?>
                        <?php if($m > 0): ?><div class="footer-bottom-mob-links-separator">|</div><?php endif; ?>
                        <a href="<?php echo $li['link']; ?>" class="footer-right-policy"><?php echo $li['text']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="footer-bottom-mob-copy">© <?php echo date('Y'); ?> <?php the_field('footer_copy', \PS::$option_page); ?></div>
        </div>
    </div>
</footer>