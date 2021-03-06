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

	$wp_customize->add_section( 'solofolio_logo_section' , array(
		'title'       => __( 'Logo', 'solofolio' ),
		'priority'    => 5,
	) );

		$wp_customize->add_setting( 'solofolio_logo_width', array('default' => '200', 'transport'   => 'postMessage',) );

		$wp_customize->add_control( 'solofolio_logo_width', array(
			'label' => 'Logo Width',
			'settings' => 'solofolio_logo_width',
			'section' => 'solofolio_logo_section',
			'priority' => '10',
		) );

		$wp_customize->add_setting( 'solofolio_logo' );

		$wp_customize->add_control( 'solofolio_logo', array(
			'label' => 'Logo Image URL',
			'settings' => 'solofolio_logo',
			'section' => 'solofolio_logo_section',
			'type' => 'text',
			'priority' => '10',
		) );

		$wp_customize->add_setting( 'solofolio_header_width', array('default' => '200', 'transport'   => 'postMessage',) );

		$wp_customize->add_control( 'solofolio_header_width', array(
			'label' => 'Width',
			'settings' => 'solofolio_header_width',
			'section' => 'solofolio_logo_section',
			'priority' => '10',
		) );

	$wp_customize->add_section( 'solofolio_colors_section' , array(
		'title'       => __( 'Colors', 'solofolio' ),
		'priority'    => 10,
	) );

		$wp_customize->add_setting('solofolio_background_color', array(
			'default'           => '#FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_background_color', array(
				'label'    => __('Site Background', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_background_color',
			)));

		$wp_customize->add_setting('solofolio_header_background_color', array(
			'default'           => '#FFFFFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_header_background_color', array(
				'label'    => __('Menu Background', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_header_background_color',
			)));

		$wp_customize->add_setting('solofolio_body_font_color', array(
			'default'           => '#AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_font_color', array(
				'label'    => __('Site Text', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_body_font_color',
			)));

		$wp_customize->add_setting('solofolio_body_link_color_hover', array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_link_color_hover', array(
				'label'    => __('Link (Hover)', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_body_link_color_hover',
			)));

		$wp_customize->add_setting('solofolio_body_link_color', array(
			'default'           => '#7a7a7a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_link_color', array(
				'label'    => __('Link', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_body_link_color',
			)));

		$wp_customize->add_setting('solofolio_body_caption_color', array(
			'default'           => '#AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_body_caption_color', array(
				'label'    => __('Caption Text', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_body_caption_color',
			)));

		$wp_customize->add_setting('solofolio_navigation_link_color', array(
			'default'           => '#7a7a7a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_link_color', array(
				'label'    => __('Menu Link', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_navigation_link_color',
			)));

		$wp_customize->add_setting('solofolio_navigation_link_color_hover', array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_link_color_hover', array(
				'label'    => __('Menu Link (Hover)', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_navigation_link_color_hover',
			)));

		$wp_customize->add_setting('solofolio_navigation_header_color', array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_navigation_header_color', array(
				'label'    => __('Menu Section Title', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_navigation_header_color',
			)));

		$wp_customize->add_setting('solofolio_blog_entry_title_color_hover', array(
			'default'           => '#AAAAAA',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_title_color_hover', array(
				'label'    => __('Blog Post Title (Hover)', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_blog_entry_title_color_hover',
			)));

		$wp_customize->add_setting('solofolio_blog_entry_title_color', array(
			'default'           => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_title_color', array(
				'label'    => __('Blog Post Title', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_blog_entry_title_color',
			)));

		$wp_customize->add_setting('solofolio_blog_entry_byline_color', array(
			'default'           => '#7a7a7a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'solofolio_blog_entry_byline_color', array(
				'label'    => __('Blog Post Byline', 'solofolio'),
				'section'  => 'solofolio_colors_section',
				'settings' => 'solofolio_blog_entry_byline_color',
			)));

	$wp_customize->add_section( 'solofolio_font_sizes_section' , array(
		'title'       => __( 'Font Sizes', 'solofolio' ),
		'priority'    => 20,
	) );

		$wp_customize->add_setting( 'solofolio_body_font_size', array(
			'default' => '16px',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( 'solofolio_body_font_size', array(
				'label' => 'Text',
				'settings' => 'solofolio_body_font_size',
				'section' => 'solofolio_font_sizes_section',
				'type' => 'text',
			) );

		$wp_customize->add_setting( 'solofolio_navigation_font_size', array(
			'default' => '14px',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( 'solofolio_navigation_font_size', array(
				'label' => 'Menu',
				'settings' => 'solofolio_navigation_font_size',
				'section' => 'solofolio_font_sizes_section',
				'type' => 'text',
			) );

		$wp_customize->add_setting( 'solofolio_navigation_header_font_size', array(
			'default' => '14px',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( 'solofolio_navigation_header_font_size', array(
				'label' => 'Menu Section Titles',
				'settings' => 'solofolio_navigation_header_font_size',
				'section' => 'solofolio_font_sizes_section',
				'type' => 'text',
			) );

		$wp_customize->add_setting( 'solofolio_blog_entry_title_size', array(
			'default' => '24px',
			'transport'   => 'postMessage',
        ));

			$wp_customize->add_control( 'solofolio_blog_entry_title_size', array(
				'label' => 'Blog Title',
				'settings' => 'solofolio_blog_entry_title_size',
				'section' => 'solofolio_font_sizes_section',
				'type' => 'text',
			) );

	$wp_customize->add_section( 'solofolio_content_section' , array(
		'title'       => __( 'Content', 'solofolio' ),
		'priority'    => 30,
	) );

		$wp_customize->add_setting( 'solofolio_phone', array(
			'transport'   => 'postMessage',
			'default'           => '555-555-5555',
      ));

			$wp_customize->add_control( 'solofolio_phone', array(
				'transport'   => 'postMessage',
				'label' => 'Phone Number',
				'settings' => 'solofolio_phone',
				'section' => 'solofolio_content_section',
				'type' => 'text',
				'priority' => '30',
			) );

		$wp_customize->add_setting( 'solofolio_email', array(
			'transport'   => 'postMessage',
			'default'           => 'john@johndoe.com',
        ));

			$wp_customize->add_control( 'solofolio_email', array(
				'transport'   => 'postMessage',
				'label' => 'Email Address',
				'settings' => 'solofolio_email',
				'section' => 'solofolio_content_section',
				'type' => 'text',
				'priority' => '30',
			) );

		$wp_customize->add_setting( 'solofolio_copyright_text', array('transport'   => 'postMessage',));

			$wp_customize->add_control( 'solofolio_copyright_text', array(
				'label' => 'Copyright Text',
				'settings' => 'solofolio_copyright_text',
				'section' => 'solofolio_content_section',
				'type' => 'text',
				'priority' => '30',
			) );

		$wp_customize->add_setting( 'solofolio_location', array(
			'transport'   => 'postMessage',
			'default'           => 'Athens, Ohio',
        ));

			$wp_customize->add_control( 'solofolio_location', array(
				'transport'   => 'postMessage',
				'label' => 'Location',
				'settings' => 'solofolio_location',
				'section' => 'solofolio_content_section',
				'type' => 'text',
				'priority' => '30',
			) );

	$wp_customize->add_section( 'solofolio_options_section' , array(
		'title'       => __( 'Options', 'solofolio' ),
		'priority'    => 90,
	) );

		$wp_customize->add_setting( 'solofolio_blog_showauthor' );

		$wp_customize->add_control( 'solofolio_blog_showauthor', array(
			'settings' => 'solofolio_blog_showauthor',
			'label'    => __('Show author', 'solofolio'),
			'section'  => 'solofolio_options_section',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'solofolio_blog_showdate', array('default' => 1));

		$wp_customize->add_control( 'solofolio_blog_showdate', array(
			'settings' => 'solofolio_blog_showdate',
			'label'    => __('Show date', 'solofolio'),
			'section'  => 'solofolio_options_section',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'solofolio_blog_showcat' );

		$wp_customize->add_control( 'solofolio_blog_showcat', array(
			'settings' => 'solofolio_blog_showcat',
			'label'    => __('Show category', 'solofolio'),
			'section'  => 'solofolio_options_section',
			'type'     => 'checkbox',
		));

		$wp_customize->add_setting( 'solofolio_blog_showtags' );

		$wp_customize->add_control( 'solofolio_blog_showtags', array(
			'settings' => 'solofolio_blog_showtags',
			'label'    => __('Show tags', 'solofolio'),
			'section'  => 'solofolio_options_section',
			'type'     => 'checkbox',
		));

	$wp_customize->add_section( 'solofolio_advanced_section' , array(
		'title'       => __( 'Advanced', 'solofolio' ),
		'priority'    => 200,
	) );

		$wp_customize->add_setting('solofolio_layout_mode', array('default' => 'heights', 'transport'   => 'refresh'));

		$wp_customize->add_control('solofolio_layout_mode', array(
			'label'      => __('Layout', 'solofolio'),
			'section'    => 'solofolio_advanced_section',
			'settings'   => 'solofolio_layout_mode',
			'type'       => 'select',
			'priority' => '5',
			'choices'    => array(
				'heights' => 'Heights',
				'horizon' => 'Horizon (Experimental)',
			),
		));

		$wp_customize->add_setting( 'solofolio_entry_width', array('default' => '900', 'transport'   => 'postMessage',) );

			$wp_customize->add_control( 'solofolio_entry_width', array(
				'label' => 'Blog Entry Width',
				'settings' => 'solofolio_entry_width',
				'section' => 'solofolio_advanced_section',
			) );

	$wp_customize->add_section( 'solofolio_tracking_css' , array(
		'title'       => __( 'Tracking & CSS', 'solofolio' ),
		'priority'    => 150,
	));

		$wp_customize->add_setting( 'solofolio_tracking' );

		$wp_customize->add_control( new Customizer_Textarea_Control( $wp_customize, 'solofolio_tracking', array(
			'label' => 'Tracking code',
			'settings' => 'solofolio_tracking',
			'section' => 'solofolio_tracking_css',
			'priority' => '',
		) ) );

		$wp_customize->add_setting( 'solofolio_css' );

		$wp_customize->add_control( new Customizer_Textarea_Control( $wp_customize, 'solofolio_css', array(
			'label' => 'Custom CSS',
			'settings' => 'solofolio_css',
			'section' => 'solofolio_tracking_css',
			'priority' => '',
		) ) );
}

function solofolio_customizer_live_preview()
{
	wp_enqueue_script(
		  'mytheme-themecustomizer',
		  get_template_directory_uri().'/js/theme-customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}
add_action( 'customize_preview_init', 'solofolio_customizer_live_preview' );
?>
