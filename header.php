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
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
		<nav id="site-navigation" class="alo-blog-nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'alo-blog' ); ?>">
				<button class="alo-blog-menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'alo-blog' ); ?>"><span class="alo-blog-menu-icon" aria-hidden="true"><span></span><span></span><span></span></span></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<?php } ?>
		<?php if ( 'auto' === get_theme_mod( 'aloblog_color_scheme', 'auto' ) ) { ?>
		<button class="alo-blog-scheme-toggle" aria-pressed="false" hidden><svg class="alo-blog-scheme-icon-moon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg><svg class="alo-blog-scheme-icon-sun" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg><span class="screen-reader-text"><?php esc_html_e( 'Toggle color scheme', 'alo-blog' ); ?></span></button>
		<?php } ?>
	</div>
</header>
<main id="main" class="alo-blog-container" tabindex="-1">
