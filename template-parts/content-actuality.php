<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix') ); ?>>
	<div class="list-article-actualities row" onclick="location.href = '<?php echo esc_url(get_permalink()); ?>'">
		<div class="list-article-thumb col-sm-3">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php
				if ( has_post_thumbnail( ) ) {
					the_post_thumbnail( 'onepress-blog-small' );
				} else {
					echo '<img alt="" src="'. get_template_directory_uri() . '/assets/images/placholder2.png' .'">';
				}
				?>
			</a>
		</div>
		<div class="list-article-content col-sm-6">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-excerpt">
				<?php
					the_excerpt();
				?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
						'after'  => '</div>',
					) );
				?>
			</div>
			<div class="list-article-meta">
				<span class="fa fa-tags"></span> <?php the_category(' / '); ?>
			</div>
		</div>
		<div class="list-article-datetime col-sm-3">
			<span class="fa fa-calendar"></span> &nbsp;&nbsp;<?php the_time('j/m/y'); ?>
			<span class="calendar-separator"><hr></span>
		</div>
	</div>
	<hr />
</article><!-- #post-## -->
