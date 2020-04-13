<?php
/*
Plugin Name: Les expositions CSW2
Plugin URI: https://csw2.plugins.com
Description: Catalogue des expositions de la classe CSW2.
Version: 1.0
Author: Soushi888
Author URI: https://csw2.com
*/


/**
 * Charge les traductions de l'extension
 *
 */
function csw2_exhibitions_load_plugin_textdomain()
{
	load_plugin_textdomain('csw2_exhibitions', FALSE, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'csw2_exhibitions_load_plugin_textdomain');


/**
 * Enregistre un post personnalisé appelé "csw2_exhibition".
 *
 * @see get_post_type_labels() for label keys.
 */
function csw2_exhibitions_register_exhibition_post_type_and_taxonomies()
{
	$labels = array(
		'name'					   =>  __('Exhibition', 'csw2_exhibitions'),
		'singular_name'			   =>  __('Exhibition', 'csw2_exhibitions'),
		'add_new'				   =>  __('Add New', 'csw2_exhibitions'),
		'add_new_item'			   =>  __('Add New Exhibition', 'csw2_exhibitions'),
		'edit_item'				   =>  __('Edit Exhibition', 'csw2_exhibitions'),
		'new_item'				   =>  __('New Exhibition', 'csw2_exhibitions'),
		'view_item'				   =>  __('View Exhibition', 'csw2_exhibitions'),
		'view_items'			   =>  __('View Exhibition', 'csw2_exhibitions'),
		'search_items'			   =>  __('Search Exhibition', 'csw2_exhibitions'),
		'not_found'				   =>  __('No exhibition found.', 'csw2_exhibitions'),
		'not_found_in_trash'       =>  __('No exhibition found in Trash.', 'csw2_exhibitions'),
		'parent_item_colon'		   =>  __('Parent exhibition:', 'csw2_exhibitions'),
		'all_items' 			   =>  __('All Exhibition', 'csw2_exhibitions'),
		'archives' 				   =>  __('Exhibition Archives', 'csw2_exhibitions'),
		'attributes' 			   =>  __('Exhibition Attributes', 'csw2_exhibitions'),
		'insert_into_item'		   =>  __('Insert into Exhibition', 'csw2_exhibitions'),
		'uploaded_to_this_item'    =>  __('Uploaded to this Exhibition', 'csw2_exhibitions'),
		'featured_image'		   =>  __('Exhibition Cover Image', 'csw2_exhibitions'),
		'set_featured_image'	   =>  __('Set cover image', 'csw2_exhibitions'),
		'remove_featured_image'    =>  __('Remove cover image', 'csw2_exhibitions'),
		'use_featured_image' 	   =>  __('Use as cover image', 'csw2_exhibitions'),
		'menu_name'                =>  __('Exhibition', 'csw2_exhibitions'),
		'filter_items_list' 	   =>  __('Filter exhibition list', 'csw2_exhibitions'),
		'items_list_navigation'    =>  __('Exhibition list navigation', 'csw2_exhibitions'),
		'items_list' 			   =>  __('Exhibition list', 'csw2_exhibitions'),
		'item_published'           =>  __('Exhibition published.', 'csw2_exhibitions'),
		'item_published_privately' =>  __('Exhibition published privately.', 'csw2_exhibitions'),
		'item_reverted_to_draft'   =>  __('Exhibition reverted to draft.', 'csw2_exhibitions'),
		'item_scheduled'           =>  __('Exhibition scheduled.', 'csw2_exhibitions'),
		'item_updated'             =>  __('Exhibition updated.', 'csw2_exhibitions')
	);

	$args = array(
		'labels'             => $labels, // tableau des libellés pour la gestion du TPP
		'description'        => __('Exhibition catalog', 'csw2_exhibitions'),
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
		'rewrite'            => array('slug' => __('exhibitions', 'csw2_exhibitions')),
		'query_var'          => true
	);

	register_post_type('csw2_exhibitions', $args);

	register_taxonomy(
		'csw2_theme',
		'csw2_exhibitions',
		array(
			'labels' => array(
				'name' => __('Themes', 'csw2_exhibitions'),
				'singular_name'	=> __('Theme', 'csw2_exhibitions'),
				'search_items' => __('Search a Theme', 'csw2_exhibitions'),
				'add_new_item' => __('Add Theme', 'csw2_exhibitions'),
				'parent_item' => __('Parent Theme', 'csw2_exhibitions'),
				'not_found' => __('No Theme found.', 'csw2_exhibitions')
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('themes', 'csw2_exhibitions'))
		)
	);

	register_taxonomy(
		'csw2_artist',
		'csw2_exhibitions',
		array(
			'labels'       => array(
				'name' => __('Artists', 'csw2_exhibitions'),
				'singular_name'	=> __('Artist', 'csw2_exhibitions'),
				'search_items' => __('Search a Artist', 'csw2_exhibitions'),
				'add_new_item' => __('Add Artist', 'csw2_exhibitions'),
				'not_found' => __('No Artist found.', 'csw2_exhibitions')
			),
			'public'       => true,
			'hierarchical' => false,
			'rewrite'      => array('slug' => __('artists', 'csw2_exhibitions'))
		)
	);

	register_taxonomy(
		'csw2_place',
		'csw2_exhibitions',
		array(
			'labels'       => array(
				'name' => __('Places', 'csw2_exhibitions'),
				'singular_name'	=> __('Place', 'csw2_exhibitions'),
				'search_items' => __('Search a Place', 'csw2_exhibitions'),
				'add_new_item' => __('Add Place', 'csw2_exhibitions'),
				'not_found' => __('No Place found.', 'csw2_exhibitions')
			),
			'public'       => true,
			'hierarchical' => false,
			'rewrite'      => array('slug' => __('place', 'csw2_exhibitions'))
		)
	);
}

add_action('init', 'csw2_exhibitions_register_exhibition_post_type_and_taxonomies');
