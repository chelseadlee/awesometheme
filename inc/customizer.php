<?php
/**
 * AwesomeTheme Theme Customizer
 *
 * @package LL_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function awesometheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
     *  Custom Customizer Customizations
     */

	// Setting for header and footer background color
    $wp_customize->add_setting( 'theme_bg_color', array(
        'default' => '#002254',
        'transport' => 'postMessage',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    //Control for header and footer background color.
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_bg_color', array(
                'label' => __( 'Header and footer background color', 'awesometheme'),
                'section' => 'colors',
                'settings' => 'theme_bg_color'
            )
        )
    );
}
add_action( 'customize_register', 'awesometheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function awesometheme_customize_preview_js() {
	wp_enqueue_script( 'awesometheme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'awesometheme_customize_preview_js' );




if ( ! function_exists( 'awesometheme_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see awesometheme_custom_header_setup().
     */
    function awesometheme_header_style() {
        $header_text_color = get_header_textcolor();
        $header_bg_color = get_theme_mod( 'theme_bg_color' );
        $interactive_color = get_theme_mod('interactive_color');
        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( HEADER_TEXTCOLOR != $header_text_color ) {

            // If we get this far, we have custom styles. Let's do this.
            ?>
            <style type="text/css">
                <?php
                    // Has the text been hidden?
                    if ( ! display_header_text() ) :
                ?>
                    .site-title,
                    .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }

                <?php
                    // If the user has set a custom color for the text use that.
                    else :
                ?>
                    .site-title a,
                    .site-description {
                        color: #<?php echo esc_attr( $header_text_color ); ?>;
                    }

                <?php endif; ?>
            </style>
            <?php
        }

        if ( '#002254' != $header_bg_color ) { ?>
            <style type="text/css">
                .site-header,
                .site-footer {
                    background-color: <?php echo esc_attr( $header_bg_color ); ?>;
                }
            </style>
        <?php
        }
    }
    endif;
