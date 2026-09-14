<?php
/**
 * Site header: branding + primary navigation + mobile toggle.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'alo-blog' ); ?></a>
<header class="alo-blog-header">
	<div class="alo-blog-container alo-blog-header-inner">
		<div class="alo-blog-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				?>
				<p class="alo-blog-site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</p>
				<?php
				$aloblog_tagline = get_bloginfo( 'description', 'display' );
				if ( $aloblog_tagline ) {
					?>
					<p class="alo-blog-site-tagline"><?php echo esc_html( $aloblog_tagline ); ?></p>
					<?php
				}
			}
			?>
		</div>
		<nav id="site-navigation" class="alo-blog-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'alo-blog' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				?>
				<button class="alo-blog-menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'alo-blog' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
			}
			?>
		</nav>
	</div>
</header>
<main id="main" class="alo-blog-container">
