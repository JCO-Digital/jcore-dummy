<?php
/**
 * Handles the update configuration and hooks for the plugin.
 *
 * @package Jcore\Dummy
 */

namespace Jcore\Dummy;

use Jcore\Update\Config\UpdateConfig;
use Jcore\Update\Hooks\PluginUpdateHooks;
use Jcore\Update\Support\PluginHelper;

// Exit if ABSPATH is not defined.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( '\Jcore\Update\Config\UpdateConfig' ) && class_exists( '\Jcore\Update\Hooks\PluginUpdateHooks' ) ) {
	$config = new UpdateConfig(
		pluginFile: JCORE_DUMMY_PLUGIN_FILE,
		slug: 'jcore-dummy',
		version: PluginHelper::getVersion( JCORE_DUMMY_PLUGIN_FILE ),
		apiBaseUrl: 'https://update.jcore.fi/v1',
	);
	( new PluginUpdateHooks( $config ) )->register();
}
