<?php

namespace WeDevs\Academy\Frontend;

/**
 * shortcode handler class
 */
class Shortcode {

	/**
	 * initialize the class
	 */
	function __construct() {
		add_shortcode('wedevs-academy', array($this, 'render_shortcode'));
		add_shortcode('wedevs-academy2', array($this, 'render_shortcode2'));

	}

	/**
	 * shortcode handler class
	 *
	 * @param mixed array $attr
	 * @param string      $content
	 *
	 * @return string
	 */

	public function render_shortcode($atts, $content = '') {

		return 'Hello from shortcode';

	}
	public function render_shortcode2($atts, $content = '') {

		return 'This is shortcode2 test';

	}
}
