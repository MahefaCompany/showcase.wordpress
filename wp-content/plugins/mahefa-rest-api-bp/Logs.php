<?php

/**
 * 
 * define( 'WP_DEBUG', true );
 * 
 * Enable Debug logging to the /wp-content/debug.log file
 * define( 'WP_DEBUG_LOG', true );
 * 
 */
class Logs {
    public static function info(string $prefix, string $log = ""): void {
        if (true === WP_DEBUG) {
            $prefixInternal = "mahefa-rest-api-bp :: >>> ";
            if (is_array($log) || is_object($log)) {
                error_log($prefixInternal.$prefix.print_r($log, true));
            } else {
                error_log($prefixInternal.$prefix.$log);
            }
        }
    }
}