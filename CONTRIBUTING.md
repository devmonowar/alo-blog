# Contributing to Alo Blog

Thanks for helping out. A few rules so reviews stay fast:

1. **One change per pull request** — don't mix a bug fix with a feature.
2. **Match the existing style** — tabs for PHP indentation, `aloblog_` function prefix, `alo-blog` text domain, escaping on output (`esc_html`, `esc_attr`, `esc_url`), sanitizing on input.
3. **No plugin-territory features, no external requests, no tracking, no upsells.** GPLv2-compatible code only.
4. **Accessibility first** — keyboard-operable, visible focus, screen-reader text where the design needs it. If you add directional CSS, mirror it in `rtl.css`.
5. **Run the checks** — `composer install`, then `composer lint` (PHPCS WordPress-Extra + PHPCompatibilityWP for PHP 7.4+). CI runs the same on every push.
6. **Test like a reviewer** — enable `WP_DEBUG`, try PHP 7.4 and current, switch languages (the `.pot` is hand-maintained in `languages/` — update it if you touch a string).

## Bug reports

Use the bug template: WordPress version, PHP version, theme version, steps to reproduce, what you expected, what happened instead. Screenshots help.
