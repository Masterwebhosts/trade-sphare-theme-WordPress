<?php
/**
 * Trade Sphare Theme
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'TRADE_SPHARE_VERSION', '1.0.0' );
define( 'TRADE_SPHARE_PATH', get_template_directory() );
define( 'TRADE_SPHARE_URI', get_template_directory_uri() );

require_once TRADE_SPHARE_PATH . '/inc/theme-setup.php';
require_once TRADE_SPHARE_PATH . '/inc/enqueue.php';
require_once TRADE_SPHARE_PATH . '/inc/template-functions.php';
require_once TRADE_SPHARE_PATH . '/inc/template-hooks.php';
require_once TRADE_SPHARE_PATH . '/inc/customizer.php';
require_once TRADE_SPHARE_PATH . '/inc/widgets.php';

