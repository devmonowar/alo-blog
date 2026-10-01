/**
 * Header color-scheme toggle: flips html[data-scheme] and remembers it.
 */
(function () {
	var btn = document.querySelector( '.alo-blog-scheme-toggle' );
	if ( ! btn ) {
		return;
	}
	function current() {
		return document.documentElement.dataset.scheme === 'dark' ? 'dark' : 'light';
	}
	function paint() {
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
