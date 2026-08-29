<?php
/**
 * Trade Sphare Theme
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme constants.
 */
define( 'TRADE_SPHARE_VERSION', '1.0.5' );
define( 'TRADE_SPHARE_PATH', get_template_directory() );
define( 'TRADE_SPHARE_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
require_once TRADE_SPHARE_PATH . '/inc/theme-setup.php';

/**
 * Enqueue theme assets.
 */
require_once TRADE_SPHARE_PATH . '/inc/enqueue.php';

/**
 * Template functions.
 */
require_once TRADE_SPHARE_PATH . '/inc/template-functions.php';

/**
 * Template hooks.
 */
require_once TRADE_SPHARE_PATH . '/inc/template-hooks.php';

/**
 * Customizer.
 */
require_once TRADE_SPHARE_PATH . '/inc/customizer.php';

/**
 * Widgets.
 */
require_once TRADE_SPHARE_PATH . '/inc/widgets.php';

