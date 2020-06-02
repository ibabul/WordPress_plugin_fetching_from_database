<?php

namespace WeDevs\Academy\Admin;

class Addressbook2 {
	public $errors = [];

	public function plugin_page() {

		$action = isset($_GET['action']) ? $_GET['action'] : 'list';

		switch ($action) {
		case 'new':
			$template = __DIR__ . '/views2/address-new.php';
			break;

		case 'edit':
			$template = __DIR__ . '/views2/address-edit.php';
			break;

		case 'view':
			$template = __DIR__ . '/views2/address-view.php';
			break;

		default:
			$template = __DIR__ . '/views2/address-list.php';

			break;
		}

		if (file_exists($template)) {
			include $template;
		}
	}

	public function form_handler2() {
		if (!isset($_POST['submit_address2'])) {
			return;
		}

		if (!wp_verify_nonce($_POST['_wpnonce'], 'new-address2')) {
			wp_die("Are you trying to hack?");
		}

		if (!current_user_can('manage_options')) {
			wp_die("Are you trying to hack?");
		}

		$name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : "";
		$address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : "";
		$phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : "";

		if (empty($name)) {
			$this->errors['name'] = __('Please provide a name', 'wedevs-academy');
		}

		if (empty($phone)) {
			$this->errors['phone'] = __('Please provide a phone number', 'wedevs-academy');
		}

		if (!empty($this->errors)) {
			return;
		}

		$insert_id = wd_ac_insert_address([
			'name' => $name,
			'address' => $address,
			'phone' => $phone,

		]);

		if (is_wp_error($insert_id)) {
			wp_die($insert_id->intl_get_error_message());
		}

		$redirected_to = admin_url('admin.php?page=wedevs-academy-addbook&inserted=true');

		wp_redirect($redirected_to);

		print_r($_POST);
		exit;
	}

}
