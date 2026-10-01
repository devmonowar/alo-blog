<?php
/**
 * Site footer: footer widgets, footer menu, copyright.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>
<footer class="alo-blog-footer">
	<div class="alo-blog-container">
		<?php
		$aloblog_active_columns = 0;
		for ( $aloblog_i = 1; $aloblog_i <= 3; $aloblog_i++ ) {
			if ( is_active_sidebar( 'footer-' . $aloblog_i ) ) {
				++$aloblog_active_columns;
			}
		}
		if ( $aloblog_active_columns > 0 ) {
			?>
			<div class="alo-blog-footer-widgets alo-blog-footer-widgets--<?php echo esc_attr( $aloblog_active_columns ); ?>">
				<?php for ( $aloblog_i = 1; $aloblog_i <= 3; $aloblog_i++ ) { ?>
					<?php if ( is_active_sidebar( 'footer-' . $aloblog_i ) ) { ?>
					<div class="alo-blog-footer-widget">
						<?php dynamic_sidebar( 'footer-' . $aloblog_i ); ?>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
			<?php
		}
		?>
		<div class="alo-blog-footer-bottom">
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			?>
			<p class="alo-blog-copyright">
				<?php
				$aloblog_credit = get_theme_mod( 'aloblog_footer_credit', '' );
				if ( $aloblog_credit ) {
					echo esc_html( $aloblog_credit );
				} else {
					printf(
						/* translators: 1: current year, 2: site name. */
						esc_html__( '© %1$s %2$s. All rights reserved.', 'alo-blog' ),
						esc_html( date_i18n( 'Y' ) ),
						esc_html( get_bloginfo( 'name' ) )
					);
				}
				?>
			</p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
