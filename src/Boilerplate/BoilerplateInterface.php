<?php

namespace Boilerplate;

/**
 * Interface of the main class
 * 
 * @package Boilerplate
 */
interface BoilerplateInterface
{
	/**
	 * Setup the class instance
	 *
	 * @return void
	 */
	public function setup();

	/**
	 * Sets up theme defaults and registers support for various WordPress features
	 *
	 * @return void
	 */
	public function setup_theme();

	/**
	 * Setup WP hooks for the template
	 *
	 * @return void
	 */
	public function setup_hooks();

	/**
	 * Add a menu to the instance
	 *
	 * @param mixed $id
	 * @param mixed $text
	 * 
	 * @return void
	 */
	public function add_menu($id, $text);

	/**
	 * Add an array of support features to the instance
	 *
	 * @param array $support
	 * 
	 * @return void
	 */
	public function add_support(array $support);

	/**
	 * Add an array of sidebars to the instance
	 *
	 * @param array $sidebar
	 * 
	 * @return void
	 */
	public function add_sidebar(array $sidebar);

	/**
	 * Add an array of formats to the instance
	 *
	 * @param array $formats
	 * 
	 * @return void
	 */
	public function add_format(array $formats);
}
