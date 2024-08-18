<?php

/**
 * Fonction pour inclure un fichier PHP depuis le dossier 'partials' du thème via un shortcode.
 *
 * Cette fonction utilise `include` pour inclure un fichier PHP situé dans le sous-dossier 'partials' du thème.
 * Elle est ensuite associée à un shortcode pour permettre son utilisation dans les posts ou pages.
 *
 * @since 1.0.0
 * @return string Le contenu du fichier inclus.
 */
function fonction_du_shortcode()
{
    $file_path = get_stylesheet_directory() . '/partials/fichier.php';
    if (file_exists($file_path)) {
        ob_start();
        include $file_path;
        return ob_get_clean();
    } else {
        return 'Le fichier spécifié n\'existe pas.';
    }
}
add_shortcode('mon_shortcode', 'fonction_du_shortcode');
