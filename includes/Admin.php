<?php

namespace WeDevs\Academy;

/**
 * summary
 */
class Admin {
	/**
	 * summary
	 */
	function __construct() {
		$posts = new Custom\Post_type();
		$addbook = new Admin\Addressbook2();
		$addressbook = new Admin\Addressbook();

		$this->dispatch_actions($addressbook, $addbook , $posts);
		new Admin\Menu($addressbook, $addbook);

	}

	public function dispatch_actions($addbook,$addressbook,$posts) {
		add_action('admin_init', [$addressbook, 'form_handler']);
		add_action('admin_init', [$addbook, 'form_handler2']);
		add_action('admin_post_wd-ac-delete-address', [$addressbook, 'delete_address']);

		add_action('init', [$posts, 'create_tutorials_cpt'], 0);
		add_action('init', [$posts, 'tuts_custom_taxonomies'], 0);
		register_activation_hook(__FILE__, 'rewrite_tuts_flush');
	}

}
