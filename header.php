<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cmwuschild
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<!-- - - - - - - - - - Custom Code - - - - - - - - - - - - -->
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
	<link href="/wp-content/themes/cmw_us_child/drawer/sandbox.css" rel="stylesheet">
	<link href="/wp-content/themes/cmw_us_child/drawer/drawer.min.css" rel="stylesheet">
	
	

	<!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
		<script>
		window.addEventListener("load", function(){
		window.cookieconsent.initialise({
		  "palette": {
		    "popup": {
		      "background": "#252525",
		      "text": "#ffffff"
		    },
		    "button": {
		      "background": "#fff200",
		      "text": "#252525"
		    }
		  },
		  "position": "bottom-right",
		  "content": {
		    "message": "Hey boss! This website uses cookies to help us track things like analytics and user preferences.",
		    "href": "https://beingboss.club/privacy"
		  }
		})});
		</script> -->

	<script src='https://www.google.com/recaptcha/api.js'></script>


	<!-- - - - - - - - - - End Custom Code  - - - - - - - - -  -->
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->

	<?php if ( is_admin_bar_showing() ) : ?>
		<div class="wrapper-fluid wrapper-navbar fixed-top" id="wrapper-navbar" style="top: 32px;">
	<?php else : ?>
		<div class="wrapper-fluid wrapper-navbar fixed-top" id="wrapper-navbar" style="top: 0;">
	<?php endif; ?>

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-light bg-light">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button type="button" class="drawer-toggle drawer-hamburger">
                			<span class="sr-only">toggle navigation</span>
                			<span class="drawer-hamburger-icon"></span>
				</button>
				<nav class="drawer-nav" role="navigation">
					<?php wp_nav_menu(
						array(
							'menu'  => '2018 Mobile Menu',
							'menu_class'      => 'navbar-nav-mobile',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu-mobile',
						)
					); ?>

					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" id="mobile-search">
							<input name="s" type="search" placeholder="Search">
					</form>
				</nav>
				<!-- The WordPress Menu goes here -->
				<div class="menuright">
					<div class="topmenu">
						<a href="/about">ABOUT</a>
						<a href="/press">PRESS</a>
						<?php if ( !is_user_logged_in() ) { ?>
							<a href="/login">LOGIN</a>
						<?php } else { ?>
							<a href="<?php echo wp_logout_url(); ?>">LOG OUT</a>
						<?php } ?>
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>" id="top-search">
							<input name="s" type="search" placeholder="Search">
						</form>
					</div>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->