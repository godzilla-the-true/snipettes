<?php

/**
 * Nettoie les transients expirés permettant de liberer de:
 * - Liberer de l'espace
 * - Optimisation continue
 *
 * NB: mettre dans le fichier functions.php
 * @author Mister__iks
 * @link https://www.linkedin.com/in/ibrahima-samb-dev
 * @since 1.0.0
 */
function clean_expired_transients()
{
    global $wpdb;
    $wpdb->query(
        "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_%' AND (CAST(option_value AS UNSIGNED) < UNIX_TIMESTAMP())"
    );
}
add_action('wp_scheduled_delete', 'clean_expired_transients');
