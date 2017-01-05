<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justine
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php 
wp_enqueue_script("jquery");
wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'justine' ); ?></a>


	<!-- ================ LOGO ========================
	==================================================== -->
	<div id="site-logo">
		<div class="container">
			
				<?php if ( get_theme_mod( 'justine_logo' ) ) { ?>
					<a class="linkwrapper" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( get_theme_mod( 'justine_logo' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				<?php } else { ?>
					<a class="linkwrapper" href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1><?php bloginfo( 'title' ); ?></h1></a>
				<?php
					}
				?>
			
			<p class="tagline">
				<i><?php bloginfo('description'); ?> </i>
			</p><!--tagline-->

		</div><!--container-->			
	</div><!--site-logo-->


	<!-- ================ HEADER ========================
	==================================================== -->
	<header class="site-header">
		
		<!-- ================ NAVBAR ========================
		==================================================== -->
		<div class="navbar-wrapper">

			<div class="navbar" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button><!-- navbar-toggle -->							
					</div><!--navbar-header-->

					<!-- If the menu (WP admin area) is not set, then the "menu_class" is applied to "container". It overwrites the "container_class".-->
					<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu( array(
								'theme_location'  => 'primary',
								'container'       => 'nav',
								'container_class' => 'navbar-collapse collapse',
								'menu_class'      => 'nav navbar-nav'
							));
						} 
					?>

				</div><!--container-->
			</div><!--navbar-->

		</div><!--navbar-wrapper-->

	</header><!--site-header-->
