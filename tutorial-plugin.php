<?php
/**
 * Tutorial plugin
 *
 * @package   tutorialPlugin
 * @author    MD Imtiaz
 * @copyright 2020 md imtiaz
 * @wordpress-plugin
 * Plugin Name: Tutorial plugin
 * Description: This plugin is build on the bases of a learning course.
 * Author: MD Imtiaz
 * Author URI: https://wpmaestro.net/
 * Version: 1.0.0
 * Requires at least: 5.3.0
 * Tested up to: 5.4
 **/

if (!defined('ABSPATH')) {
	exit;
}

/**
 * The main plugin class
 */

require_once __DIR__ . '/vendor/autoload.php';

final class WeDevs_Academy {

	const version = '1.0.0';

	/**
	 * class constructor
	 */

	private function __construct() {
		
		$this->define_constants();

		register_activation_hook(__FILE__, array($this, 'activate'));

		add_action('plugins_loaded', array($this, 'init_plugin'));
	}

	/**
	 *
	 * @return \WeDevs_academy;
	 */

	public static function init() {
		static $instance = false;

		if (!$instance) {
			$instance = new self();
		}
		return $instance;
	}
	/**
	 * Define the constant
	 */
	public function define_constants() {
		define('WD_ACADEMY_VERSION', self::version);
		define('WD_ACADEMY_FILE', __FILE__);
		define('WD_ACADEMY_PATH', __DIR__);
		define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE));
		define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets');
	}

	/**
	 * initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {

		if (is_admin()) {
			// For back-end admin dashboard

			new WeDevs\Academy\Admin();
		} else {
			// This portion will work only on front-end

			new WeDevs\Academy\Frontend\Shortcode();
		}
	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */

	public function activate() {
		$installer = new WeDevs\Academy\Installer();
		$installer->run();
	}
}

/**
 * @return \WeDevs_academy
 */

function wedevs_academy() {
	return WeDevs_Academy::init();
}

// kick-off the plugin
wedevs_academy();
