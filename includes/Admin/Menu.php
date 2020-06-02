<?php

namespace WeDevs\Academy\Admin;

/**
 * The Menu handler class
 */
class Menu {

	public $addressbook;
	public $addbook;
 

	/**
	 * Initialize the class
	 */
	function __construct($addressbook, $addbook ) {
		$this->addressbook = $addressbook;
		$this->addbook = $addbook;
 

		add_action('admin_menu', [$this, 'admin_menu']);
	}

	/**
	 * Register admin menu
	 *
	 * @return void
	 */
	public function admin_menu() {
		$parent_slug = 'wedevs-academy';
		$capability = 'manage_options';

		add_menu_page(__('weDevs Academy', 'wedevs-academy'), __('Academy', 'wedevs-academy'), $capability, $parent_slug, [$this->addressbook, 'plugin_page'], 'dashicons-welcome-learn-more');
		add_submenu_page($parent_slug, __('Address Book', 'wedevs-academy'), __('Address Book', 'wedevs-academy'), $capability, $parent_slug, [$this->addressbook, 'plugin_page']);
		add_submenu_page($parent_slug, __('Settings', 'wedevs-academy'), __('Settings', 'wedevs-academy'), $capability, 'wedevs-academy-settings', [$this, 'settings_page']);
		add_submenu_page(
			$parent_slug,
			__('Address Book2', 'wedevs-academy'),
			__('Address Book2', 'wedevs-academy'),
			$capability,
			'wedevs-academy-addbook',
			array($this->addbook, 'plugin_page')
		);
	}


	/**
	 *
	 * Submenu -settings callback function
	 *
	 * @return string
	 */
	public function settings_page() {
		// $settings = new Settings();
		// $settings->setting_page();

		echo "Setting page";
	}
 
}
