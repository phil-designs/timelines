<?php
/**
 * Plugin Name:       PhilDesigns Timelines
 * Plugin URI:        https://phildesigns.com
 * Description:       Adds a Timeline custom post type with vertical and horizontal layout options. Insert timelines anywhere using a shortcode. Requires Advanced Custom Fields PRO.
 * Version:           1.0.0
 * Author:            PhilDesigns
 * Author URI:        https://phildesigns.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       timelines
 * Domain Path:       /languages
 * Requires at least: 6.7
 * Tested up to:      7.0
 * Requires PHP:      7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PD_TL_VERSION', '1.0.0' );
define( 'PD_TL_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'PD_TL_PATH', __DIR__ );

require_once PD_TL_PATH . '/fields/timeline-fields.php';

register_activation_hook( __FILE__, 'pd_tl_activate' );
function pd_tl_activate() {
	flush_rewrite_rules();
}

function pd_tl_initialize() {
	if ( ! class_exists( 'acf' ) ) {
		add_action( 'admin_notices', 'pd_tl_acf_error' );
		return;
	}

	require_once PD_TL_PATH . '/includes/cpt.php';
	require_once PD_TL_PATH . '/includes/timeline.php';
	require_once PD_TL_PATH . '/includes/enqueue.php';
}
add_action( 'after_setup_theme', 'pd_tl_initialize', 20 );

function pd_tl_acf_error() {
	?>
	<div class="notice notice-error">
		<p><strong><?php esc_html_e( 'Timelines Plugin:', 'timelines' ); ?></strong> <?php esc_html_e( 'Advanced Custom Fields PRO is required. Please activate ACF Pro or deactivate this plugin.', 'timelines' ); ?></p>
	</div>
	<?php
}
