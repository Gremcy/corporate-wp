<?php if (!defined('ABSPATH')){exit;} ?>

<a href="<?php echo get_the_permalink(); ?>" class="blog-item">
    <div class="block-item-name"><?php echo get_the_title(); ?></div>
    <?php $text_1 = get_field('text_1'); if($text_1): ?>
        <div class="block-item-description"><?php echo $text_1; ?></div>
    <?php endif; ?>
    <div class="block-item-btn">
        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
    </div>
    <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
        <div class="block-item-image">
            <img src="<?php echo $img_1['sizes']['960x0']; ?>" alt="">
        </div>
    <?php endif; ?>
</a>