<?php
	if ( ! function_exists( 'services_landing_page_setup' ) ) :

	function services_landing_page_setup() {
		$GLOBALS['content_width'] = apply_filters( 'services_landing_page_content_width', 640 );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css', services_landing_page_font_url() ) );

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'services_landing_page_activation_notice');
		}
	}
	endif;

	add_action( 'after_setup_theme', 'services_landing_page_setup' );

	// Notice after Theme Activation
	function services_landing_page_activation_notice() {
		echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing Services Landing Page Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Services Landing Page Theme.', 'services-landing-page' ) .'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=services_landing_page_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'services-landing-page' ) .'</a></span>';
		echo '</div>';
	}

	/* Theme Font URL */
	function services_landing_page_font_url() {
		$font_url      = '';
		$font_family   = array(
			'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
			'Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800',
			'Inter:wght@100..900'
		);
		$fonts_url = add_query_arg( array(
			'family' => implode( '&family=', $font_family ),
			'display' => 'swap',
		), 'https://fonts.googleapis.com/css2' );

		$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
		return $contents;
	}

	add_action( 'wp_enqueue_scripts', 'services_landing_page_enqueue_styles' );
	function services_landing_page_enqueue_styles() {
		wp_enqueue_style( 'services-landing-page-font', services_landing_page_font_url(), array() );
    	$parent_style = 'ecommerce-landing-page-basic-style'; // Style handle of parent theme.
    	
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'services-landing-page-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'services-landing-page-style',$ecommerce_landing_page_custom_css );
		require get_parent_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'ecommerce-landing-page-basic-style',$ecommerce_landing_page_custom_css );
		wp_enqueue_style( 'services-landing-page-block-style', get_theme_file_uri('/assets/css/blocks.css') );
		wp_enqueue_script( 'services-landing-page-custom-scripts-jquery', get_theme_file_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );	

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
		
	add_action( 'init', 'services_landing_page_remove_parent_function');
	function services_landing_page_remove_parent_function() {
		remove_action( 'admin_notices', 'ecommerce_landing_page_activation_notice' );
		remove_action( 'admin_menu', 'ecommerce_landing_page_gettingstarted' );
	}

	add_action( 'customize_register', 'services_landing_page_customize_register', 11 );
	function services_landing_page_customize_register($wp_customize) {
		global $wp_customize;
		$wp_customize->remove_section( 'ecommerce_landing_page_go_pro' );
		$wp_customize->remove_section( 'ecommerce_landing_page_get_started_link' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_cart_icon' );
		$wp_customize->remove_control( 'ecommerce_landing_page_cart_icon' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_show_hide_product' );
		$wp_customize->remove_control( 'ecommerce_landing_page_show_hide_product' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_product_small_text' );
		$wp_customize->remove_control( 'ecommerce_landing_page_product_small_text' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_product_category' );
		$wp_customize->remove_control( 'ecommerce_landing_page_product_category' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_tagline_title1' );
		$wp_customize->remove_control( 'ecommerce_landing_page_tagline_title1' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_banner_background_color' );
		$wp_customize->remove_control( 'ecommerce_landing_page_banner_background_color' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_first_color' );
		$wp_customize->remove_control( 'ecommerce_landing_page_first_color' );
		$wp_customize->remove_control( 'ecommerce_landing_page_first_color' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_first_color' );



		$wp_customize->add_setting('ecommerce_landing_page_top_myaccount_icon_url',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));

		$wp_customize->add_control('ecommerce_landing_page_top_myaccount_icon_url',array(
			'label'	=> esc_html__( 'Add Icon URL', 'services-landing-page' ), 
			'section'	=> 'ecommerce_landing_page_topbar_section',
			'setting'	=> 'ecommerce_landing_page_top_myaccount_icon_url',
			'type'	=> 'url'
		));

	   $wp_customize->add_setting('services_landing_page_slider_image_overlay_color', array(
			'default'           => '#006BA1',
			'sanitize_callback' => 'sanitize_hex_color',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'services_landing_page_slider_image_overlay_color', array(
			'label'    => __('Banner Image Overlay Color', 'services-landing-page'),
			'section'  => 'ecommerce_landing_page_banner',
			'priority' => 21,
		)));

		//Opacity
		$wp_customize->add_setting('services_landing_page_slider_opacity_color',array(
	      'default'              => '',
	      'sanitize_callback' => 'ecommerce_landing_page_sanitize_choices'
		));

		$wp_customize->add_control( 'services_landing_page_slider_opacity_color', array(
		'label'       => esc_html__( 'Banner Image Opacity','services-landing-page' ),
		'section'     => 'ecommerce_landing_page_banner',
		'type'        => 'select',
		'settings'    => 'services_landing_page_slider_opacity_color',
		'priority' => 22,
		'choices' => array(
	      '0' =>  esc_attr('0','services-landing-page'),
	      '0.1' =>  esc_attr('0.1','services-landing-page'),
	      '0.2' =>  esc_attr('0.2','services-landing-page'),
	      '0.3' =>  esc_attr('0.3','services-landing-page'),
	      '0.4' =>  esc_attr('0.4','services-landing-page'),
	      '0.5' =>  esc_attr('0.5','services-landing-page'),
	      '0.6' =>  esc_attr('0.6','services-landing-page'),
	      '0.7' =>  esc_attr('0.7','services-landing-page'),
	      '0.8' =>  esc_attr('0.8','services-landing-page'),
	      '0.9' =>  esc_attr('0.9','services-landing-page')
		),
		));
		
		$wp_customize->add_setting('services_landing_page_video_button_icon',array(
			'default'	=> 'fas fa-play',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'services_landing_page_video_button_icon',array(
			'label'	=> __('Video Button Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_video_button_icon',
			'type'		=> 'icon',
			'priority' => 39,
		)));

		$wp_customize->add_setting('services_landing_page_video_button_text',array(
			'default'	=> 'How We Work',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('services_landing_page_video_button_text',array(
			'label'	=> __('Video Button Text','services-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 40,
		));

		$wp_customize->add_setting('services_landing_page_video_button_url',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));
		$wp_customize->add_control('services_landing_page_video_button_url',array(
			'label'	=> __('Add Video Button URL','services-landing-page'),
			'description' => __('Add embed link','services-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_video_button_url',
			'type'	=> 'url',
			'priority' => 41,
		));

		$wp_customize->add_setting( 'services_landing_page_show_hide_image_sec',array(
	    	'default' => 0,
	      	'transport' => 'refresh',
	      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	    ));
	    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'services_landing_page_show_hide_image_sec',array(
	      	'label' => esc_html__( 'Show / Hide Image Section','services-landing-page' ),
	      	'section' => 'ecommerce_landing_page_banner',
	      	'priority' => 43,
	    )));

		$wp_customize->add_setting('services_landing_page_banner_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'services_landing_page_banner_image',array(
	      'label' => __('Banner Image','services-landing-page'),
	      'description' => __('Transperent Image size (500px x 500px)','services-landing-page'),
	      'section' => 'ecommerce_landing_page_banner',
	      'priority' => 44,
		)));

		$wp_customize->add_setting('services_landing_page_banner_img_background_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'services_landing_page_banner_img_background_color', array(
			'label'    => esc_html__( 'Banner Image Background Color', 'services-landing-page' ),
			'section'  => 'ecommerce_landing_page_banner',
			'priority' => 45,
		)));

		$wp_customize->add_setting('services_landing_page_banner_border_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'services_landing_page_banner_border_color', array(
			'label'    => esc_html__( 'Image Border Color', 'services-landing-page' ),
			'section'  => 'ecommerce_landing_page_banner',
			'priority' => 46,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon',array(
			'default'	=> 'fas fa-bolt',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon',array(
			'label'	=> __('Add Bolt Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon',
			'type'		=> 'icon',
			'priority' => 47,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title',array(
			'label'	=> esc_html__( 'Bolt Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 48,
		));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon1',array(
			'default'	=> 'fas fa-fan',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon1',array(
			'label'	=> __('Add Fan Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon1',
			'type'		=> 'icon',
			'priority' => 49,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title1',array(
			'label'	=> esc_html__( 'Fan Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 50,
		));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon2',array(
			'default'	=> 'fas fa-wrench',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon2',array(
			'label'	=> __('Add Wrench Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon2',
			'type'		=> 'icon',
			'priority' => 51,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title2',array(
			'label'	=> esc_html__( 'Wrench Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 52,
		));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon3',array(
			'default'	=> 'fas fa-screwdriver',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon3',array(
			'label'	=> __('Add Screwdriver Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon3',
			'type'		=> 'icon',
			'priority' => 53,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title3',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title3',array(
			'label'	=> esc_html__( 'Screwdriver Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 54,
		));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon4',array(
			'default'	=> 'fas fa-palette',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon4',array(
			'label'	=> __('Add Palette Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon4',
			'type'		=> 'icon',
			'priority' => 55,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title4',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title4',array(
			'label'	=> esc_html__( 'Palette Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 56,
		));

		$wp_customize->add_setting('services_landing_page_activecientcount_icon5',array(
			'default'	=> 'fas fa-gavel',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		    $wp_customize,'services_landing_page_activecientcount_icon5',array(
			'label'	=> __('Add Hammer Icon','services-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'services_landing_page_activecientcount_icon5',
			'type'		=> 'icon',
			'priority' => 57,
		)));

		$wp_customize->add_setting('services_landing_page_activecientcount_title5',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_activecientcount_title5',array(
			'label'	=> esc_html__( 'Hammer Icon Text', 'services-landing-page' ),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text',
			'priority' => 58,
		));

		//About Section

		$wp_customize->add_section('services_landing_page_feature_courses_section' , array(
	  		'title' => esc_html__( 'About Section', 'services-landing-page' ), 
			'panel' => 'ecommerce_landing_page_panel_id',
			'priority' => 50,
		) );

		$wp_customize->add_setting('services_landing_page_service_banner_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'services_landing_page_service_banner_image',array(
	      'label' => __('About Image','services-landing-page'),
	      'description' => __('Image size (430px x 430px)','services-landing-page'),
	      'section' => 'services_landing_page_feature_courses_section',
		)));

		$wp_customize->add_setting('services_landing_page_service_smallbanner_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'services_landing_page_service_smallbanner_image',array(
	      'label' => __('About Small Image','services-landing-page'),
	      'description' => __('Image size (150px x 150px)','services-landing-page'),
	      'section' => 'services_landing_page_feature_courses_section',
		)));

		$wp_customize->add_setting('services_landing_page_professional_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'services_landing_page_professional_image',array(
	      'label' => __('Professional Image','services-landing-page'),
	      'description' => __('Image size (50px x 50px)','services-landing-page'),
	      'section' => 'services_landing_page_feature_courses_section',
		)));

		$wp_customize->add_setting('services_landing_page_professional_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_professional_title',array(
			'label'	=> esc_html__( 'Professional Text', 'services-landing-page' ),
			'section'	=> 'services_landing_page_feature_courses_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( 'Professional', 'services-landing-page' ),
		    ),
		));

		$wp_customize->add_setting('services_landing_page_service_title1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_service_title1',array(
			'label'	=> esc_html__( 'About Title', 'services-landing-page' ), 
			'section'	=> 'services_landing_page_feature_courses_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( '20 year of experience', 'services-landing-page' ),
		    ),
		));

		$wp_customize->add_setting('services_landing_page_service_para',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_service_para',array(
			'label'	=> esc_html__( 'About Text', 'services-landing-page' ), 
			'section'	=> 'services_landing_page_feature_courses_section',
			'type'		=> 'text',
		));

		for ( $i=1; $i <= 4 ; $i++ ) {
		    
		     $wp_customize->add_setting('services_landing_page_list_icon' .$i,array(
				'default'	=> 'fas fa-check',
				'sanitize_callback'	=> 'sanitize_text_field'
			));	
			$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
		        $wp_customize,'services_landing_page_list_icon' .$i, array(
				'label'	=> __('Add List Icon','services-landing-page'),
				'transport' => 'refresh',
				'section'	=> 'services_landing_page_feature_courses_section',
				'type'		=> 'icon'
			)));

		    $wp_customize->add_setting( 'services_landing_page_page_list' . $i, array(
		      'default'           => '',
		      'sanitize_callback' => 'sanitize_text_field'
		    ));
		    $wp_customize->add_control( 'services_landing_page_page_list' . $i, array(
		      'label'    => __( 'Add List Text', 'services-landing-page' ),
		      'section'  => 'services_landing_page_feature_courses_section',
		      'type'     => 'text'
		    ));
		}

		$wp_customize->add_setting('services_landing_page_service_author_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'services_landing_page_service_author_image',array(
	      'label' => __('Author Image','services-landing-page'),
	      'description' => __('Image size (80px x 80px)','services-landing-page'),
	      'section' => 'services_landing_page_feature_courses_section',
	     
		)));

		$wp_customize->add_setting('services_landing_page_author_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_author_title',array(
			'label'	=> esc_html__( 'Author Title', 'services-landing-page' ),
			'section'	=> 'services_landing_page_feature_courses_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( 'James Bond', 'services-landing-page' ),
		    ),
		));

		$wp_customize->add_setting('services_landing_page_author_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('services_landing_page_author_text',array(
			'label'	=> esc_html__( 'Author Designation', 'services-landing-page' ),
			'section'	=> 'services_landing_page_feature_courses_section',
			'type'		=> 'text',
			'input_attrs' => array(
		      'placeholder' => __( 'CEO', 'services-landing-page' ),
		    ),
		));

	}

	add_action( 'customize_register', 'services_landing_page_typography_customize_register', 12 );
	function services_landing_page_typography_customize_register( $wp_customize ) {
		$wp_customize->remove_control( 'ecommerce_landing_page_second_color' );
	}

	define('SERVICES_LANDING_PAGE_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-services-landing-page/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_SUPPORT',__('https://wordpress.org/support/theme/services-landing-page/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_REVIEW',__('https://wordpress.org/support/theme/services-landing-page/reviews','services-landing-page'));
	define('SERVICES_LANDING_PAGE_BUY_NOW',__('https://www.vwthemes.com/themes/landing-page-wordpress-theme/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_LIVE_DEMO',__('https://www.vwthemes.net/services-landing-page/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/services-landing-page-pro/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_FAQ',__('https://www.vwthemes.com/faqs/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_CONTACT',__('https://www.vwthemes.com/contact/','services-landing-page'));
	define('SERVICES_LANDING_PAGE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','services-landing-page'));


	if ( ! defined( 'ECOMMERCE_LANDING_PAGE_GO_PRO' ) ) {
		define( 'ECOMMERCE_LANDING_PAGE_GO_PRO', ' https://www.vwthemes.com/themes/landing-page-wordpress-theme/');
	}

	if ( ! defined( 'ECOMMERCE_LANDING_PAGE_GETSTARTED_URL' ) ) {
	define( 'ECOMMERCE_LANDING_PAGE_GETSTARTED_URL', 'themes.php?page=services_landing_page_guide');
	}

	/* Theme Widgets Setup */

	function services_landing_page_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Footer Navigation 1', 'services-landing-page' ),
			'description'   => __( 'Appears on footer 1', 'services-landing-page' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 2', 'services-landing-page' ),
			'description'   => __( 'Appears on footer 2', 'services-landing-page' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 3', 'services-landing-page' ),
			'description'   => __( 'Appears on footer 3', 'services-landing-page' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 4', 'services-landing-page' ),
			'description'   => __( 'Appears on footer 4', 'services-landing-page' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'services_landing_page_widgets_init' );

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Services_Landing_Page_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'services-landing-page';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class Services_Landing_Page_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Services_Landing_Page_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Services_Landing_Page_Customize_Section_Pro( $manager, 'services_landing_page_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'SERVICES PRO', 'services-landing-page' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'services-landing-page' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/landing-page-wordpress-theme/'),
		) ) );
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'services-landing-page-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'services-landing-page-customize-controls', get_stylesheet_directory_uri() . '/assets/css/customize-controls-child.css' );
	}
}
Services_Landing_Page_Customize::get_instance();



/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Plugin Activation */
require get_theme_file_path() . '/inc/getstart/plugin-activation.php';

/* Tgm */
require get_theme_file_path() . '/inc/tgm/tgm.php';

