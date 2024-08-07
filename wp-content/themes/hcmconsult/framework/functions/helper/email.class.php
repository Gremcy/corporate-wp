<?php

namespace PS\Functions\Helper;

/**
 * Class Email
 * @package PS\Functions\Helper
 */
class Email {

    /**
     * constructor
     */
    public function __construct() {}

    // send email
    public function send_email( $to, $subject, $body, $attachments = array() ) {
        $headers   = array();
        $headers[] = 'From: HCM Consultant Group <info@' . str_ireplace(['http://', 'https://'], '', site_url()) . '>';
        $headers[] = 'Content-Type: text/html';
        $headers[] = 'charset=UTF-8';
        return wp_mail( $to, $subject, $body, $headers, $attachments );
    }

    // send notification
    public function send_notification( $post_id ) {

        // letter
        if ( get_post_type( $post_id ) === 'letter' ) {
            // to
            $to = get_field('letters_email', \PS::$option_page);

            // subject
            $subject = 'New letter!';

            // information
            $name = get_field('name', $post_id);
            $email = get_field('email', $post_id);
            $phone = get_field('phone', $post_id);
            $message = get_field('message', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/email/letter.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // cv
        elseif ( get_post_type( $post_id ) === 'cv' ) {
            // to
            $to = get_field('cv_email', \PS::$option_page);

            // subject
            $subject = 'New CV!';

            // information
            $name = get_field('name', $post_id);
            $email = get_field('email', $post_id);
            $phone = get_field('phone', $post_id);
            $message = get_field('message', $post_id);

            $cv = get_field('cv', $post_id);
            $letter = get_field('letter', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/email/cv.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // false
        else {
            return false;
        }
    }

}