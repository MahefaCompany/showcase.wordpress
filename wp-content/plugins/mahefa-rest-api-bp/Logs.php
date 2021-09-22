<?php

/**
 * 
 * define( 'WP_DEBUG', true );
 * 
 * Enable Debug logging to the /wp-content/debug.log file
 * define( 'WP_DEBUG_LOG', true );
 * 
 */
date_default_timezone_set('Europe/Moscow');

class Logs {
    public static function info(string $prefix, $log = NULL, bool $isNewLine = false): void {
        if (true === WP_DEBUG) {
            if($isNewLine) error_log("\n\n\n\n ****************************   New Section Log  ************************** \n\n\n\n");
            $prefixInternal = "mahefa-rest-api-bp :: >>> ";
            if (is_array($log) || is_object($log)) {
                error_log($prefixInternal.$prefix.print_r($log, true));
            } else {
                error_log($prefixInternal.$prefix.$log);
            }
        }
    }
}