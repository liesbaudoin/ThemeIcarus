<?php
/*
 * setup functions, theme configuratie
 */

function register_my_menus()
{
    //als thema geef je hier aan: welke plekken heb ik voor een menu, de gebruiker maakt een menu aan en in de header wordt die aangeroepen
    register_nav_menus( //wordpress function en wij geven zelf deze array mee
        array(
            'header-menu' => __('Header Menu'), //key is techniche naam waarde is het label op het dashboard
            'extra-menu' => __('Extra Menu'),
            'footer-menu' => __('Footer Menu')

        )
    );
}

add_action('init', 'register_my_menus'); //Wordpress laadt functions.php in hij roept add_action aan, daardoor wordt register_my_menus ook aangeroepen

/*
 * theme support vertelt tegen de customizer welke velden je nodig hebt, in dit geval een logo Google: theme support
 */

function theme_icarus_theme_support()
{
    //custom logo (dit staat hier omdat er nog een heel aantal velden aan toegevoegd zullen worden)
    add_theme_support(
        'custom-logo', //Wordpress weet dat we een plaatje willen(hard coded)
        array(
            'height'      => 90,
            'width'       => 120,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
    // Custom background color.
    add_theme_support(
        'custom-background', //je body moet deze classname hebben. Door deze functie krijg je een stukje inline css erbij.en uit je stylesheet moet je deze regel verwijderen anders overschrijft hij die
        array(
            'default-color' => '#556b2f',
        )
    );
}

add_action('after_setup_theme', 'theme_icarus_theme_support'); //als wordpress de customizer gaat maken, roept die deze functie aan.

require get_template_directory() . '/inc/template-tags.php';

/*
 * voegt sections, settings en controls toe aan je customizer
 */
function theme_icarus_customize_register(WP_Customize_Manager $wp_customize) // zet het tye erbij voor meer overzicht
{
    /*
     * add_section je geeft mee: een zelfgekozen id en een array met een title
     */
    $wp_customize->add_section('header_footer_color', [
        'title' => 'Header Footer kleur'
    ]);

    /*
   *add_setting je geeft mee een zelfgekozen id, deze wordt aangeroepen in get_theme_mod
   */
    $wp_customize->add_setting(
        'header_footer_background_color',
        array(
            'default'           => '#87fa96',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( //deze altijd instatieren als je een kleur wil aanpassen(je hebt bv ook checkbox of radiobutton etc)
            $wp_customize,
            'header_footer_background_color',//naam van de setting waar de control in moet komen
            array(
                'label'   => __('Header &amp; Footer Background Color', 'twentytwenty'),
                'section' => 'header_footer_color', 
            )
        )
    );
}
add_action('customize_register', 'theme_icarus_customize_register'); //als de customizer wordt geladen, wordt deze aangeroepen


/*
* genereer extra css waar die wordt aangeroepen, gaat die het echoen
 */
function my_custom_css_output()
{
    $color = get_theme_mod('header_footer_background_color', '#87fa96');

    echo <<<EOD
<style type="text/css">
.header, .footer {
    background-color: $color;
}
</style>
EOD;
}

add_action('wp_head', 'my_custom_css_output'); //roep aan als wp_head() wordt aangeroepen
