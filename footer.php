</div>
            <?php get_sidebar(); ?>

        </div>

<div class="row footer">
            <p>Resize the browser window to see how the content respond to the resizing.</p>
            <?php 
            $has_footer_menu = has_nav_menu( 'footer-menu' );
            
            if($has_footer_menu){
            wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );}
            
            ?>
        </div>
        </div>
        <?php wp_footer(); //de zwarte balk waarmee je naar de dashboard kan gaan?>
</body>

</html>