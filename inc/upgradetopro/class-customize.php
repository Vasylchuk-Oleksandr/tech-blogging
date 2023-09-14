<?php
/**
 * Tech Blogging Theme Info
 *
 * @package Tech Blogging
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tech_blogging_customizer_theme_info( $wp_customize ) {

    $wp_customize->add_section( 'theme_info', array(
		'title'       => __( 'Watch a Quick Demo' , 'tech-blogging' ),
		'priority'    => 6,
	) );

    /** Important Links */
	$wp_customize->add_setting( 'tech_blogging_theme_info',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $theme_info = '<h2>';
	$theme_info .= sprintf( __( 'To watch a quick tutorial about how to customize your theme, %1$sclick here.%2$s', 'tech-blogging' ),  '<a href="' . esc_url( 'https://www.smarterthemes.com/theme-tech-blogging/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</h2>';

	$wp_customize->add_control( new Tech_Blogging_Note_Control( $wp_customize,
        'tech_blogging_theme_info',
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );

}
add_action( 'customize_register', 'tech_blogging_customizer_theme_info' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tech_Blogging_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require get_template_directory() . '/inc/upgradetopro/section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Tech_Blogging_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Tech_Blogging_Customize_Section_Pro(
				$manager,
				'upgradetopro',
				array(
					'priority'       => 1,
					'pro_text' => esc_html__( 'Tech Blogging - Upgrade to Pro', 'tech-blogging' ),
					'pro_url'  => 'https://www.smarterthemes.com/theme-tech-blogging',
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tech-blogging-customize-controls', get_theme_file_uri( '/inc/upgradetopro/customize-controls.js' ), array( 'customize-controls' ) );

		wp_enqueue_style( 'tech-blogging-customize-controls', get_theme_file_uri( '/inc/upgradetopro/customize-controls.css' ));
	}
}

// Doing this customizer thang!
Tech_Blogging_Customize::get_instance();
