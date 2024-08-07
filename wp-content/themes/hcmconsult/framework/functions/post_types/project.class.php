<?php

namespace PS\Functions\Post_Types;

/**
 * Class Project
 * @package PS\Functions\Post_Types
 */
class Project {

    /**
     * constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
    }

    /**
     * post type
     */
    public function register_post_type() {
        $labels = array(
            'name'               => __( 'Projects', \PS::$theme_name ),
            'add_new'            => __( 'Add project', \PS::$theme_name ),
            'new_item'           => __( 'New project', \PS::$theme_name )
        );

        $args = array(
            'labels'             => $labels,
            'show_ui'             => true,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'hierarchical'        => false,
            'query_var'           => true,
            'supports'            => array( 'title' ),
            'has_archive'         => false
        );

        register_post_type( 'project', $args );
    }

}