<?php
/*
Plugin Name: Les éditions N41
Plugin URI: https://n41.plugins.com
Description: Le catalogue des livres des éditions N41.
Version: 1.0
Author: N41
Author URI: https://n41.com
*/


/**
 * Charge les traductions de l'extension
 *
 */
function n41_editions_load_plugin_textdomain() {
	load_plugin_textdomain( 'n41-editions', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'n41_editions_load_plugin_textdomain' );


/**
 * Enregistre un post personnalisé appelé "n41_book".
 *
 * @see get_post_type_labels() for label keys.
 */
function n41_editions_register_book_post_type_and_taxonomies() {
    $labels = array(
		'name'					   =>  __('Books', 'n41-editions'),
		'singular_name'			   =>  __('Book', 'n41-editions'),
		'add_new'				   =>  __('Add New', 'n41-editions'),
		'add_new_item'			   =>  __('Add New Book', 'n41-editions'),
		'edit_item'				   =>  __('Edit Book', 'n41-editions'),
		'new_item'				   =>  __('New Book', 'n41-editions'),
		'view_item'				   =>  __('View Book', 'n41-editions'),
		'view_items'			   =>  __('View Books', 'n41-editions'),
		'search_items'			   =>  __('Search Books', 'n41-editions'),
		'not_found'				   =>  __('No books found.', 'n41-editions'),
		'not_found_in_trash'       =>  __('No books found in Trash.', 'n41-editions'),
		'parent_item_colon'		   =>  __('Parent Book:', 'n41-editions'),
		'all_items' 			   =>  __('All Books', 'n41-editions'),
		'archives' 				   =>  __('Book Archives', 'n41-editions' ),
		'attributes' 			   =>  __('Book Attributes', 'n41-editions'),
		'insert_into_item'		   =>  __('Insert into book', 'n41-editions'),
		'uploaded_to_this_item'    =>  __('Uploaded to this book', 'n41-editions'),
		'featured_image'		   =>  __('Book Cover Image', 'n41-editions'),
		'set_featured_image'	   =>  __('Set cover image', 'n41-editions'),
		'remove_featured_image'    =>  __('Remove cover image', 'n41-editions'),
		'use_featured_image' 	   =>  __('Use as cover image', 'n41-editions'),
		'menu_name'                =>  __('Books', 'n41-editions'),
		'filter_items_list' 	   =>  __('Filter books list', 'n41-editions'),
		'items_list_navigation'    =>  __('Books list navigation', 'n41-editions'),
		'items_list' 			   =>  __('Books list', 'n41-editions'),
		'item_published'           =>  __('Book published.', 'n41-editions'),
		'item_published_privately' =>  __('Book published privately.', 'n41-editions'),
		'item_reverted_to_draft'   =>  __('Book reverted to draft.', 'n41-editions'),
		'item_scheduled'           =>  __('Book scheduled.', 'n41-editions'),
		'item_updated'             =>  __('Book updated.', 'n41-editions')
    );
 
    $args = array(
        'labels'             => $labels, // tableau des libellés pour la gestion du TPP
		'description'        => __('Book catalog', 'n41-editions'),
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
		'rewrite'            => array('slug' => __('books', 'n41-editions')),
		'query_var'          => true
    );
 
    register_post_type( 'n41_book', $args );
	
    register_taxonomy(
		'n41_genre',
		'n41_book',
		array(
			'labels'       => array(
								'name'          =>  __('Genres', 'n41-editions'),
								'singular_name'	=>  __('Genre', 'n41-editions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('genres', 'n41-editions'))
		)
	);

    register_taxonomy(
		'n41_author',
		'n41_book',
		array(
			'labels'       => array(
								'name'          =>  __('Authors', 'n41-editions'),
								'singular_name'	=>  __('Author', 'n41-editions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('authors', 'n41-editions'))
		)
	);

    register_taxonomy(
		'n41_original_language',
		'n41_book',
		array(
			'labels'       => array(
								'name'          =>  __('Original languages', 'n41-editions'),
								'singular_name'	=>  __('Original language', 'n41-editions')
							  ),	
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('original-languages', 'n41-editions'))
		)
	);
}
 
add_action( 'init', 'n41_editions_register_book_post_type_and_taxonomies' );
