<?php

function register_my_menus()
{
    //als thema geef je hier aan: welke plekken heb ik voor een menu, de gebruiker maakt een menu aan en in de header wordt die aangeroepen
    register_nav_menus( //wordpress function en wij geven zelf deze array mee
        array(
            'header-menu' => __('Header Menu'), //key is techniche naam waarde is het label op het dashboard
            'extra-menu' => __('Extra Menu'),
        
        )
    );
}

add_action('init', 'register_my_menus'); //Wordpress laadt functions.php in hij roept add_action aan, daardoor wordt register_my_menus ook aangeroepen
