<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justine
 */

?>
	<!-- =============== JUMP TO TOP ====================
	==================================================== -->
	<a href="#" class="jump-top" title="Jump to top"><i class="fa fa-chevron-up"></i></a>

	<!-- ================== FOOTER ======================
	==================================================== -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-left">
					<p>
						<?php
						echo get_theme_mod( 'footer_text', 'Copyright &copy; 2016 justine');
						?>
					</p>
				</div><!-- col -->	
				<div class="col-sm-6 text-right social-icons">
					<?php
						justine_social_media();
					?>
				</div><!-- col -->	
			</div><!-- row -->
		</div><!-- container -->
	</footer><!-- footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
