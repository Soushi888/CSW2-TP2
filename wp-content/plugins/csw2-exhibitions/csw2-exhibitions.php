<?php
/*
Plugin Name: Les expositions CSW2
Plugin URI: https://csw2.plugins.com
Description: Le catalogue des tableaux des expositions de la classe CSW2.
Version: 1.0
Author: csw2
Author URI: https://csw2.com
*/


/**
 * Charge les traductions de l'extension
 *
 */
function csw2_exhibitions_load_plugin_textdomain() {
	load_plugin_textdomain( 'csw2-exhibitions', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	var_dump(basename(dirname( __FILE__ ) ) . '/languages/');
}
add_action( 'plugins_loaded', 'csw2_exhibitions_load_plugin_textdomain' );


/**
 * Enregistre un post personnalisé appelé "csw2_book".
 *
 * @see get_post_type_labels() for label keys.
 */
function csw2_exhibitions_register_book_post_type_and_taxonomies() {
    $labels = array(
		'name'					   =>  __('Books', 'csw2-exhibitions'),
		'singular_name'			   =>  __('Book', 'csw2-exhibitions'),
		'add_new'				   =>  __('Add New', 'csw2-exhibitions'),
		'add_new_item'			   =>  __('Add New Book', 'csw2-exhibitions'),
		'edit_item'				   =>  __('Edit Book', 'csw2-exhibitions'),
		'new_item'				   =>  __('New Book', 'csw2-exhibitions'),
		'view_item'				   =>  __('View Book', 'csw2-exhibitions'),
		'view_items'			   =>  __('View Books', 'csw2-exhibitions'),
		'search_items'			   =>  __('Search Books', 'csw2-exhibitions'),
		'not_found'				   =>  __('No books found.', 'csw2-exhibitions'),
		'not_found_in_trash'       =>  __('No books found in Trash.', 'csw2-exhibitions'),
		'parent_item_colon'		   =>  __('Parent Book:', 'csw2-exhibitions'),
		'all_items' 			   =>  __('All Books', 'csw2-exhibitions'),
		'archives' 				   =>  __('Book Archives', 'csw2-exhibitions' ),
		'attributes' 			   =>  __('Book Attributes', 'csw2-exhibitions'),
		'insert_into_item'		   =>  __('Insert into book', 'csw2-exhibitions'),
		'uploaded_to_this_item'    =>  __('Uploaded to this book', 'csw2-exhibitions'),
		'featured_image'		   =>  __('Book Cover Image', 'csw2-exhibitions'),
		'set_featured_image'	   =>  __('Set cover image', 'csw2-exhibitions'),
		'remove_featured_image'    =>  __('Remove cover image', 'csw2-exhibitions'),
		'use_featured_image' 	   =>  __('Use as cover image', 'csw2-exhibitions'),
		'menu_name'                =>  __('Books', 'csw2-exhibitions'),
		'filter_items_list' 	   =>  __('Filter books list', 'csw2-exhibitions'),
		'items_list_navigation'    =>  __('Books list navigation', 'csw2-exhibitions'),
		'items_list' 			   =>  __('Books list', 'csw2-exhibitions'),
		'item_published'           =>  __('Book published.', 'csw2-exhibitions'),
		'item_published_privately' =>  __('Book published privately.', 'csw2-exhibitions'),
		'item_reverted_to_draft'   =>  __('Book reverted to draft.', 'csw2-exhibitions'),
		'item_scheduled'           =>  __('Book scheduled.', 'csw2-exhibitions'),
		'item_updated'             =>  __('Book updated.', 'csw2-exhibitions')
    );
 
    $args = array(
        'labels'             => $labels, // tableau des libellés pour la gestion du TPP
		'description'        => __('Book catalog', 'csw2-exhibitions'),
        'public'             => true,
		'hierarchical'       => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'menu_position'      => null,
		'capability_type'    => 'post',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields'), 
        'has_archive'        => true,
		'rewrite'            => array('slug' => __('books', 'csw2-exhibitions')),
		'query_var'          => true
    );
 
    register_post_type( 'csw2_book', $args );
	
    register_taxonomy(
		'csw2_genre',
		'csw2_book',
		array(
			'labels'       => array(
								'name'          =>  __('Genres', 'csw2-exhibitions'),
								'singular_name'	=>  __('Genre', 'csw2-exhibitions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('genres', 'csw2-exhibitions'))
		)
	);

    register_taxonomy(
		'csw2_author',
		'csw2_book',
		array(
			'labels'       => array(
								'name'          =>  __('Authors', 'csw2-exhibitions'),
								'singular_name'	=>  __('Author', 'csw2-exhibitions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('authors', 'csw2-exhibitions'))
		)
	);

    register_taxonomy(
		'csw2_original_language',
		'csw2_book',
		array(
			'labels'       => array(
								'name'          =>  __('Original languages', 'csw2-exhibitions'),
								'singular_name'	=>  __('Original language', 'csw2-exhibitions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('original-languages', 'csw2-exhibitions'))
		)
	);
}
 
add_action( 'init', 'csw2_exhibitions_register_book_post_type_and_taxonomies' );
