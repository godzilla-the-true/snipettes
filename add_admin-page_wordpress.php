<?php
/**
 * Fonction pour ajouter un menu personnalisé dans l'admin WordPress.
 *
 * Cette fonction utilise `add_menu_page` pour créer un nouveau menu dans le
 * tableau de bord WordPress. Elle est accessible uniquement aux utilisateurs
 * ayant la capacité 'manage_options'(admin).
 * NB: à rajouter dans le fichier funtions.php
 * @since 1.0.0
 * @author Mister__iks
 * @link https://www.linkedin.com/in/ibrahima-samb-dev
 */
function add_admin_menu_insign()
{
    add_menu_page(
        __('Nom à afficher sur l-onglet', 'my-textdomain'), 
        __('Nom du menu sur le dashboard', 'my-textdomain'),  
        'manage_options',     // ne pas modifier                           
        'slug_url',
        'include_page', // ne pas modifier 
        'nom_dashicon',
        3 
    );
}
add_action('admin_menu', 'add_admin_menu_insign');

/**
 * Fonction pour inclure le fichier PHP de la page personnalisée.
 *
 * Cette fonction est appelée lorsque l'utilisateur clique sur l'élément de menu
 * créé dans `add_admin_menu_insign`. Elle inclut le fichier PHP qui contient
 * le code HTML/PHP de la page personnalisée.
 * NB: Modifier uniquement le nom du fichier
 */
function include_page()
{
    require_once 'nom_de_la_page_customisé.php';
}
