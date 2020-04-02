<?php
/*
 *hier zet je de functions neer die je wil gebruiken in je template
 */


 /*
  * function theme_icarus_site_logo roep je aan in de header, waar je het logo wil
  */
function theme_icarus_site_logo( $args = array(), $echo = true ) //de args zijn kennelijk een conventie
{
    if ( has_custom_logo() ) {
        $html = get_custom_logo();
    } else {
        $html = 'GEEN LOGO';
    }

    if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/*
voorbeeld:
in principe laat je een function als returnvalue een string geven geven en geen echo

function a($echo = true) {
    if ($echo) {
        echo 'a';
    }

    return 'a';
}

function b() {
    echo 'b';
}

a(true);
echo a(false);
b();
*/
