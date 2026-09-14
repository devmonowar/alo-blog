/**
 * Alo Blog mobile navigation.
 *
 * Toggles the primary menu, keeps aria-expanded in sync,
 * closes with Escape and returns focus to the toggle button.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

(function () {
	var nav = document.getElementById( 'site-navigation' );
	if ( ! nav ) {
		return;
	}
	var button = nav.querySelector( '.alo-blog-menu-toggle' );
	var menu   = nav.querySelector( 'ul' );
	if ( ! button ) {
		return;
	}
	if ( ! menu ) {
		button.style.display = 'none';
		return;
	}
	button.addEventListener(
		'click',
		function () {
			var expanded = button.getAttribute( 'aria-expanded' ) === 'true';
			button.setAttribute( 'aria-expanded', String( ! expanded ) );
			nav.classList.toggle( 'toggled', ! expanded );
		}
	);
	document.addEventListener(
		'keydown',
		function ( event ) {
			if ( event.key === 'Escape' && nav.classList.contains( 'toggled' ) ) {
				nav.classList.remove( 'toggled' );
				button.setAttribute( 'aria-expanded', 'false' );
				button.focus();
			}
		}
	);
})();
