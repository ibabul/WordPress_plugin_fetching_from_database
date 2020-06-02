<?php

namespace WeDevs\Academy\Custom;

class Post_type {

	function create_tutorials_cpt() {
// public function __construct() {
		// 	add_action('init', 'create_tutorials_cpt', 0);
		// 	add_action('init', 'tuts_custom_taxonomies', 0);

// }

		$labels = array(
			'name' => __('WeDevs', 'Post Type General Name', 'wedevs-academy'),
			'singular_name' => __('Tutorial', 'Post Type singular Name', 'wedevs-academy'),
			'menu_name' => __('WeDevs', 'wedevs-academy'),
			'name_admin_bar' => __('WeDevs', 'wedevs-academy'),
			'archives' => __('WeDevs Archives', 'wedevs-academy'),
			'attributes' => __('WeDevs Attributes', 'wedevs-academy'),
			'parent_item_clone' => __('Parent Item', 'wedevs-academy'),

			'all_items' => __('All', 'wedevs-academy'),
			'add_new_item' => __('Add new WeDevs', 'wedevs-academy'),
			'add_new' => __('Add New', 'wedevs-academy'),
			'new_item' => __('New', 'wedevs-academy'),
			'edit_item' => __('edit', 'wedevs-academy'),
			'update_item' => __('Update', 'wedevs-academy'),
			'view_item' => __('View', 'wedevs-academy'),
			'view_items' => __('View', 'wedevs-academy'),
			'search_items' => __('Search', 'wedevs-academy'),
			'not_found' => __('Not Found', 'wedevs-academy'),
			'not_found_in_trash' => __('Not Found In Trash', 'wedevs-academy'),
			'featured_image' => __('Featured Image', 'wedevs-academy'),
			'set_featured_image' => __('Set Featured Image', 'wedevs-academy'),
			'remove_featured_image' => __('Remove Featured Image', 'wedevs-academy'),
			'use_featured_image' => __('Use as featured Image', 'wedevs-academy'),
			'insert_into_item' => __('Insert Into WeDevs', 'wedevs-academy'),
			'uploaded_to_this_item' => __('Upload To This item', 'wedevs-academy'),
			'item_list' => __('tutorials list', 'wedevs-academy'),
			'item_list_navigation' => __('tutorials list navigation', 'wedevs-academy'),
			'filter_items_list' => __('Filter Tutorial List', 'wedevs-academy'),

		);

		$args = array(
			'label' => __('WeDevs', 'wedevs-academy'),
			'description' => __('Fullstack Web Dev wedevs-academy', 'wedevs-academy'),
			'labels' => $labels,
			'menu_icon' => 'dashicons-grid-view',
			'supports' => array('title', 'editor', 'thumbnail', 'revision', 'author'),
			'taxonomies' => array('category', 'post_tag'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'hierachical' => false,
			'exclude_from_search' => false,
			'show_in_rest' => true,
			'public_queryable' => true,
			'capability_type' => 'post',
			'rewrite' => array('slug' => 'wedevs-academy'),

		);
		register_post_type('wedevs-academy', $args);
	}

	function rewrite_tuts_flush() {
		create_tutorials_cpt();
		flush_rewrite_rules();

	}

//custom taxonomies

	function tuts_custom_taxonomies() {
		$labels = array(
			'name' => _x('Developers', 'taxonomy general name', 'wedevs-academy'),
			'singular_name' => _x('Developer', 'taxonomy singular name', 'wedevs-academy'),
			'search_items' => __('Search Developers', 'wedevs-academy'),
			'all_items' => __('All Developer', 'wedevs-academy'),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __('Edit Developer', 'wedevs-academy'),
			'update_item' => __('Update Developer', 'wedevs-academy'),
			'add_new_item' => __('Add new Developer', 'wedevs-academy'),
			'new_item_name' => __('New Developer Name', 'wedevs-academy'),
			'separate_items_with_commas' => __('Separate Developer with commas', 'wedevs-academy'),
			'add_or_remove_items' => __('Add or Remove Developer', 'wedevs-academy'),
			'choose_from_most_used' => __('Choose from most use Developer', 'wedevs-academy'),
			'not_found' => __('Not Found Developer', 'wedevs-academy'),
			'menu_name' => __('Developer', 'wedevs-academy'),

		);

		$args = array(
			'hierachical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array('slug' => 'WeDevs_developer'),
		);

		register_taxonomy('WeDevs_developer', ['wedevs-academy'], $args);

	}
}
