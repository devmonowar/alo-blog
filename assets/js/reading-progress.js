/**
 * Alo Blog reading progress bar.
 *
 * Fills the fixed bar at the top of the viewport
 * as the reader scrolls through the single post.
 *
 * @package Alo_Blog
 * @since 1.0.0
 */

(function () {
	var bar     = document.querySelector( '.alo-blog-progress-bar' );
	var article = document.querySelector( '.alo-blog-layout article' );
	if ( ! bar || ! article ) {
		return;
	}
	if ( window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	function aloblogUpdateProgress() {
		var start = article.offsetTop;
		var total = article.offsetHeight - window.innerHeight;
		var done  = window.scrollY - start;
		var pct   = 0;
		if ( total > 0 ) {
			pct = Math.min( 100, Math.max( 0, ( done / total ) * 100 ) );
		}
		bar.style.width = pct + '%';
	}

	var ticking = false;
	function aloblogOnScroll() {
		if ( ! ticking ) {
			window.requestAnimationFrame(
				function () {
					aloblogUpdateProgress();
					ticking = false;
				}
			);
			ticking = true;
		}
	}

	window.addEventListener( 'scroll', aloblogOnScroll, { passive: true } );
	window.addEventListener( 'resize', aloblogOnScroll );
	aloblogUpdateProgress();
})();
