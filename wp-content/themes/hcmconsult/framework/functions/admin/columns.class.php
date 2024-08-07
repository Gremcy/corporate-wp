<?php

namespace PS\Functions\Admin;

/**
 * Class Columns
 * @package PS\Functions\Admin
 */
class Columns {

    /**
     * constructor
     */
    public function __construct() {
        // service
        add_filter('manage_edit-service_columns', array( $this, 'columns_head_only_service'), 15);
        add_filter('manage_service_posts_custom_column', array( $this, 'columns_content_only_service'), 10, 2);

        // project
        add_filter('manage_edit-project_columns', array( $this, 'columns_head_only_project'), 15);
        add_filter('manage_project_posts_custom_column', array( $this, 'columns_content_only_project'), 10, 2);

        // team
        add_filter('manage_edit-team_columns', array( $this, 'columns_head_only_team'), 15);
        add_filter('manage_team_posts_custom_column', array( $this, 'columns_content_only_team'), 10, 2);

        // blog
        add_filter('manage_edit-blog_columns', array( $this, 'columns_head_only_blog'), 15);
        add_filter('manage_blog_posts_custom_column', array( $this, 'columns_content_only_blog'), 10, 2);

        // letters
        add_filter('manage_edit-letter_columns', array( $this, 'columns_head_only_letter'), 15);
        add_filter('manage_letter_posts_custom_column', array( $this, 'columns_content_only_letter'), 10, 2);

        // cv
        add_filter('manage_edit-cv_columns', array( $this, 'columns_head_only_letter'), 15);
        add_filter('manage_cv_posts_custom_column', array( $this, 'columns_content_only_letter'), 10, 2);
    }

    /**
     * service
     */
    public function columns_head_only_service($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-service_category']);
        unset($defaults['date']);
        $defaults['img'] = __( 'Image', \PS::$theme_name );
        $defaults['title'] = __( 'Name', \PS::$theme_name );
        $defaults['taxonomy-service_category'] = __( 'Category', \PS::$theme_name );
        $defaults['date'] = __( 'Date', \PS::$theme_name );
        return $defaults;
    }

    public function columns_content_only_service($column_name, $post_ID) {
        // изображение
        if ($column_name == 'img') {
            $img = get_field('img_1', $post_ID);
            echo (isset($img['sizes']['100x100']) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "");
        }
    }

    /**
     * project
     */
    public function columns_head_only_project($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['img'] = __( 'Image', \PS::$theme_name );
        $defaults['title'] = __( 'Title', \PS::$theme_name );
        $defaults['mainpage'] = __( 'On mainpage?', \PS::$theme_name );
        $defaults['date'] = __( 'Date', \PS::$theme_name );
        return $defaults;
    }

    public function columns_content_only_project($column_name, $post_ID) {
        // изображение
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (isset($img['sizes']['100x100']) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "");
        }
        // mainpage
        elseif ($column_name == 'mainpage') {
            echo get_field('show_on_mainpage', $post_ID) ? '<div class="ws_icon_image icon16 dashicons dashicons-yes"></div>' : '-';
        }
    }

    /**
     * team
     */
    public function columns_head_only_team($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-team_category']);
        unset($defaults['date']);
        $defaults['img'] = __( 'Photo', \PS::$theme_name );
        $defaults['title'] = __( 'Name', \PS::$theme_name );
        $defaults['taxonomy-team_category'] = __( 'Category', \PS::$theme_name );
        $defaults['date'] = __( 'Date', \PS::$theme_name );
        return $defaults;
    }

    public function columns_content_only_team($column_name, $post_ID) {
        // изображение
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (isset($img['sizes']['100x100']) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "");
        }
    }

    /**
     * blog
     */
    public function columns_head_only_blog($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['img'] = __( 'Image', \PS::$theme_name );
        $defaults['title'] = __( 'Title', \PS::$theme_name );
        $defaults['date'] = __( 'Date', \PS::$theme_name );
        return $defaults;
    }

    public function columns_content_only_blog($column_name, $post_ID) {
        // изображение
        if ($column_name == 'img') {
            $img = get_field('img_1', $post_ID);
            echo (isset($img['sizes']['100x100']) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "");
        }
    }

    /**
     * letter
     */
    public function columns_head_only_letter($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = __( 'ID', \PS::$theme_name );
        $defaults['name'] = __( 'Full name', \PS::$theme_name );
        $defaults['email'] = __( 'E-mail', \PS::$theme_name );
        $defaults['phone'] = __( 'Phone', \PS::$theme_name );
        $defaults['date'] = __( 'Date', \PS::$theme_name );
        return $defaults;
    }

    public function columns_content_only_letter($column_name, $post_ID) {
        // name
        if ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // email
        elseif ($column_name == 'email') {
            echo get_field('email', $post_ID);
        }
        // phone
        elseif ($column_name == 'phone') {
            echo get_field('phone', $post_ID);
        }
    }

}