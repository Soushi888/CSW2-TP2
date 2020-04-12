<?php
/*
Plugin Name: Les expositions CSW2
Plugin URI: https://csw2.plugins.com
Description: Le répertoire des tableaux des expositions de la classe CSW2.
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
	load_plugin_textdomain('csw2-exhibitions', FALSE, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'csw2_exhibitions_load_plugin_textdomain');


/**
 * Enregistre un post personnalisé appelé "csw2_painting".
 *
 * @see get_post_type_labels() for label keys.
 */
function csw2_exhibitions_register_painting_post_type_and_taxonomies()
{
	$labels = array(
		'name'					   =>  __('paintings', 'csw2-exhibitions'),
		'singular_name'			   =>  __('painting', 'csw2-exhibitions'),
		'add_new'				   =>  __('Add New', 'csw2-exhibitions'),
		'add_new_item'			   =>  __('Add New painting', 'csw2-exhibitions'),
		'edit_item'				   =>  __('Edit painting', 'csw2-exhibitions'),
		'new_item'				   =>  __('New painting', 'csw2-exhibitions'),
		'view_item'				   =>  __('View painting', 'csw2-exhibitions'),
		'view_items'			   =>  __('View paintings', 'csw2-exhibitions'),
		'search_items'			   =>  __('Search paintings', 'csw2-exhibitions'),
		'not_found'				   =>  __('No paintings found.', 'csw2-exhibitions'),
		'not_found_in_trash'       =>  __('No paintings found in Trash.', 'csw2-exhibitions'),
		'parent_item_colon'		   =>  __('Parent painting:', 'csw2-exhibitions'),
		'all_items' 			   =>  __('All paintings', 'csw2-exhibitions'),
		'archives' 				   =>  __('painting Archives', 'csw2-exhibitions'),
		'attributes' 			   =>  __('painting Attributes', 'csw2-exhibitions'),
		'insert_into_item'		   =>  __('Insert into painting', 'csw2-exhibitions'),
		'uploaded_to_this_item'    =>  __('Uploaded to this painting', 'csw2-exhibitions'),
		'featured_image'		   =>  __('painting Cover Image', 'csw2-exhibitions'),
		'set_featured_image'	   =>  __('Set cover image', 'csw2-exhibitions'),
		'remove_featured_image'    =>  __('Remove cover image', 'csw2-exhibitions'),
		'use_featured_image' 	   =>  __('Use as cover image', 'csw2-exhibitions'),
		'menu_name'                =>  __('paintings', 'csw2-exhibitions'),
		'filter_items_list' 	   =>  __('Filter paintings list', 'csw2-exhibitions'),
		'items_list_navigation'    =>  __('paintings list navigation', 'csw2-exhibitions'),
		'items_list' 			   =>  __('paintings list', 'csw2-exhibitions'),
		'item_published'           =>  __('painting published.', 'csw2-exhibitions'),
		'item_published_privately' =>  __('painting published privately.', 'csw2-exhibitions'),
		'item_reverted_to_draft'   =>  __('painting reverted to draft.', 'csw2-exhibitions'),
		'item_scheduled'           =>  __('painting scheduled.', 'csw2-exhibitions'),
		'item_updated'             =>  __('painting updated.', 'csw2-exhibitions')
	);

	$args = array(
		'labels'             => $labels, // tableau des libellés pour la gestion du TPP
		'description'        => __('painting catalog', 'csw2-exhibitions'),
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
		'rewrite'            => array('slug' => __('paintings', 'csw2-exhibitions')),
		'query_var'          => true
	);

	register_post_type('csw2_painting', $args);

	register_taxonomy(
		'csw2_theme',
		'csw2_painting',
		array(
			'labels'       => array(
				'name'          =>  __('Themes', 'csw2-exhibitions'),
				'singular_name'	=>  __('Theme', 'csw2-exhibitions')
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('themes', 'csw2-exhibitions'))
		)
	);

	register_taxonomy(
		'csw2_artist',
		'csw2_painting',
		array(
			'labels'       => array(
				'name'          =>  __('Artists', 'csw2-exhibitions'),
				'singular_name'	=>  __('Artist', 'csw2-exhibitions')
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('artists', 'csw2-exhibitions'))
		)
	);

	register_taxonomy(
		'csw2_place',
		'csw2_painting',
		array(
			'labels'       => array(
				'name'          =>  __('Places', 'csw2-exhibitions'),
				'singular_name'	=>  __('Place', 'csw2-exhibitions')
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array('slug' => __('place', 'csw2-exhibitions'))
		)
	);
}

add_action('init', 'csw2_exhibitions_register_painting_post_type_and_taxonomies');
