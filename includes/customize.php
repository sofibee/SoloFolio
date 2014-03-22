<?php
add_action( 'customize_register', 'solofolio_customize_register' );

function solofolio_customize_register( $wp_customize )
{
	class Customizer_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
		<?php
		}
	}

	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'static_front_page' );


	// Sidebar
	$wp_customize->add_section( 'solofolio_header_section' , array(
		'title'       => __( 'Sidebar', 'solofolio' ),
		'priority'    => 20,
		'description' => 'Header settings',
	) );

		$wp_customize->add_setting( 'solofolio_phone', array(
			'transport'   => 'postMessage',
			'default'           => '555-555-5555',
      ));

		$wp_customize->add_control( 'solofolio_phone', array(
			'label' => 'Phone Number',
			'settings' => 'solofolio_phone',
			'section' => 'solofolio_header_section',
			'type' => 'text',
			'priority' => '30',
		) );

		$wp_customize->add_setting( 'solofolio_email', array(
			'transport'   => 'postMessage',
			'default'           => 'john@johndoe.com',
        ));

		$wp_customize->add_control( 'solofolio_email', array(
			'label' => 'Email Address',
			'settings' => 'solofolio_email',
			'section' => 'solofolio_header_section',
			'type' => 'text',
			'priority' => '30',
		) );

		$wp_customize->add_setting( 'solofolio_location', array(
			'transport'   => 'postMessage',
			'default'           => 'Athens, Ohio',
        ));

		$wp_customize->add_control( 'solofolio_location', array(
			'label' => 'Location',
			'settings' => 'solofolio_location',
			'section' => 'solofolio_header_section',
			'type' => 'text',
			'priority' => '30',
		) );

		$wp_customize->add_setting( 'solofolio_header_width', array('default' => '200', 'transport'   => 'postMessage',) );

		$wp_customize->add_control( 'solofolio_header_width', array(
			'label' => 'Sidebar Width',
			'settings' => 'solofolio_header_width',
			'section' => 'solofolio_header_section',
			'priority' => '30', // Default is 10.
		) );

		$wp_customize->add_setting( 'solofolio_footer_text', array(
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( 'solofolio_footer_text', array(
			'label' => 'Copyright Text',
			'settings' => 'solofolio_footer_text',
			'section' => 'solofolio_header_section',
			'type' => 'text', // Default is "text"
			'priority' => '30', // Default is 10.
		) );

		$wp_customize->add_setting( 'solofolio_logo_width', array('default' => '200', 'transport'   => 'postMessage',) );

		$wp_customize->add_control( 'solofolio_logo_width', array(
			'label' => 'Logo Width',
			'settings' => 'solofolio_logo_width',
			'section' => 'solofolio_header_section',
			'priority' => '10', // Default is 10.
		) );

		$wp_customize->add_setting( 'solofolio_logo' );

		$wp_customize->add_control( 'solofolio_logo', array(
			'label' => 'Logo URL',
			'settings' => 'solofolio_logo',
			'section' => 'solofolio_header_section',
			'type' => 'text', // Default is "text"
			'priority' => '10', // Default is 10.
		) );

	// Design

	$wp_customize->add_section( 'solofolio_design_section' , array(
		'title'       => __( 'Page Design', 'solofolio' ),
		'priority'    => 5,
		'description' => 'Design settings',
	) );

		$wp_customize->add_setting('solofolio_background_color', array(
			'default'           => '282828',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_background_color', array(
			'label'    => __('Background Color', 'solofolio'),
			'section'  => 'solofolio_design_section',
			'settings' => 'solofolio_background_color',
		)));

		$wp_customize->add_setting( 'solofolio_body_font_size', array(
			'default' => '16px',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( 'solofolio_body_font_size', array(
			'label' => 'Font Size',
			'settings' => 'solofolio_body_font_size',
			'section' => 'solofolio_design_section',
			'type' => 'text',
		) );

		$wp_customize->add_setting('solofolio_body_font_color', array(
			'default'           => 'AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_font_color', array(
			'label'    => __('Font Color', 'solofolio'),
			'section'  => 'solofolio_design_section',
			'settings' => 'solofolio_body_font_color',
		)));

		$wp_customize->add_setting('solofolio_body_link_color', array(
			'default'           => '7a7a7a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_link_color', array(
			'label'    => __('Link Color', 'solofolio'),
			'section'  => 'solofolio_design_section',
			'settings' => 'solofolio_body_link_color',
		)));

		$wp_customize->add_setting('solofolio_body_link_color_hover', array(
			'default'           => 'FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_link_color_hover', array(
			'label'    => __('Link Color (Hover)', 'solofolio'),
			'section'  => 'solofolio_design_section',
			'settings' => 'solofolio_body_link_color_hover',
		)));

		$wp_customize->add_setting('solofolio_body_caption_color', array(
			'default'           => 'AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_caption_color', array(
			'label'    => __('Caption Font Color', 'solofolio'),
			'section'  => 'solofolio_design_section',
			'settings' => 'solofolio_body_caption_color',
		)));

	// Navigation

	$wp_customize->add_section( 'solofolio_navigation_section' , array(
		'title'       => __( 'Navigation', 'solofolio' ),
		'priority'    => 10,
		'description' => 'Navigation settings',
	) );

		$wp_customize->add_setting( 'solofolio_navigation_font_size', array(
			'default' => '14px',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( 'solofolio_navigation_font_size', array(
			'label' => 'Font Size',
			'settings' => 'solofolio_navigation_font_size',
			'section' => 'solofolio_navigation_section',
			'type' => 'text',
		) );

		$wp_customize->add_setting('solofolio_navigation_link_color', array(
			'default'           => '7a7a7a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_link_color', array(
			'label'    => __('Navigation Link Color', 'solofolio'),
			'section'  => 'solofolio_navigation_section',
			'settings' => 'solofolio_navigation_link_color',
		)));

		$wp_customize->add_setting('solofolio_navigation_link_color_hover', array(
			'default'           => 'FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_link_color_hover', array(
			'label'    => __('Navigation Link Color (Hover)', 'solofolio'),
			'section'  => 'solofolio_navigation_section',
			'settings' => 'solofolio_navigation_link_color_hover',
		)));

		$wp_customize->add_setting( 'solofolio_navigation_header_font_size', array(
			'default' => '14px',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( 'solofolio_navigation_header_font_size', array(
			'label' => 'Section Title Size',
			'settings' => 'solofolio_navigation_header_font_size',
			'section' => 'solofolio_navigation_section',
			'type' => 'text',
		) );

		$wp_customize->add_setting('solofolio_navigation_header_color', array(
			'default'           => 'FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_header_color', array(
			'label'    => __('Section Title Color', 'solofolio'),
			'section'  => 'solofolio_navigation_section',
			'settings' => 'solofolio_navigation_header_color',
		)));

	// Blog
	$wp_customize->add_section( 'solofolio_blog_section' , array(
		'title'       => __( 'Blog', 'solofolio' ),
		'priority'    => 90,
		'description' => 'Blog display settings',
	) );

		$wp_customize->add_setting( 'solofolio_blog_entry_title_size', array(
			'default' => '24px',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( 'solofolio_blog_entry_title_size', array(
			'label' => 'Entry Title Size',
			'settings' => 'solofolio_blog_entry_title_size',
			'section' => 'solofolio_blog_section',
			'type' => 'text',
		) );

		$wp_customize->add_setting('solofolio_blog_entry_title_color', array(
			'default'           => 'FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_title_color', array(
			'label'    => __('Post Title Color', 'solofolio'),
			'section'  => 'solofolio_blog_section',
			'settings' => 'solofolio_blog_entry_title_color',
		)));

		$wp_customize->add_setting('solofolio_blog_entry_title_color_hover', array(
			'default'           => 'AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_title_color_hover', array(
			'label'    => __('Post Title Color (Hover)', 'solofolio'),
			'section'  => 'solofolio_blog_section',
			'settings' => 'solofolio_blog_entry_title_color_hover',
		)));

		$wp_customize->add_setting('solofolio_blog_entry_byline_color', array(
			'default'           => 'FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_byline_color', array(
			'label'    => __('Byline Color', 'solofolio'),
			'section'  => 'solofolio_blog_section',
			'settings' => 'solofolio_blog_entry_byline_color',
		)));

		$wp_customize->add_setting( 'solofolio_blog_showauthor' );

		$wp_customize->add_control( 'solofolio_blog_showauthor', array(
			'settings' => 'solofolio_blog_showauthor',
			'label'    => __('Show author', 'solofolio'),
			'section'  => 'solofolio_blog_section',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'solofolio_blog_showcat' );

		$wp_customize->add_control( 'solofolio_blog_showcat', array(
			'settings' => 'solofolio_blog_showcat',
			'label'    => __('Show category', 'solofolio'),
			'section'  => 'solofolio_blog_section',
			'type'     => 'checkbox',
		));

	// Gallery
	$wp_customize->add_section( 'solofolio_gallery_section' , array(
		'title'       => __( 'Gallery', 'solofolio' ),
		'priority'    => 100,
		'description' => 'Gallery options',
	) );

		$wp_customize->add_setting('solofolio_gallery_default', array('default' => 'cycle-react'));

		$wp_customize->add_control('solofolio_gallery_default', array(
			'label'      => __('Default gallery format', 'solofolio'),
			'section'    => 'solofolio_gallery_section',
			'settings'   => 'solofolio_gallery_default',
			'type'       => 'select',
			'priority' => '10', // Default is 10.
			'choices'    => array(
				'cycle-react' => 'Dynamic',
				'slideshow' => 'Slideshow',
				'side-scroll' => 'Side scroll',
			),
		));

		$wp_customize->add_setting('solofolio_gallery_icon_color', array('default' => 'light'));

		$wp_customize->add_control('solofolio_gallery_icon_color', array(
			'label'      => __('Slideshow control icon color', 'solofolio'),
			'section'    => 'solofolio_gallery_section',
			'settings'   => 'solofolio_gallery_icon_color',
			'type'       => 'select',
			'priority' => '10', // Default is 10.
			'choices'    => array(
				'light' => 'Light',
				'dark' => 'Dark',
			),
		));

		$wp_customize->add_setting('solofolio_gallery_cursor_color', array('default' => 'dark'));

		$wp_customize->add_control('solofolio_gallery_cursor_color', array(
			'label'      => __('Slideshow control cursor color', 'solofolio'),
			'section'    => 'solofolio_gallery_section',
			'settings'   => 'solofolio_gallery_cursor_color',
			'type'       => 'select',
			'priority' => '10', // Default is 10.
			'choices'    => array(
				'dark' => 'Dark',
				'light' => 'Light',
			),
		));

		$wp_customize->add_setting( 'solofolio_gallery_sidescroll_padding', array('default' => '20') );

		$wp_customize->add_control( 'solofolio_gallery_sidescroll_padding', array(
			'label' => 'Side scroll gallery padding',
			'settings' => 'solofolio_gallery_sidescroll_padding',
			'section' => 'solofolio_gallery_section',
			'priority' => '20', // Default is 10.
		) );

	 // Tracking & CSS
	$wp_customize->add_section( 'solofolio_tracking_css' , array(
		'title'       => __( 'Tracking & CSS', 'solofolio' ),
		'priority'    => 200,
		'description' => 'Tracking code and CSS settings',
	) );

		$wp_customize->add_setting( 'solofolio_tracking' );

		$wp_customize->add_control( new Customizer_Textarea_Control( $wp_customize, 'solofolio_tracking', array(
			'label' => 'Tracking code',
			'settings' => 'solofolio_tracking',
			'section' => 'solofolio_tracking_css',
			'priority' => '', // Default is 10.
		) ) );

		$wp_customize->add_setting( 'solofolio_css' );

		$wp_customize->add_control( new Customizer_Textarea_Control( $wp_customize, 'solofolio_css', array(
			'label' => 'Custom CSS',
			'settings' => 'solofolio_css',
			'section' => 'solofolio_tracking_css',
			'priority' => '', // Default is 10.
		) ) );
}

function solofolio_customizer_live_preview()
{
	wp_enqueue_script(
		  'mytheme-themecustomizer',			//Give the script an ID
		  get_template_directory_uri().'/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional)
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'solofolio_customizer_live_preview' );
?>
