
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HtmlTheme</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <!--dit is wp-head-->
    <?php wp_head(); ?>
    <!--na wp-head-->
</head>

<body>
<?php
		wp_body_open();
		?>
    <div class="main">

<div class="row header">

                <div class="col-4 logo">
                    <img src="images/IcarusHeaderLogoKlein.png">
                </div>
                <div class="col-4 menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) );//header menu moet hetzelfde zijn als 1 van de keys van je array in de function register_my_menus ?>
                </div>
                <div class="col-4 social">
                    <link id="socialmedia-container">
                    <a href="https://www.facebook.com"> <img src="images/facebook.png"></a>
                    <img src="images/twitter.png">
                </div>

        </div>
        <div class="row">
            <div class="col-10">