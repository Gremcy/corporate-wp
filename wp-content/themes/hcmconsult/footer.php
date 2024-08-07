<?php /* DON'T REMOVE THIS */ ?>
<?php wp_footer(); ?>
<?php /* END */ ?>

<script>
    // validation
    function trigger_parsley(form){
        var valid = true;
        // check inputs
        var inputs = form.find('.parsley-check');
        inputs.each(function(){
            $(this).parent().removeClass('error');
            if($(this).parsley().isValid() === false){
                $(this).parent().addClass('error');
                valid = false;
            }
        });
        // return
        return valid;
    }
    $(document).on('keyup keypress change', '.parsley-check', function() {
        if($(this).parent().hasClass('error')){
            var form = $(this).parents('.parsley-form');
            if(form.length){
                trigger_parsley(form);
            }
        }
    });

    // send letter
    var no_block = true;
    $(document).on('click', '.letter-form .touch-modal-right-btn', function() {
        var form = $(this).parents('form');
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
                },
                success: function (data) {
                    if (data.success) {
                        // reset
                        form.find('input, textarea').each(function (){
                            $(this).val('');
                        });

                        // success
                        $("[data-modal='getintouch-popup']").hide().removeClass("is-open");
                        $("[data-modal='thanks-popup']").fadeIn(100).addClass("is-open");
                    }

                    // разрешаем повторную отправку
                    no_block = true;
                }
            });
        }
        return false;
    });
</script>

<?php if(!isset($_COOKIE['hide-cookies-banner'])): ?>
    <script>
        // cookies
        function setCookie(key, value, expiry) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
        }
        $(document).on('click', '.cookies-accept-button', function() {
            setCookie('hide-cookies-banner', '1', '7');
        });
        $(document).on('click', '.cookies-preferences-save-btn', function() {
            $('.cookies-accept-button').trigger('click');
        });
    </script>
<?php endif; ?>