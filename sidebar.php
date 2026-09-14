<?php
/**
 * Primary sidebar (right, 300px). Renders nothing when empty.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="alo-blog-sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
