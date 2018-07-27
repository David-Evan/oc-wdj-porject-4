<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */
 $isCategoryPlusinfos = (the_category_ID(false) == get_category_by_slug('plus-infos')->term_id) ? true : false;

 function goBackButton($isCategoryPlusinfos){

	  $templateURL = ($isCategoryPlusinfos) ? site_url('index.php/en-savoir-plus/') : site_url('/index.php/actualites/');
		$templateWord = ($isCategoryPlusinfos) ? "activités" : "actualités";

	 $button = '
	 <div class="go-back-button">
	 	<a href="'.$templateURL.'" class="btn btn-theme-primary btn-md">
		  <i class="fa fa-angle-double-left">&nbsp;</i> Revenir aux '.$templateWord.'
	 	</a>
	 </div>';
	 return $button;
 }

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-blog col-lg-11'); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php onepress_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="page-title custom-page-title">', '</h1>' ); ?>

		<?php echo goBackButton($isCategoryPlusinfos); ?>
				<div class="article-meta single-article">
					<span class="fa fa-tags"></span> <?php if($isCategoryPlusinfos) the_tags('', ' / '); else the_category(' / '); ?>
				</div>

				<hr>
	</header><!-- .entry-header -->

    <?php if ( get_theme_mod( 'single_thumbnail', 0 ) && has_post_thumbnail() ) { ?>
        <div class="entry-thumbnail">
            <?php
            $layout = onepress_get_layout();
            $size = 'large';
            the_post_thumbnail( $size );
            ?>
        </div><!-- .entry-footer -->
    <?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    <?php if ( get_theme_mod( 'single_meta', 1 ) ) { ?>
	<footer class="entry-footer">
		<?php echo goBackButton($isCategoryPlusinfos); ?>
	</footer><!-- .entry-footer -->
    <?php } ?>
</article><!-- #post-## -->
