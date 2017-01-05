<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justine
 */

get_header(); ?>

<div class="container">
	<div class="row" id="primary">
		<section id="archive-heading" class="col-sm-12">
			<?php the_archive_title( '<h3 class="archive-title">', '</h3>' );?>
		</section>
		<main id="content" class="col-sm-8">

			<?php
			if ( have_posts() ) :

				

				if ( is_home() && ! is_front_page() ) : ?>

				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

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
