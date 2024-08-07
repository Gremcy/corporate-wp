<?php if (!defined('ABSPATH')){exit;} ?>

<div class="projects-projects__item">
    <a href="javascript:void(0)" class="projects-projects__item-top js-modal-link" data-target="projects-popup-<?php echo get_the_ID(); ?>">
        <p class="description warning"><?php echo sprintf( '%02d', \PS\Functions\Helper\Helper::get_project_number(get_the_ID()) ); ?></p>
        <p class="subtitle"><?php echo get_the_title(); ?></p>
        <?php $text = get_field('text'); if($text): ?>
            <?php echo str_ireplace('<p>', '<p class="description">', $text); ?>
        <?php endif; ?>
    </a>
    <a href="javascript:void(0)" class="projects-projects__item-bottom js-modal-link" data-target="projects-popup-<?php echo get_the_ID(); ?>">
        <div class="projects-projects__right-read-arrow right-read-arrow">
            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A"/></svg>
        </div>
        <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
            <img src="<?php echo $img['sizes']['960x0']; ?>" alt="" class="projects-projects__image"/>
        <?php endif; ?>
    </a>
</div>