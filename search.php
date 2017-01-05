<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package justine
 */

get_header(); ?>

<div class="container">
	<div class="row" id="primary">
		<section id="archive-heading" class="col-sm-12">
			<h3 class="archive-title">
				<?php printf( esc_html__( 'Search Results for: %s', 'justine' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h3>
		</section>
		<main id="content" class="col-sm-8">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
