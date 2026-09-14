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
		if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) {
			?>
			<div class="alo-blog-footer-widgets">
				<?php for ( $i = 1; $i <= 3; $i++ ) { ?>
					<div class="alo-blog-footer-widget">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
				<?php } ?>
			</div>
			<?php
		}
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
</footer>
<?php wp_footer(); ?>
</body>
</html>
