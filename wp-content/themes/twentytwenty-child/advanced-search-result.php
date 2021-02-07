<?php
// Get data from URL into variables
$_location = $_GET['location'] != '' ? $_GET['location'] : '';
$_title    = $_GET['title'] != '' ? $_GET['title'] : '';
$_author   = $_GET['author'] != '' ? $_GET['author'] : '';

/*// Start the Query
$v_args = array(
        'post_type'     =>  'post', // your CPT
        's'             =>  $_location, // looks into everything with the keyword from your 'name field'
        'meta_query'    =>  array(
                                array(
                                    'key'     => 'location', 
                                    'value'   => 'delhi',
                                    'compare' => 'LIKE', // finds models that matches 'model' from the select field
                                ),
                            )
    );
$Query = new WP_Query( $v_args );*/

$posts = get_posts(array(
    'numberposts'   => -1,
    'post_type'     => 'post',
    'meta_query'    => array(
        'relation'      => 'AND',
        array(
            'key'       => 'location',
            'value'     => $_location,
            'compare'   => '=',
        ),
        array(
            'key'       => 'title',
            'value'     => $_title,
            'compare'   => '=',
        ),
        array(
            'key'       => 'author',
            'value'     => $_author,
            'compare'   => '=',
        ),
    ),
));

$Query = new WP_Query( $posts );

// Open this line to Debug what's query WP has just run
//var_dump($Query->request);

// Show the results
/*if( $Query->have_posts() ) :
    while( $Query->have_posts() ) : $Query->the_post();
        the_title();
    endwhile;
else :
    _e( 'Sorry, nothing matched your search criteria', 'textdomain' );
endif;*/
wp_reset_postdata();
?>