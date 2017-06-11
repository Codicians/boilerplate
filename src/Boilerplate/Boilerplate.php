<?php

namespace Boilerplate;

use BoilerplateInterface;

/**
 * Boilerplate class for templates setup
 * 
 * @package Boilerplate
 */
class Boilerplate implements BoilerplateInterface {

	/**
	 * @var string
	 */
	protected $namespace = '';

	/**
	 * @var array
	 */
	protected $formats = [];

	/**
	 * @var array
	 */
	protected $menus = [];

	/**
	 * @var array
	 */
	protected $sidebars = [];

	/**
	 * @var array
	 */
	protected $support = [];

	/**
	 * Setup the class instance
	 *
	 * @param string $name
	 * @param array $params
	 * 
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	public function setup($namespace, array $params)
	{
		$this->namespace 	= $namespace;

		if (!empty($params)) {

			if (!empty($params['formats'])) {
				$this->formats = (array) $params['formats'];
			}

			if (!empty($params['menus'])) {
				$this->menus = (array) $params['menus'];
			}

			if (!empty($params['support'])) {
				$this->support = (array) $params['support'];
			}

		}

		$this->setup_theme();
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function setup_theme()
	{
		// Load text domain for language translations - disabled
		// load_theme_textdomain($this->namespace, get_template_directory() . '/languages');

		// Register navigation menus
		register_nav_menus($this->menus);

		// Register sidebars
		register_sidebars(count($this->sidebars), $this->sidebars);

		// Modify theme support with new array values if you want
		add_theme_support('post-formats', $this->formats);

		// Add other theme support
		foreach ($this->support as $value) {
			add_theme_support($value);
		}

		$this->setup_hooks();
	}

	/**
	 * Setup WordPress hooks for adding 
	 *
	 * @since 0.1.0
	 * 
	 * @return void
	 */
	protected function setup_hooks()
	{
		add_action('after_setup_theme', array($this, 'setup'));
	}

	/**
	 * Add a menu to the instance
	 *
	 * @since 0.1.0
	 * 
	 * @param mixed $id
	 * @param mixed $text
	 * 
	 * @return void
	 */
	public function add_menu($id, $text)
	{
		$this->menus[$id] = $text;
	}

	/**
	 * Add an array of support features to the instance
	 *
	 * @since 0.1.0
	 * 
	 * @param array $support
	 * @return void
	 */
	public function add_support(array $support)
	{
		$this->support = array_merge($this->support, $support);
	}

	/**
	 * Add an array of sidebars to the instance
	 *
	 * @since 0.1.0
	 * 
	 * @param array $sidebar
	 * 
	 * @return void
	 */
	public function add_sidebar(array $sidebar)
	{
		$this->sidebars = array_merge($this->menus, $sidebar);
	}

	/**
	 * Add an array of formats to the instance
	 *
	 * @since 0.1.0
	 * 
	 * @param array $formats
	 * 
	 * @return void
	 */
	public function add_format(array $formats)
	{
		$this->formats = array_merge($this->formats, $formats);
	}

}
