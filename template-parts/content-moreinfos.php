<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article-moreinfos', 'clearfix', 'col-lg-6', 'col-xl-4') ); ?>>
	<div class="article-inside-container col-md-12 article" onclick="location.href = '<?php echo esc_url(get_permalink()); ?>'">
		<div class="list-article-thumb">
			<a href="<?php echo esc_url(get_permalink()); ?>">
				<?php
				if ( has_post_thumbnail( ) ) {
					the_post_thumbnail( 'onepress-blog-small' );
				} else {
					echo '<img alt="" src="'. get_template_directory_uri() . '/assets/images/placholder2.png' .'">';
				}
				?>
			</a>
		</div>
		<div class="list-article-content">
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
			<div class="article-meta list-article">
				<span class="fa fa-tags"></span> <?php the_tags('', ' / '); // <?php the_category(' / '); ?>
			</div>
		</div>
		<div class="list-article-datetime">
			<span class="fa fa-calendar"></span> &nbsp;&nbsp;<?php the_time('j/m/y'); ?>
		</div>
	</div>
	<hr />
</article><!-- #post-## -->
