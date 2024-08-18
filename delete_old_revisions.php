<?php

/**
 * Supprime les révisions de posts plus anciennes que $days jours.
 * A rajouter dans le fichier functions.php
 *@author Mister__iks
 * @link https://www.linkedin.com/in/ibrahima-samb-dev
 * @since 1.0.0
 */
function delete_old_revisions($days = 30)
{
    global $wpdb;
    $days = $days;
    $wpdb->query(
        $wpdb->prepare(
            "DELETE FROM $wpdb->posts WHERE post_type = 'revision' AND post_date < NOW() - INTERVAL %d DAY",
            $days
        )
    );
}
add_action('wp_scheduled_delete', 'delete_old_revisions');
