<?php

class Admin_Menu {

	private $screens;

	public function __construct() {
		// define our screens
		$this->screens = array(
			'db-index' => array(
				'page_title' => __('Dashboarder'),
				'menu_title' => __('Dashboarder'),
				'callback' => 'index_page', // note that this has to be a class method
				'hookname' => null,
			),
			'db-widgets' => array(
				'page_title' => __('Widgets'),
				'menu_title' => __('Widgets'),
				'callback' => 'widgets_page', // note that this has to be a class method
				'hookname' => null,
			),
			'db-new' => array(
				'page_title' => __('New Widgets'),
				'menu_title' => __('New Widgets'),
				'callback' => 'new_widgets_page', // note that this has to be a class method
				'hookname' => null,
			),
			'db-addons' => array(
				'page_title' => __('Add-Ons'),
				'menu_title' => __('Add-Ons'),
				'callback' => 'addons_page', // note that this has to be a class method
				'hookname' => null,
			),

		);

	}

	public function create_menu() {
		$this->hookname = add_menu_page('WordPress Dashboarder', 'Dashboarder', 'read', 'db-index', array($this, 'index_page'));

		foreach ($this->screens as $slug => $args) {
			$this->screens[$slug]['hookname'] = add_submenu_page('db-index', $args['page_title'], $args['menu_title'], 'read', $slug, array($this, $args['callback']));
		}
	}

	public function index_page() {
		include_once(plugin_dir_path(__FILE__) . '../admin/pages/dashboarder-index.html');
	}

	public function  widgets_page() {
		include_once(plugin_dir_path(__FILE__) . '../admin/pages/dashboarder-widgets.html');
	}

	public function  new_widgets_page() {
		include_once(plugin_dir_path(__FILE__) . '../admin/pages/dashboarder-new-widgets.html');
	}

	public function  addons_page() {
		include_once(plugin_dir_path(__FILE__) . '../admin/pages/dashboarder-addons.html');
	}
}