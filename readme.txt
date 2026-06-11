=== PhilDesigns Timelines ===
Contributors: phildesigns
Tags: timeline, custom post type, ACF, shortcode
Requires at least: 6.7
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a Timeline custom post type with vertical and horizontal layout options. Insert timelines via shortcode. Requires ACF PRO.

== Description ==

PhilDesigns Timelines adds a **Timeline** custom post type to your WordPress site, powered by Advanced Custom Fields PRO. Build rich timelines with event dates, icons, icon background colors, and WYSIWYG content — then embed them anywhere using a simple shortcode.

**Features:**

* Timeline custom post type with title and event repeater
* Per-event fields: date, icon image, icon background color, and rich content (WYSIWYG)
* Vertical and horizontal layout options via shortcode parameter
* Copy-to-clipboard shortcode helper in the post editor sidebar
* Clean, minimal front-end CSS and JS

**Requirements:**

Advanced Custom Fields PRO must be installed and active.

== Installation ==

1. Upload the `timelines` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Ensure **Advanced Custom Fields PRO** is installed and active.
4. Go to **Timelines** in the admin menu and create a new timeline.
5. Add events using the repeater field (date, icon, color, content).
6. Copy the shortcode from the sidebar and paste it into any post or page.

== Shortcode Usage ==

Insert a timeline into any post or page:

`[timeline id='123' orientation='vertical']`

`[timeline id='123' orientation='horizontal']`

* `id` — the Timeline post ID (shown in the sidebar shortcode helper).
* `orientation` — `vertical` (default) or `horizontal`.

== Frequently Asked Questions ==

= Does this plugin work without Advanced Custom Fields PRO? =

No. ACF PRO is required for the event repeater fields. The plugin will display an admin notice if ACF PRO is not active.

= Where do I find the shortcode for a timeline? =

Open the timeline in the WordPress editor. The shortcode is shown in the **Shortcode** meta box in the sidebar, with a one-click Copy button.

== Screenshots ==

1. Timeline custom post type editor with event repeater.
2. Front-end vertical timeline layout.

== Changelog ==

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.0 =
Initial release.
