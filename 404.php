<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package justine
 */

get_header(); ?>

<div class="container">
	<div class="row" id="primary">
		<main id="content" class="col-sm-8">

			<section class="error-404 not-found">

				<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'justine' ); ?></h2>

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try using the search box below?', 'justine' ); ?></p>
					<?php
						get_search_form();
					?>
					<br/>
					<p><?php esc_html_e( 'Or, just head back to the ', 'justine' ); ?><a href="<?php echo esc_url(home_url('/')); ?>">home page.</a></p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!--content-->
		<aside id="sidebar" class="col-sm-4">
			<?php get_sidebar();?>
		</aside><!--sidebar-->
	</div><!--row-->
</div><!--container-->

<?php
get_footer();
