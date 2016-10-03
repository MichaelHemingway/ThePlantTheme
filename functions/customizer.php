<?php

if (class_exists('WP_Customize_Control'))
{
    /**
     * Class to create a custom post control
     */
    class Post_Dropdown_Custom_control extends WP_Customize_Control
    {
          /**
           * Render the content on the theme customizer page
           */
          public function render_content()
           {
                ?>
                    <label>
                      <span class="customize-post-dropdown"><?php echo esc_html( $this->label ); ?></span>
                      <select name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>">
                      <?php
                          $args = wp_parse_args($this->args, array('numberposts' => '-1'));
                          $posts = get_posts($args);
                          foreach ( $posts as $post ) {
                            echo '<option value="'.$post->ID.'" '.selected($this->value, $post->ID).'>'.$post->post_title.'</option>';
                          }
                        ?>
                      </select>
                    </label>
                <?php
           }
    }
}



function plant_customizer_register( $wp_customize ) {
	
	/* Panels */
	$wp_customize->add_panel( 'panel_content', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Site Content', 'plant' ),
		'description' => 'This panel controls what the main page will display as the featured story, submission link images and fixed media across the site.', 'plant'
	) );
	
	
	// Panel 1: Featured Story => Big Story Options
	$wp_customize->add_section( 'section_bs', array(
	    'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Featured Story', 'plant' ),
	    'description' => 'This panel controls what the main page will display as the featured story.',
		'panel' => 'panel_content'
	) );
	
		// Featured Story Desktop Image
		$wp_customize->add_setting( 'bigstory_bg_desktop' );
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'bs_bg_d', array(
					'label'    => __( 'Desktop Background', 'plant' ),
					'section'  => 'section_bs',
					'settings' => 'bigstory_bg_desktop',
					'description' => 'Must be 2560x1600px, .jpg<br />Note that the  cover images should fade to the background color specified. <br /> See reference guide for details.'
				)
			) 
		);
	
		// Featured Story Mobile Image
		$wp_customize->add_setting( 'bigstory_bg_mobile' );
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'bs_bg_m', array(
					'label'    => __( 'Mobile Background', 'plant' ),
					'section'  => 'section_bs',
					'settings' => 'bigstory_bg_mobile',
					'description' => 'Must be 400x600px, .jpg'
				)
			) 
		);
		
		// Select page to link to 
		$wp_customize->add_setting('bigstory_link', array('default' => ''));
		$wp_customize->add_control(
				'bs_link',
				array(
					'label'     => __('Featured Page Link', 'plant'),
					'section'   => 'section_bs',
					'settings'  => 'bigstory_link',
					'priority'  => 0,
					'description'=> 'This post must be created with the "featured-story" class in the post creation page. This will hide it from the main feed. Remeber to remove this from the former post when changing this setting.',
				)
		);
	
		// Featured Story Desktop Title
		$wp_customize->add_setting( 'bigstory_tit_desktop' );
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'bs_tit_d', array(
					'label'    => __( 'Desktop Title', 'plant' ),
					'section'  => 'section_bs',
					'settings' => 'bigstory_tit_desktop',
				)
			) 
		);
	
		// Featured Story Mobile Title
		$wp_customize->add_setting( 'bigstory_tit_mobile' );
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( 
				$wp_customize, 
				'bs_tit_m', array(
					'label'    => __( 'Mobile Title', 'plant' ),
					'section'  => 'section_bs',
					'settings' => 'bigstory_tit_mobile',
				)
			) 
		);
		
		// Add Background Hex
		$wp_customize->add_setting('bigstory_hex', array('default' => '#f9f7f6'));
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bs_hex', array(
					'label'       => __('Background Hex', 'plant'),
					'section' 	  => 'section_bs',
					'settings'    => 'bigstory_hex',
					'description' => 'If left blank, the cover image will fade to the default background color.<br /> This might look weird if the cover image isn\'t mostly white.'
				)
			)
		);
	
	
	// Added to existing Title tag
	$wp_customize->add_setting( 'plant_header_logo' );
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'header_logo', array(
				'label'    => __( 'Header Logo', 'plant' ),
				'section'  => 'title_tagline',
				'settings' => 'plant_header_logo',
			)
		) 
	);

}
add_action( 'customize_register', 'plant_customizer_register' );

// Default options transport to js
function plant_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );
}
add_action( 'customize_register', 'plant_customize_register' );

// Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
function plant_customize_preview_js() {
	wp_enqueue_script( 'plant_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'plant_customize_preview_js' );
