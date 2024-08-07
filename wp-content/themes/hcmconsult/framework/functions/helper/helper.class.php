<?php

namespace PS\Functions\Helper;

/**
 * Class Helper
 * @package PS\Functions\Helper
 * @since   1.0.0
 */
class Helper {

    /**
     * Init constructor.
     */
    public function __construct() {}

    /**
     ******* ОБЩИЕ ФУНКЦИИ *******
     */

    // get posts by args
    public static function get_posts( $post_type, $post_status = 'publish', $posts_per_page = -1, $paged = 1, $meta_query = array(), $tax_query = array(), $post__in = array(), $post__not_in = array(), $orderby = 'menu_order', $order = 'ASC' ) {
        $args['post_type']      = $post_type;
        $args['post_status']    = $post_status;
        $args['posts_per_page'] = $posts_per_page;
        $args['paged'] = $paged;
        if ( count( $meta_query ) ) {
            $args['meta_query'] = $meta_query;
        }
        if ( count( $tax_query ) ) {
            $args['tax_query'] = $tax_query;
        }
        if ( count( $post__in ) ) {
            $args['post__in'] = $post__in;
        }
        if ( count( $post__not_in ) ) {
            $args['post__not_in'] = $post__not_in;
        }
        if($orderby){
            $args['orderby'] = $orderby;
        }
        if($order){
            $args['order'] = $order;
        }
        return query_posts( $args );
    }

    /**
     ******* MAINPAGE *******
     */

    // get projects
    public static function get_mainpage_projects(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'project',
            'publish',
            -1,
            1,
            [
                [
                    'key' => 'mainpage_active',
                    'value'    => '1'
                ]
            ]
        );
    }

    /**
     ******* TEAM *******
     */

    // get team
    public static function get_team($team_category = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'team',
            'publish',
            -1,
            1,
            [],
            $team_category ? [
                [
                    'taxonomy' => 'team_category',
                    'field'    => 'term_id',
                    'terms'    => $team_category
                ]
            ] : []
        );
    }

    /**
     ******* SERVICES *******
     */

    // get services
    public static function get_services($service_category = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'service',
            'publish',
            -1,
            1,
            [],
            $service_category ? [
                [
                    'taxonomy' => 'service_category',
                    'field'    => 'term_id',
                    'terms'    => $service_category
                ]
            ] : []
        );
    }

    /**
     ******* PROJECTS *******
     */

    // get projects
    public static function get_projects($all = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'project',
            'publish',
            $all ? -1 : get_field('projects_posts_per_page', \PS::$projects_page)
        );
    }

    // get project number
    public static function get_project_number($post_id){
        global $wpdb;
        $n = 0;
        $projects = $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_type = 'project' AND post_status = 'publish' ORDER BY menu_order ASC"); if(is_array($projects) && count($projects)){
            foreach ($projects as $project){
                $n++;
                if($project == $post_id){
                    break;
                }
            }
        }
        return $n;
    }

    /**
     ******* BLOG *******
     */

    // get articles
    public static function get_blog(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'blog',
            'publish',
            get_field('blog_posts_per_page', \PS::$blog_page),
            1,
            [],
            [],
            [],
            [],
            'date',
            'DESC'
        );
    }

    // get random articles
    public static function get_random_articles($post_id){
        return \PS\Functions\Helper\Helper::get_posts(
            'blog',
            'publish',
            3,
            1,
            [],
            [],
            [],
            [$post_id],
            'rand'
        );
    }

    /**
     * SEARCH
     */

    // search page
    public static function search_results($search, $post_type = ''){
        global $wpdb;
        return $search ? $wpdb->get_col("SELECT DISTINCT t1.ID FROM {$wpdb->posts} t1, {$wpdb->postmeta} t2 WHERE t1.ID = t2.post_id AND t1.post_type IN (" . ($post_type ? "'" . $post_type . "'" : "'service', 'project', 'blog', 'team', 'page'") . ") AND t1.post_status = 'publish' AND (t1.post_title LIKE '%{$search}%' OR t2.meta_value LIKE '%{$search}%') AND t1.ID NOT IN (155," . \PS::$front_page . ")") : [];
    }

}