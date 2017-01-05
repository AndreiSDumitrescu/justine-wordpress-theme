<?php
/**
 * justine functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package justine
 */

if ( ! function_exists( 'justine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function justine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on justine, use a find and replace
	 * to change 'justine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'justine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'justine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'justine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function justine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'justine_content_width', 640 );
}
add_action( 'after_setup_theme', 'justine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function justine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'justine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'justine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function justine_scripts() {
	
	// Google Fonts
	wp_enqueue_style( 'roboto-slab', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700', false );
	wp_enqueue_style( 'lato', 'http://fonts.googleapis.com/css?family=Lato:400,700', false );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	// Style.css
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	// Main js
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js' );

	// Boostrap js
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js' );

	// Slick Slider
	wp_enqueue_script('slick', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js');

	if(is_singular()) {
		// Add share buttons
		wp_enqueue_script( 'addshare', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5128048545fc6ba5' );	
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'justine_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Replaces the excerpt "more" text by a link
*/
function justine_excerpt_more($more) {
	global $post;
	return '...';
}
add_filter('excerpt_more','justine_excerpt_more');

/**
 * Replaces the default comments structure
*/
function wordpressapi_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="row">
			<div class="col-sm-6 text-left">
				<?php echo get_avatar( $comment, 32 ); ?>
				<h4><?php echo get_comment_author(); ?></h4>
			</div><!-- col -->
			<div class="col-sm-6 text-right">
				<small><?php printf(__('%1$s at %2$s', 'justine'), get_comment_date(),get_comment_time()); ?></small>
			</div><!-- col -->
		</div><!-- row -->
		
		<div class="comment-body">

			<div class="comment-text">
				<?php comment_text(); ?>
			</div><!--comment-text-->

			<div class="comment-reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div><!--comment-reply-->	

		</div><!--comment-body-->
	</li><!--comment-->

	<?php
}

/**
 * Placeholder text for input fields
 */
add_filter( 'comment_form_default_fields', 'comment_placeholders' );
function comment_placeholders( $fields ) {
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="' . _x( 'Your name', 'comment form placeholder', 'justine' ) . '"',
        $fields['author']
    );
    
    $fields['email'] = str_replace(
        'name="email"',
        'placeholder="email@example.com" name="email"',
        $fields['email']
    );
    
    return $fields;
}
/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */
Class justine_recent_posts extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts',  'justine') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
			$number = 10;
		}
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) {
			
			echo $args['before_widget'];
			if( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}?>
			<div class="recent-posts">
				<ul>
					<?php while( $r->have_posts() ) : $r->the_post(); ?>
	
					<li>
						<?php
						if (has_post_thumbnail()) { 
							?>
							<div class="featured-image">
								<a class="linkwrapper" href="<?php the_permalink(); ?>">
									<?php 									
									echo get_the_post_thumbnail( $post_id, 'thumbnail' ); 
									?>
								</a>
							</div><!--featured-image-->
						<?php 
						} 
						?>	
						<div class="entry-content">
							<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
							<span class="entry-meta"><small><?php the_time( get_option( 'date_format' ) ); ?></small></span>
						</div>

					</li>								
					<?php endwhile; ?>
				</ul>
			</div>
			<?php
			echo $args['after_widget'];
		
		wp_reset_postdata();
		}
	}
}
function justine_recent_posts_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('justine_recent_posts');
}
add_action('widgets_init', 'justine_recent_posts_registration');

/**
 * Extend Recent Comments Widget 
 *
 * Adds different formatting to the default WordPress Recent Comments Widget
 */
Class justine_recent_comments extends WP_Widget_Recent_Comments {

	function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments', 'justine' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ){
			$number = 5;
		}

		/**
		 * Filter the arguments for the Recent Comments widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Comment_Query::query() for information on accepted arguments.
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 */
		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= $args['before_title'] . $title . $args['after_title'];
		}

		$output .= '<ul id="recentcomments">';
		if ( is_array( $comments ) && $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment ) {
				$output .= '<li class="recentcomments">';
				/* translators: comments widget: 1: comment author, 2: post link */
				$output .= sprintf( _x( '%1$s on %2$s', 'widgets', 'justine' ),
					'<span class="comment-author-link"><i class="fa fa-comment-o"></i> ' . get_comment_author_link( $comment ) . '</span>',
					'<h5><a href="' . esc_url( get_comment_link( $comment ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a></h5>'
				);
				$output .= '</li>';
			}
		}
		$output .= '</ul>';
		$output .= $args['after_widget'];

		echo $output;
	}
}
function justine_recent_comments_registration() {
  unregister_widget('WP_Widget_Recent_Comments');
  register_widget('justine_recent_comments');
}
add_action('widgets_init', 'justine_recent_comments_registration');

/**
 * Extend Gallery 
 */
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order){
    	$orderby = 'none';
    }

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) {
    	return '';
    }

    $output = '<div class="slider">';
			    
    // Loop through each attachment
    foreach ($attachments as $id => $attachment) {

        $img = wp_get_attachment_image_src($id, 'full');
        // $height = $img[2];
	    // $width = $img[1];
	    $alt = $img[3];

        $output .= '<div><img src="'.esc_url($img[0]).'" alt="'.esc_attr($alt).'"/></div>';
        

    }

    $output .= '</div>';
    return $output;
}

/**
 * Social Media
 */
function justine_social_media() {

	if ( get_theme_mod('justine_facebook_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_facebook_link' ) ?>"><i class="fa fa-facebook fa-lg"></i></a>
	<?php } ?>

	<?php if ( get_theme_mod('justine_gplus_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_gplus_link' ) ?>"><i class="fa fa-google-plus fa-lg"></i></a>
	<?php } ?>

	<?php if ( get_theme_mod('justine_instagram_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_instagram_link' ) ?>"><i class="fa fa-instagram fa-lg"></i></a>
	<?php } ?>

	<?php if ( get_theme_mod('justine_linkedin_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_linkedin_link' ) ?>"><i class="fa fa-linkedin fa-lg"></i></a>
	<?php } ?>

	<?php if ( get_theme_mod('justine_pinterest_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_pinterest_link' ) ?>"><i class="fa fa-pinterest fa-lg"></i></a>
	<?php } ?>

	<?php if ( get_theme_mod('justine_twitter_link') != "" ) { ?>
	<a href="<?php echo get_theme_mod( 'justine_twitter_link' ) ?>"><i class="fa fa-twitter fa-lg"></i></a>
	<?php }  

}

/**
 * Sanitize social links
 */
function justine_sanitize_social_link( $social_link ) {
	return sanitize_text_field( $social_link );
}

function justine_pagination() {
	$prev_link = get_previous_posts_link('<i class="fa fa-angle-left"></i> Previous');
	$next_link = get_next_posts_link('Next <i class="fa fa-angle-right"></i>');

	if ($prev_link || $next_link) {
		echo '<div class="pagination"><div class="row">';
		echo '<div class="col-xs-6 text-left">';
		if ($prev_link){
			echo $prev_link;
		} 
		echo '</div>';
		echo '<div class="col-xs-6 text-right">';
		if ($next_link){
			echo $next_link;
		}

	    echo '</div></div></div>';
	}
}
