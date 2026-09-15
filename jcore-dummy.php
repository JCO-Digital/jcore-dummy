<?php
/**
 * Plugin Name:       JCORE Dummy
 * Description:       Dummy plugin for testing JCORE update process and API.
 * Plugin URI:        https://github.com/JCO-Digital/jcore-dummy#readme
 * Author:            JCO Digital
 * Version:           1.0.0
 * Requires at least: 6.7
 * Tested up to:      7.0
 * Requires PHP:      8.1
 * Author URI:        https://jco.fi
 * Text Domain:       jcore-dummy
 * Domain Path:       /languages
 *
 * @package Jcore\Dummy
 */

namespace Jcore\Dummy;

// Exit if ABSPATH is not defined.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

defined( 'JCORE_DUMMY_PLUGIN_FILE' ) || define( 'JCORE_DUMMY_PLUGIN_FILE', __FILE__ );

require_once __DIR__ . '/update.php';

/**
 * Display an admin notice for testing purposes.
 *
 * @return void
 */
function admin_notice(): void {
	$screen = get_current_screen();
	if ( ! $screen || 'plugins' !== $screen->id ) {
		return;
	}
	?>
	<div class="notice notice-info is-dismissible">
		<p>
			<strong><?php esc_html_e( 'JCORE Dummy Plugin', 'jcore-dummy' ); ?>:</strong>
			<?php
			printf(
				/* translators: %s: Plugin version */
				esc_html__( 'Active and running version %s.', 'jcore-dummy' ),
				esc_html( \Jcore\Update\Support\PluginHelper::getVersion( JCORE_DUMMY_PLUGIN_FILE ) )
			);
			?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', __NAMESPACE__ . '\\admin_notice' );
