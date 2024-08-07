<?php

namespace PS\Functions\Ajax;

/**
 * Class Cv
 * @package     PS\Functions\Ajax
 * @since       1.0.0
 */
class Cv {

    public function __construct() {
        add_action( 'wp_ajax_add_new_cv', array( $this, 'add_new_cv' ) );
        add_action( 'wp_ajax_nopriv_add_new_cv', array( $this, 'add_new_cv' ) );
    }

    // add letter
    public function add_new_cv() {
        $return = [
            'success' => false
        ];

        $max_mb = 50 * 1024 * 1024; // 50 mb

        // 1. vars
        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $email = isset($_POST['email']) ? wp_strip_all_tags($_POST['email'], true) : '';
        $phone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone'], true) : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';
        if($email){

            // 2. save letter
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'cv',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_62cd1724bc99e", $name, $post_id);
                update_field("field_62cd172cbc99f", $email, $post_id);
                update_field("field_62cd1734bc9a0", $phone, $post_id);
                update_field("field_62cd173dbc9a1", $message, $post_id);

                // 3. upload files
                for($n = 1; $n <= 2; $n++){
                    $file_parts = pathinfo($_FILES["file_" . $n]["name"]);
                    if($_FILES["file_" . $n]["error"] === 0 && $_FILES["file_" . $n]["size"] > 0 && $_FILES["file_" . $n]["size"] <= $max_mb) {
                        // upload file
                        if (!function_exists('wp_handle_upload')) {
                            require_once(ABSPATH . 'wp-admin/includes/image.php');
                            require_once(ABSPATH . 'wp-admin/includes/file.php');
                            require_once(ABSPATH . 'wp-admin/includes/media.php');
                        }

                        $overrides = ['test_form' => false];
                        $movefile = wp_handle_upload($_FILES["file_" . $n], $overrides);
                        if ($movefile && empty($movefile['error'])) {
                            $attach_id = wp_insert_attachment(array(
                                'guid' => $movefile['url'],
                                'post_mime_type' => $movefile['type'],
                                'post_title' => preg_replace('/\.[^.]+$/', '', $_FILES["file_" . $n]["name"]),
                                'post_content' => '',
                                'post_status' => 'inherit'
                            ), $movefile['url']);

                            if ($attach_id) {
                                $attach_meta = wp_generate_attachment_metadata($attach_id, $movefile['file']);
                                wp_update_attachment_metadata($attach_id, $attach_meta);

                                update_field($n === 1 ? "field_62cd175660df9" : "field_62cd176860dfa", $attach_id, $post_id);
                            }
                        }
                    }
                }

                // 4. send email
                $Email = new \PS\Functions\Helper\Email();
                $Email->send_notification($post_id);

                // success
                $return['success'] = true;
            }

        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }
}