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

function theme_icarus_theme_support() {
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
		'custom-background',//je body moet deze classname hebben. Door deze functie krijg je een stukje inline css erbij.en uit je stylesheet moet je deze regel verwijderen anders overschrijft hij die
		array(
			'default-color' => '#556b2f',
		)
	);
}

add_action('after_setup_theme', 'theme_icarus_theme_support'); //als wordpress de customizer gaat maken, roept die deze functie aan.

require get_template_directory() . '/inc/template-tags.php';

