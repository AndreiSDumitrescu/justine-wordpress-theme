<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justine
 */

get_header(); ?>

<!-- =============== BLOG CONTENT ===================
==================================================== -->
<div class="container">
	<div class="row" id="primary">
		<main id="content" class="col-sm-8">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

				<?php
				endif;
				
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() ); 

				endwhile;

				justine_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</main><!--content-->
		<aside id="sidebar" class="col-sm-4">
			<?php get_sidebar();?>
		</aside><!--sidebar-->
	</div><!--row-->
	
</div><!--container-->

<?php
get_footer();
