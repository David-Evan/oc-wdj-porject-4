<?php
/*
Template Name: Page plus infos
*/
?>
<?php

get_header();
$layout = onepress_get_layout();
?>

	<div id="content" class="site-content">

		<div class="page-header">
		</div>

		<?php onepress_breadcrumb(); ?>

		<div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">
			<div id="primary" class="content-area">
				<main id="main" class="site-main row" role="main">
					<h1 class="custom-page-title">Les activités à Strasbourg</h1>
					<p class="custom-page-subtitle">Des sorties pour tous les goûts : historique, ludiques ou sportive ... Une agréable rencontre change toute la vision que vous aurez de la ville de Strasbourg.</p>
					<?php
					$query_params = array(
										'post_type' => 'post',
										'cat' => get_category_by_slug('plus-infos')->term_id
									);

					$query_params['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$my_posts = new WP_Query($query_params);

					$temp_query = $wp_query;
					$wp_query   = NULL;
					$wp_query   = $my_posts;
					?>

					<?php
						if($my_posts->have_posts()) :
					?>
						<?php while($my_posts->have_posts()) : $my_posts->the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'moreinfos' );?>
					<?php endwhile; ?>
					<?php else: ?>
						<p>Aucun article a été trouvé.</p>
					<?php endif; ?>
				</main><!-- #main -->
				<?php wp_pagenavi(); ?>
				<?php
				$wp_query = NULL;
				$wp_query = $temp_query;
				?>
			</div><!-- #primary -->

            <?php if ( $layout != 'no-sidebar' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
