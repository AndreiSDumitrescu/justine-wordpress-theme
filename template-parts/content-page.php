<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justine
 */

?>
<article id="post-<?php the_ID(); ?>" class="post page">
	<div class="row">

		<div class="col-sm-12">
			<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>

			<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'justine' ),
					'after'  => '</div>',
				) );
			?>
			</div><!-- .entry-content -->

		</div><!--col-->
	</div><!--row-->
</article><!--post-->


