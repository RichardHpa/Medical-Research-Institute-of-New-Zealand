<?php


function themename_customize_register($wp_customize) {
  $wp_customize->remove_section( 'static_front_page' );
}

add_action('customize_register', 'themename_customize_register');

function customTheme_customize_headerImage($wp_customize){

    $wp_customize->add_section('customtheme_image_section', array(
		'title' => __('Main Background Image', 'mrinz'),
		'priority' => 30
	));

    $numberOfSlides = 3;
    for ($i=1; $i <= $numberOfSlides; $i++) {

        $wp_customize->add_setting('customTheme_Image_Slide'.$i, array(
            'default' => get_parent_theme_file_uri( '/assets/images/coffee.jpg'),
            'sanitize_callback' => 'absint',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'customTheme_Slide'.$i.'_control', array(
            'label' => __('Slide '.$i, 'MedicalResearchInstituteOfNewZealand'),
            'section' => 'customtheme_image_section',
            'settings' => 'customTheme_Image_Slide'.$i,
            'width' => 2000,
            'height' => 1200,
            'flex-height' => true,
        )));
    }

    $wp_customize->add_setting('customTheme_Image_Slide_Time', array(
        'default' => 3000,
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'your_setting_id', array(
        'label' => __('Slide Timing (milliseconds)', 'MedicalResearchInstituteOfNewZealand'),
        'section' => 'customtheme_image_section',
        'settings' => 'customTheme_Image_Slide_Time',
        'type' => 'number'
    )));

}
add_action('customize_register', 'customTheme_customize_headerImage');

function customTheme_customize_colour($wp_customize){
    $wp_customize->add_section('custom_front_page_section', array(
		'title' => __('Front Page Settings', 'mrinz'),
		'priority' => 20
	));

    $wp_customize->add_setting('first_block_colour', array(
		'default' => '#bcbad2',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'first_block_colour_control', array(
		'label' => __('First Block Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'first_block_colour',
	)));

    $wp_customize->add_setting('first_block_text_colour', array(
		'default' => '#000000',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'first_block_text_colour_control', array(
		'label' => __('First Block Text Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'first_block_text_colour',
	)));

    $wp_customize->add_setting( 'first_section_image_position', array(
      'default' => 'center center',
      'transport' => 'refresh'
    ) );

    $wp_customize->add_control( 'first_section_image_position_control', array(
      'type' => 'select',
      'section' => 'custom_front_page_section', // Add a default or your own section,
      'settings' => 'first_section_image_position',
      'label' => __( 'Image Position' ),
      'description' => __( 'This is the anchor point for the first block image.' ),
      'choices' => array(
        'center center' => __( 'Center' ),
        'center top' => __( 'Center Top' ),
        'center bottom' => __( 'Center Bottom' ),
        'left top' => __( 'Left Top' ),
        'left center' => __( 'Left Center' ),
        'left bottom' => __( 'Lett Bottom' ),
        'right top' => __( 'Right Top' ),
        'right center' => __( 'Right Center' ),
        'right bottom' => __( 'Right Bottom' ),
      ),
    ) );

    $wp_customize->add_setting('second_block_colour', array(
		'default' => '#cdcdcd',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'second_block_colour_control', array(
		'label' => __('Second Block Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'second_block_colour',
	)));

    $wp_customize->add_setting('second_block_text_colour', array(
		'default' => '#000000',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'second_block_text_colour_control', array(
		'label' => __('Second Block Text Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'second_block_text_colour',
	)));

    $wp_customize->add_setting('recruiting_block_colour', array(
		'default' => '#ffffff',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'recruiting_block_colour_control', array(
		'label' => __('Recruiting Section Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'recruiting_block_colour',
	)));

    $wp_customize->add_setting('recruiting_block_text_colour', array(
		'default' => '#000000',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'recruiting_block_text_colour_control', array(
		'label' => __('Recruiting Section Text Colour', 'mrinz'),
		'section' => 'custom_front_page_section',
		'settings' => 'recruiting_block_text_colour',
	)));

}
add_action('customize_register', 'customTheme_customize_colour');

function newtheme_customize_css(){
    ?>
        <style type="text/css">
            .section-1{
                background-color: <?php echo get_theme_mod('first_block_colour', '#bcbad2'); ?>;
                color: <?php echo get_theme_mod('first_block_text_colour', '#000000'); ?>;
            }

            .section-1 .image-block{
                    background-position: <?php echo get_theme_mod('first_section_image_position', 'center'); ?>;
                }

            .section-2{
                background-color: <?php echo get_theme_mod('second_block_colour', '#cdcdcd'); ?>;
                color: <?php echo get_theme_mod('second_block_text_colour', '#000000'); ?>;
            }

            .third-block,
            #ticker{
                background-color: <?php echo get_theme_mod('recruiting_block_colour', '#ffffff'); ?>;
                color: <?php echo get_theme_mod('recruiting_block_text_colour', '#000000'); ?>;
            }
        </style>
    <?php
}
add_action('wp_head', 'newtheme_customize_css');
