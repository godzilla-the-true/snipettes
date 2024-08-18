<?php

/**
 * Récupère les données d'un type de contenu personnalisé spécifique.
 *
 * Cette fonction utilise `get_posts` pour récupérer tous les postes du type spécifié
 * et extrait les métadonnées définies dans le tableau des clés de métadonnées.
 *
 * @author Mister__iks
 * @link https://www.linkedin.com/in/ibrahima-samb-dev
 * 
 * @param string $post_type Le type de contenu à récupérer.
 * @param array  $meta_keys Un tableau contenant les noms des clés de métadonnées à récupérer.
 * @return array Un tableau d'objets avec les métadonnées spécifiées pour chaque post.
 */
function get_custom_post_data($post_type, $meta_keys, $nb_items = -1)
{
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => $nb_items,
        'post_status'    => 'publish',
        'fields'         => 'ids',
    );
    $posts_data = array();
    $post_ids = get_posts($args);

    if (!empty($post_ids)) {
        foreach ($post_ids as $id) {
            $post_data = array();
            foreach ($meta_keys as $meta_key) {
                $value = get_post_meta($id, $meta_key, true);
                $post_data[$meta_key] = $value;
            }
            $posts_data[] = $post_data;
        }
    } else {
        return 'Aucun post trouvé.';
    }

    return $posts_data;
}
