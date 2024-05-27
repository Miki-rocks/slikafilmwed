<?php
/* insert this in you wp-config.php file after WordPress debugging mode */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

$GLOBALS['wp_filter'] = array(
	'enable_wp_debug_mode_checks' => array(
		10 => array(
			array(
				'accepted_args' => 0,
				'function'      => function () {
					if (defined('WP_DEBUG') && WP_DEBUG) {
						// *** This is the key line - change to adjust to whatever logging state you want
						error_reporting(E_ALL & ~E_DEPRECATED);

						ini_set('display_errors', defined('WP_DEBUG_DISPLAY') && WP_DEBUG_DISPLAY ? 1 : 0);

						if (in_array(strtolower((string) WP_DEBUG_LOG), array('true', '1'), true)) {
							$log_path = WP_CONTENT_DIR . '/debug.log';
						} elseif (is_string(WP_DEBUG_LOG)) {
							$log_path = WP_DEBUG_LOG;
						} else {
							$log_path = false;
						}

						if ($log_path) {
							ini_set('log_errors', 1);
							ini_set('error_log', $log_path);
						}

						if (
							defined('XMLRPC_REQUEST') || defined('REST_REQUEST') || defined('MS_FILES_REQUEST') ||
							(defined('WP_INSTALLING') && WP_INSTALLING) ||
							wp_doing_ajax() || wp_is_json_request()
						) {
							ini_set('display_errors', 0);
						}
					}

					return false;
				},
			),
		),
	)
);

define('SFWED_ENV', 'development');
