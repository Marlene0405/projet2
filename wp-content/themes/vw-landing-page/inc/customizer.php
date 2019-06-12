<?php
/**
 * VW Landing Page Theme Customizer
 *
 * @package VW Landing Page
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_landing_page_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_landing_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-landing-page' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_landing_page_left_right', array(
    	'title'      => __( 'General Settings', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_theme_options',array(
        'default' => __('Right Sidebar','vw-landing-page'),
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_landing_page_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-landing-page'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-landing-page'),
        'section' => 'vw_landing_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-landing-page'),
            'Right Sidebar' => __('Right Sidebar','vw-landing-page'),
            'One Column' => __('One Column','vw-landing-page'),
            'Three Columns' => __('Three Columns','vw-landing-page'),
            'Four Columns' => __('Four Columns','vw-landing-page'),
            'Grid Layout' => __('Grid Layout','vw-landing-page')
        ),
	) );

	$wp_customize->add_setting('vw_landing_page_page_layout',array(
        'default' => __('One Column','vw-landing-page'),
        'sanitize_callback' => 'vw_landing_page_sanitize_choices'
	));
	$wp_customize->add_control('vw_landing_page_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-landing-page'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-landing-page'),
        'section' => 'vw_landing_page_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-landing-page'),
            'Right Sidebar' => __('Right Sidebar','vw-landing-page'),
            'One Column' => __('One Column','vw-landing-page')
        ),
	) );
	
	//Topbar
	$wp_customize->add_section( 'vw_landing_page_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_phone',array(
		'label'	=> __('Add Phone Number','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_email',array(
		'label'	=> __('Add Email Address','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_topbtn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_topbtn_text',array(
		'label'	=> __('Add Button Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'REQUEST A CONSULT', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_landing_page_topbtn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_landing_page_topbtn_url',array(
		'label'	=> __('Add Button URL','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_landing_page_header_search',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_landing_page_header_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','vw-landing-page'),
       'section' => 'vw_landing_page_topbar',
    ));
    
	//Slider
	$wp_customize->add_section( 'vw_landing_page_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_landing_page_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-landing-page'),
       'section' => 'vw_landing_page_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_landing_page_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_landing_page_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_landing_page_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-landing-page' ),
			'description' => __('Slider image size (1500 x 570)','vw-landing-page'),
			'section'  => 'vw_landing_page_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
    
	//Info section
	$wp_customize->add_section( 'vw_landing_page_info_section' , array(
    	'title'      => __( 'Info Section', 'vw-landing-page' ),
		'priority'   => null,
		'panel' => 'vw_landing_page_panel_id'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_landing_page_info',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_landing_page_sanitize_choices',
	));
	$wp_customize->add_control('vw_landing_page_info',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display info','vw-landing-page'),
		'section' => 'vw_landing_page_info_section',
	));

	//About us section
	$wp_customize->add_section( 'vw_landing_page_about_section' , array(
    	'title'      => __( 'About Section', 'vw-landing-page' ),
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_landing_page_section_title',array(
		'label'	=> __('Add Section Title','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_about_section',
		'type'=> 'text'
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'vw_landing_page_about', array(
			'default'           => '',
			'sanitize_callback' => 'vw_landing_page_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_landing_page_about', array(
			'label'    => __( 'Select About Page', 'vw-landing-page' ),
			'description' => __('Slider image size (1500 x 590)','vw-landing-page'),
			'section'  => 'vw_landing_page_about_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//Content Craetion
	$wp_customize->add_section( 'vw_landing_page_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-landing-page' ),
		'priority' => null,
		'panel' => 'vw_landing_page_panel_id'
	) );

	$wp_customize->add_setting('vw_landing_page_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Landing_Page_Content_Creation( $wp_customize, 'vw_landing_page_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-landing-page' ),
		),
		'section' => 'vw_landing_page_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-landing-page' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_landing_page_footer',array(
		'title'	=> __('Footer','vw-landing-page'),
		'panel' => 'vw_landing_page_panel_id',
	));	
	
	$wp_customize->add_setting('vw_landing_page_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_landing_page_footer_text',array(
		'label'	=> __('Copyright Text','vw-landing-page'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-landing-page' ),
        ),
		'section'=> 'vw_landing_page_footer',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_landing_page_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Landing_Page_Customize {

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
			$instance = new self;
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
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Landing_Page_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Landing_Page_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'VW LANDING PAGE', 'vw-landing-page' ),
					'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-landing-page' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-landing-page-theme/'),
				)
			)
		);
		
	// Register sections.
	$manager->add_section(
			new VW_Landing_Page_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 1,
					'title'    => esc_html__( 'Documentation', 'vw-landing-page' ),
					'pro_text' => esc_html__( 'Docs', 'vw-landing-page' ),
					'pro_url'  => admin_url('themes.php?page=vw_landing_page_guide'),
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

		wp_enqueue_script( 'vw-landing-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-landing-page-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Landing_Page_Customize::get_instance();