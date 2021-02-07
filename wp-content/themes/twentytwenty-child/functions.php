<?php

	add_action( 'wp_enqueue_scripts', 'tt_child_enqueue_parent_styles' );

	function tt_child_enqueue_parent_styles() {
	   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	}

/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// disable Gutenberg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable  Gutenberg for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function my_pre_get_posts( $query ) {
    
    // do not modify queries in the admin
    if( is_admin() ) {
        
        return $query;
        
    }
    
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'post' ) {
        
        // allow the url to alter the query
        if( isset($_GET['location']) ) {
            
            $query->set('meta_key', 'location');
            $query->set('meta_value', $_GET['location']);
            
        } 
        
    }
   //print_r($query);

    
    return $query;

}

//add_action('pre_get_posts', 'my_pre_get_posts');

function jbi_custom_fields() {
    x_add_metadata_group(
        'jbi_custom_field_group',
        array( 'post' ),
        array(
            'label' => 'Location',
        )
    );
    x_add_metadata_field(
        'Location',
        array( 'post' ),
        array(
            'group'       => 'jbi_custom_field_group',
            'field_type'  => 'text',
            'description' => 'Show location for particular article',
        )
    );
    x_add_metadata_field(
        'Title',
        array( 'post' ),
        array(
            'group'       => 'jbi_custom_field_group',
            'field_type'  => 'text',
            'description' => 'Show Title for particular article',
        )
    );
    x_add_metadata_field(
        'Author',
        array( 'post' ),
        array(
            'group'       => 'jbi_custom_field_group',
            'field_type'  => 'text',
            'description' => 'Show Author for particular article',
        )
    );     
}
add_action( 'custom_metadata_manager_init_metadata', 'jbi_custom_fields' );

// Register Sidebar for home page
add_action( 'widgets_init', 'jbi_register_sidebar' );
function jbi_register_sidebar() {
    register_sidebar(
            array(
                'id'            => 'jbi-right-sidebar',
                'name'          => 'jbi Right Sidebar',
                'description'   => 'Displaying Right panel Widgets',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            )
        );


}

function recentPosts($orderby = 'modified', $posts_per_page = 5) {
  $args = array(
    'orderby' => $orderby,
    'ignore_sticky_posts' => '1',
    'posts_per_page' => $posts_per_page
  );

  $modified_posts_query = new WP_Query($args);

  if($modified_posts_query->have_posts()) {

    echo '<ul>';

    while($modified_posts_query->have_posts()) {
      $modified_posts_query->the_post();

      echo '<li>';
      echo '<a href="'.get_permalink($modified_posts_query->post->ID).'">';
      echo get_the_title($modified_posts_query->post->ID);
      echo '</a>';
      echo '</li>';
    }

    echo '</ul>';
  }

  wp_reset_postdata();
}
?>