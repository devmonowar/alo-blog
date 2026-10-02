/**
 * Header color-scheme toggle: flips html[data-scheme] and remembers it.
 */
(function () {
	var btn = document.querySelector( '.alo-blog-scheme-toggle' );
	if ( ! btn ) {
		return;
	}
	function current() {
		var s = document.documentElement.dataset.scheme;
		if ( s === 'dark' || s === 'light' ) {
			return s;
		}
		return window.matchMedia && matchMedia( '(prefers-color-scheme: dark)' ).matches ? 'dark' : 'light';
	}
	function paint() {
		btn.removeAttribute( 'hidden' );
		btn.setAttribute( 'aria-pressed', current() === 'dark' ? 'true' : 'false' );
	}
	btn.addEventListener( 'click', function () {
		var next = current() === 'dark' ? 'light' : 'dark';
		document.documentElement.dataset.scheme = next;
		try {
			localStorage.setItem( 'aloblog-scheme', next );
		} catch ( e ) {}
		paint();
	} );
	paint();
})();
