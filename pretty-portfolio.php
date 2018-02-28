<?php
/*
Plugin Name:  Pretty Potfolio
Plugin URI:   
Description:  Portfolio display plugin based on template from Cathey Dills
Version:      1.0.0
Author:       
Author URI:   
License:      GPL2+
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  pretty-portfolio
Domain Path:  
https://www.lynda.com/WordPress-tutorials/Creating-custom-post-types/508212/547133-4.html
*/


// Exit if accessed dirctly
if( !defined( 'ABSPATH' ) ) exit;


//register custom post type
// Textdomain must = pretty-portfolio
function pp_register_post_type() {
	
    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post type general name', 'pretty-portfolio' ),
        'singular_name'         => _x( 'Portfolio Item', 'Post type singular name', 'pretty-portfolio' ),
        'menu_name'             => _x( 'Portfolio Items', 'Admin Menu text', 'pretty-portfolio' ),
        'name_admin_bar'        => _x( 'Portfolio Items', 'Add New on Toolbar', 'pretty-portfolio' ),
	);
	
    $args = array(
        'labels'             => $labels, //$labels needs to match above
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'menu_icon'			 => 'dashicons-screenoptions' //add dashicon support
    );
	
	register_post_type( 'pp_portfolio' , $args);
	
	
}

add_action( 'init', 'pp_register_post_type');

/**
* Register Item Type taxonomy
*
*/

function pp_create_taxonomy () {
	
    $labels = array(
        'name'                       => _x( 'Item Types', 'taxonomy general name', 'pretty-portfolio' ),
        'singular_name'              => _x( 'Item Type', 'taxonomy singular name', 'pretty-portfolio' ),

    );
 
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column' 	=> true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'Item-Type' ),
    );
	
	register_taxonomy( 'pp_item_type', 'pp_portfolio', $args );
	
}
add_action( 'init', 'pp_create_taxonomy' );



