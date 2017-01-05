<?php
/**
 * Template part for displaying a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justine
 */

?>
<article class="post post-featured">
	<div class="row">
		<div class="col-sm-12">
			<div class="post-details">

				<h2 class="post-title">
					<?php the_title();	?>
				</h2><!-- post-title -->
				<div class="meta">
					<span>
						<i class="fa fa-user"></i><?php the_author(); ?>
					</span>
					<span class="separator">
						&bull;
					</span>
					<span>
						<i class="fa fa-calendar-check-o"></i><?php the_date(); ?>
					</span>
					<span class="separator">
						&bull;
					</span>
					<span class="category">
					<?php the_category('<span class="separator">&bull;</span>');?>
					</span>
					<span class="separator">
						&bull;
					</span>
					<span>
						<a href="<?php comments_link();?>"><i class="fa fa-comment"></i><?php comments_number('Share your thoughts',1,'%');?></a>
					</span>
				</div><!-- meta -->

				<?php 
				if (has_post_thumbnail()) {
					?>
					<div class="post-image">
						<?php
						the_post_thumbnail();
						?>
					</div><!-- post-image -->
				<?php
				}
				?>
				<div class="post-excerpt">
					<?php the_content();?>
				</div><!-- post-excerpt -->
				<?php wp_link_pages( array(
					'before'      => '<div class="pagination"><div class="nav-links">',
					'after'       => '</div></div>',
					) );
				?>

				<div class="post-tags">
					<div class="row">
						<div class="col-sm-6 text-left">
							<?php 
								the_tags('<span class="tag-links">','','</span>');
							?>
						</div><!-- col -->
						<div class="col-sm-6 text-right">
							<div class="addthis_sharing_toolbox"></div>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- post-tags -->
			</div><!-- post-details -->
		</div><!-- col -->
	</div><!-- row -->										
</article><!-- post -->