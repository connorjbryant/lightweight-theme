<?php
/**
 * Main template file for Lightweight Theme
 *
 * @package LightweightTheme
 */

global $wp_query;
get_header();
?>
<section class="content-area" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?> tabindex="0">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumb">
						<a href="<?php the_permalink(); ?>" tabindex="-1">
							<?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
						</a>
					</div>
				<?php endif; ?>
				<header class="entry-header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
		<nav class="pagination" aria-label="Posts">
			<?php
				the_posts_pagination([
					'prev_text' => __('&laquo; Previous'),
					'next_text' => __('Next &raquo;'),
				]);
			?>
		</nav>
	<?php else : ?>
		<article class="no-posts">
			<h2><?php _e('Nothing Found', 'lightweight-theme'); ?></h2>
			<p><?php _e('Sorry, no posts matched your criteria.', 'lightweight-theme'); ?></p>
		</article>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
