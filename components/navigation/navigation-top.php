<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'gryd' ); ?></button>
	<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'top-menu', 'container_id' => 'top-menu-wrap' ) ); ?>
</nav><!-- #site-navigation -->
