<?php get_header(); ?>

<body class="wwu-page">
    <div class="fluid-wrapper">
        <?php get_template_part('parts/_header'); ?>

        <main class="wwu-main">
            <?php if(get_field('active_1')): ?>
                <div class="wwu-hero">
                    <div class="wwu-hero-overlay"></div>
                    <?php $img_1 = get_field('img_1'); if(is_array($img_1) && count($img_1)): ?>
                        <div class="wwu-hero-image">
                            <img src="<?php echo $img_1['sizes']['1600x0']; ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="wwu-hero-1280">
                        <?php $title_1 = get_field('title_1'); if($title_1): ?><div class="wwu-hero-title"><?php echo $title_1; ?></div><?php endif; ?>
                        <?php $text_1 = get_field('text_1'); if($text_1): ?><div class="wwu-hero-description"><?php echo $text_1; ?></div><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <div class="wwu-content-fluid">
                    <div class="wwu-content-1280">
                        <div class="wwu-content-left">
                            <form class="wwu-form cv-form parsley-form">
                                <input name="action" value="add_new_cv" type="hidden">
                                <div class="wwu-input">
                                    <input type="text" name="name" placeholder="<?php _e( 'Full Name', \PS::$theme_name ); ?> *" class="parsley-check" data-parsley-required="true" autocomplete="off">
                                    <div class="wwu-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                                </div>
                                <div class="wwu-input half">
                                    <input type="text" name="email" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="parsley-check" data-parsley-required="true" data-parsley-type="email" autocomplete="off">
                                    <div class="wwu-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                                </div>
                                <div class="wwu-input half">
                                    <input type="text" name="phone" placeholder="<?php _e( 'Phone', \PS::$theme_name ); ?>" autocomplete="off">
                                </div>
                                <div class="wwu-textarea">
                                    <textarea name="message" placeholder="<?php _e( 'Message', \PS::$theme_name ); ?> *" class="parsley-check" data-parsley-required="true"></textarea>
                                    <div class="wwu-input-error"><?php _e( 'Field is required and cannot be empty', \PS::$theme_name ); ?></div>
                                </div>
                                <div class="wwu-forms-btns">
                                    <div class="wwu-upload-sv wrapper-input-file">
                                        <input type="file" name="file_1" id="upload-file-cv" placeholder="<?php _e( 'Upload CV', \PS::$theme_name ); ?>">
                                        <label class="wwu-upload-sv-btn" for="upload-file-cv"><?php _e( 'Upload CV', \PS::$theme_name ); ?></label>
                                        <div class="upload-cv-delete delete-cross-file">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.6455 1.70711C20.036 1.31658 20.036 0.683417 19.6455 0.292893C19.255 -0.0976311 18.6218 -0.0976311 18.2313 0.292893L9.9692 8.55498L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L8.55498 9.9692L0.292893 18.2313C-0.0976311 18.6218 -0.0976311 19.255 0.292893 19.6455C0.683417 20.036 1.31658 20.036 1.70711 19.6455L9.9692 11.3834L18.2313 19.6455C18.6218 20.036 19.255 20.036 19.6455 19.6455C20.036 19.255 20.036 18.6218 19.6455 18.2313L11.3834 9.9692L19.6455 1.70711Z" fill="#0D0C1D" /></svg>
                                        </div>
                                    </div>
                                    <div class="wwu-upload-letter wrapper-input-file">
                                        <input type="file" name="file_2" id="upload-file-letter" placeholder="<?php _e( 'Upload Cover Letter', \PS::$theme_name ); ?>">
                                        <label class="wwu-upload-letter-btn" for="upload-file-letter"><?php _e( 'Upload Cover Letter', \PS::$theme_name ); ?></label>
                                        <div class="upload-leter-delete delete-cross-file">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.6455 1.70711C20.036 1.31658 20.036 0.683417 19.6455 0.292893C19.255 -0.0976311 18.6218 -0.0976311 18.2313 0.292893L9.9692 8.55498L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L8.55498 9.9692L0.292893 18.2313C-0.0976311 18.6218 -0.0976311 19.255 0.292893 19.6455C0.683417 20.036 1.31658 20.036 1.70711 19.6455L9.9692 11.3834L18.2313 19.6455C18.6218 20.036 19.255 20.036 19.6455 19.6455C20.036 19.255 20.036 18.6218 19.6455 18.2313L11.3834 9.9692L19.6455 1.70711Z" fill="#0D0C1D" /></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="wwu-send" data-default="<?php _e( 'Send', \PS::$theme_name ); ?>" data-wait="<?php _e( 'Wait', \PS::$theme_name ); ?>..">
                                    <span><?php _e( 'Send', \PS::$theme_name ); ?></span>
                                    <button type="submit" class="wwu-send-btn">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4018 6.51993C12.689 6.23278 12.689 5.76722 12.4018 5.48007L7.72244 0.800685C7.43529 0.513535 6.96973 0.513535 6.68258 0.800685C6.39543 1.08784 6.39543 1.5534 6.68258 1.84055L10.842 6L6.68258 10.1595C6.39543 10.4466 6.39543 10.9122 6.68258 11.1993C6.96973 11.4865 7.43529 11.4865 7.72244 11.1993L12.4018 6.51993ZM0.117188 6.73529L11.8819 6.73529V5.26471L0.117187 5.26471L0.117188 6.73529Z" fill="#1E285A" /></svg>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <?php $text_2 = get_field('text_2'); if($text_2): ?><div class="wwu-content-right"><?php echo $text_2; ?></div><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        // send cv
        var no_block = true;
        $(document).on('click', '.cv-form .wwu-send', function() {
            var form = $(this).parents('form');
            var submit = form.find('.wwu-send');
            if(trigger_parsley(form) && no_block) {
                // ajax
                var formData = new FormData(form[0]);
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    data: formData,
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        // block
                        no_block = false;
                        // button
                        submit.find('span').html(submit.data('wait'));
                    },
                    success: function (data) {
                        if (data.success) {
                            // reset
                            form.find('input, textarea').each(function (){
                                $(this).val('');
                            });

                            // success
                            $("body").addClass("is-hidden");
                            $("[data-modal='thanks-popup']").fadeIn(100).addClass("is-open");
                        }

                        // разрешаем повторную отправку
                        no_block = true;
                        // button
                        submit.find('span').html(submit.data('default'));
                    }
                });
            }
            return false;
        });
    </script>
    <?php /* END */ ?>

</body>
</html>