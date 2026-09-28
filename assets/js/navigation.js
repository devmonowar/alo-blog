/**
 * Alo Blog mobile navigation.
 *
 * Toggles the primary menu, keeps aria-expanded in sync,
 * wires accessible sub-menu toggles, traps focus inside the
 * open mobile menu, and closes with Escape.
 *
 * @package Alo_Blog
 * @since 1.0.1
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

	function isMobile() {
		return window.matchMedia( '(max-width: 768px)' ).matches;
	}

	function isOpen() {
		return nav.classList.contains( 'toggled' );
	}

	function setToggleLabel( toggle, expanded ) {
		var label = toggle.querySelector( '.screen-reader-text' );
		if ( label ) {
			label.textContent = expanded ? toggle.getAttribute( 'data-collapse' ) : toggle.getAttribute( 'data-expand' );
		}
	}

	function closeSubmenu( li ) {
		setSubmenuState( li, false );
	}

	function setSubmenuState( li, open ) {
		li.classList.toggle( 'open', open );
		var toggle = li.querySelector( ':scope > .alo-blog-submenu-toggle' );
		if ( toggle ) {
			toggle.setAttribute( 'aria-expanded', String( open ) );
			setToggleLabel( toggle, open );
		}
	}

	function closeAllSubmenus() {
		nav.querySelectorAll( 'li.open' ).forEach( closeSubmenu );
	}

	function closeMenu() {
		nav.classList.remove( 'toggled' );
		button.setAttribute( 'aria-expanded', 'false' );
		closeAllSubmenus();
	}

	function getFocusable() {
		var items = nav.querySelectorAll( 'a[href], button:not([disabled])' );
		return Array.prototype.filter.call(
			items,
			function ( el ) {
				return el.offsetParent !== null;
			}
		);
	}

	var usingKeyboard = false;
	document.addEventListener(
		'keydown',
		function ( event ) {
			if ( event.key === 'Tab' ) {
				usingKeyboard = true;
			}
		}
	);
	document.addEventListener(
		'mousedown',
		function () {
			usingKeyboard = false;
		}
	);
	document.addEventListener(
		'touchstart',
		function () {
			usingKeyboard = false;
		},
		{ passive: true }
	);

	button.addEventListener(
		'click',
		function () {
			if ( isOpen() ) {
				closeMenu();
			} else {
				nav.classList.add( 'toggled' );
				button.setAttribute( 'aria-expanded', 'true' );
			}
		}
	);

	nav.querySelectorAll( '.alo-blog-submenu-toggle' ).forEach(
		function ( toggle ) {
			toggle.addEventListener(
				'click',
				function ( event ) {
					event.stopPropagation();
					var li = toggle.closest( 'li' );
					if ( ! li ) {
						return;
					}
					var willOpen = ! li.classList.contains( 'open' );
					Array.prototype.forEach.call(
						li.parentNode.querySelectorAll( ':scope > li.open' ),
						function ( sibling ) {
							if ( sibling !== li ) {
								closeSubmenu( sibling );
							}
						}
					);
					setSubmenuState( li, willOpen );
				}
			);
		}
	);

	nav.querySelectorAll( 'li.menu-item-has-children' ).forEach(
		function ( li ) {
			var closeTimer = null;
			li.addEventListener(
				'focusout',
				function ( event ) {
					if ( li.contains( event.relatedTarget ) ) {
						return;
					}
					closeTimer = window.setTimeout(
						function () {
							if ( ! li.contains( document.activeElement ) ) {
								closeSubmenu( li );
							}
						},
						200
					);
				}
			);
			li.addEventListener(
				'focusin',
				function () {
					if ( closeTimer ) {
						window.clearTimeout( closeTimer );
						closeTimer = null;
					}
					if ( usingKeyboard && ! li.classList.contains( 'open' ) ) {
						setSubmenuState( li, true );
					}
				}
			);
			li.addEventListener(
				'mouseleave',
				function () {
					closeSubmenu( li );
				}
			);
		}
	);

	document.addEventListener(
		'keydown',
		function ( event ) {
			if ( event.key === 'Escape' ) {
				var openSubmenu = nav.querySelector( 'li.open' );
				if ( openSubmenu ) {
					closeSubmenu( openSubmenu );
					var toggle = openSubmenu.querySelector( ':scope > .alo-blog-submenu-toggle' );
					if ( toggle ) {
						toggle.focus();
					}
				} else if ( isOpen() ) {
					closeMenu();
					button.focus();
				}
				return;
			}

			if ( event.key === 'Tab' && isOpen() && isMobile() ) {
				var focusable = getFocusable();
				if ( focusable.length < 2 ) {
					return;
				}
				var first = focusable[0];
				var last  = focusable[ focusable.length - 1 ];
				if ( event.shiftKey && document.activeElement === first ) {
					event.preventDefault();
					last.focus();
				} else if ( ! event.shiftKey && document.activeElement === last ) {
					event.preventDefault();
					first.focus();
				}
			}
		}
	);

	window.addEventListener(
		'resize',
		function () {
			if ( ! isMobile() && isOpen() ) {
				closeMenu();
			}
		}
	);
})();
