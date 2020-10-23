<?php
/**
 * Customizer Configuration File
 *
 * This file is used to define the different panels, sections and controls for Vast
 *
 * @package Vast
 */

/**
 * Vast Customizer Config Class.
 *
 * Description.
 *
 * @since 1.0.0
 */
class Vast_Customizer_Config {

	/**
	 * Store panels config.
	 *
	 * @var array
	 */
	public $panels;

	/**
	 * Store sections config.
	 *
	 * @var array
	 */
	public $sections;

	/**
	 * Customizer custom control types.
	 *
	 * @var array
	 */
	public $controls;

	/**
	 * Store controls config.
	 *
	 * @var array
	 */
	public $settings;

	/**
	 * Store default section config.
	 *
	 * @var default_sections
	 */
	public $default_sections;

	/**
	 * Store default section config.
	 *
	 * @var default_controls
	 */
	public $default_controls;

	/**
	 * Store instance config.
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 *  Get Instance creates a singleton class that's cached to stop duplicate instances.
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}
		return self::$instance;
	}

	/**
	 *  Init behaves like, and replaces, construct
	 */
	public function init() {
		global
			$wp_customizer_sections,
			$wp_customizer_controls,
			$vast_customizer_panels,
			$vast_customizer_sections,
			$vast_customizer_settings,
			$vast_customizer_controls;

		// Init and store panels.
		$this->panels   = apply_filters( 'vast_customizer_panels', $vast_customizer_panels );

		// Init and store sections.
		$this->sections = apply_filters( 'vast_customizer_sections', $vast_customizer_sections );

		// Init and store settings.
		$this->settings = apply_filters( 'vast_customizer_settings', $vast_customizer_settings );

		// Init and store custom control types.
		$this->controls = apply_filters( 'vast_customizer_controls', $vast_customizer_controls );

		// Init and store default sections.
		$this->default_sections = apply_filters( 'vast_default_sections', $wp_customizer_sections );

		// Init and store default sections.
		$this->default_controls = apply_filters( 'vast_default_control', $wp_customizer_controls );
	}
}
