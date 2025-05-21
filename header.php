<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
	<div class="container">
		<?php if ( has_custom_logo() ) : ?>
			<div class="site-logo"><?php the_custom_logo(); ?></div>
		<?php endif; ?>
		<div class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav class="site-nav" aria-label="Primary Menu">
				<?php
					wp_nav_menu([
						'theme_location' => 'primary',
						'menu_class'     => 'primary-menu',
						'container'      => false,
					]);
				?>
			</nav>
		<?php endif; ?>
	</div>
</header>
<main class="site-main">
