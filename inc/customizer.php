<?php

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
