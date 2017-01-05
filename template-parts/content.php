<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package justine
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<div class="row">		
		<div class="col-sm-12">
			<div class="post-details">
			    
				<?php
				the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				<div class="meta">
					<span>
						<i class="fa fa-user"></i><?php the_author(); ?>
					</span>
					<span class="separator">
						&bull;
					</span>
					<span>
						<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><i class="fa fa-calendar-check-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a>
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
					
						<a class="linkwrapper" href="<?php the_permalink(); ?>">
							<figure class="post-image">
							<img class="lazyload" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() );?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);?>">
								<figcaption>
								</figcaption>
							</figure><!-- post-image -->
						</a>
						
				<?php 
				} elseif (strpos($post->post_content,'[gallery') !== false) {
					echo get_post_gallery();
				} 
				?>
				<div class="post-excerpt">
					<?php the_excerpt();?>
				</div><!-- post-excerpt -->
				<div class="text-right">
					<a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-default" role="button">Read more</a>
				</div><!-- text-right -->			
				
			</div><!-- post-details -->
		</div><!-- col -->
	</div><!-- row -->					
</article><!-- post -->	

