<?php 

function coachuptheme_setup(){
    //Grace à cela, on peut gerer le logo dans le backoffice de WP sur la partie "Apparence > Personnaliser > Identité du site"
    add_theme_support('custom-logo', array(
        'width' => 400,
        'height' => 150,
        'flex-width' => true
    ));
    add_theme_support('post-thumbnails');

    //Grace à cela, on peut gerer le menu dans le backoffice de WP sur la partie "Apparence > Menus"
    register_nav_menus(array(
		'principal' => 'Menu Principal (menu du haut)',
        'footer-menu' => 'Menu Social (menu du bas)',
	));
}

add_action('after_setup_theme', 'coachuptheme_setup');

function coachuptheme_widgets_init() {
    // Enregistrement de 3 emplacements de widgets pour le footer. Permet de les gérer dans le backoffice de WP sur la partie "Apparence > Widgets"
    register_sidebar( array(
        'name'          => 'Footer col 1',
        'id'            => 'footer1',
        'description'   => "Cet emplacement s'affiche dans la colonne 1 du pied de page",
    ) );
    register_sidebar( array(
        'name'          => 'Footer col 2',
        'id'            => 'footer2',
        'description'   => "Cet emplacement s'affiche dans la colonne 2 du pied de page",
    ) );
    register_sidebar( array(
        'name'          => 'Footer col 3',
        'id'            => 'footer3',
        'description'   => "Cet emplacement s'affiche dans la colonne 3 du pied de page",
    ) );
}
add_action( 'widgets_init', 'coachuptheme_widgets_init' );

/**
 * Remplace le label texte des items du menu social par une icône FontAwesome.
 * Détecte le réseau social par le label OU par l'URL du lien.
 * S'applique uniquement au theme_location "footer-menu" (menu social du footer).
 */
function coachuptheme_social_icons( $title, $item, $args, $depth = 0 ) {
	if ( empty($args->theme_location) || $args->theme_location !== 'footer-menu' ) {
		return $title;
	}
	$map = array(
		'instagram' => 'fa-instagram',
		'facebook'  => 'fa-facebook-f',
		'twitter'   => 'fa-x-twitter',
		'x.com'     => 'fa-x-twitter',
		'linkedin'  => 'fa-linkedin-in',
		'youtube'   => 'fa-youtube',
		'tiktok'    => 'fa-tiktok',
		'github'    => 'fa-github',
		'dribbble'  => 'fa-dribbble',
		'pinterest' => 'fa-pinterest',
		'whatsapp'  => 'fa-whatsapp',
		'discord'   => 'fa-discord',
	);
	$haystack = strtolower( wp_strip_all_tags($title) . ' ' . (isset($item->url) ? $item->url : '') );
	foreach ( $map as $needle => $icon ) {
		if ( strpos($haystack, $needle) !== false ) {
			return '<i class="fa-brands ' . esc_attr($icon) . '" aria-label="' . esc_attr(wp_strip_all_tags($title)) . '"></i>';
		}
	}
	return $title;
}
add_filter( 'nav_menu_item_title', 'coachuptheme_social_icons', 10, 4 );

function coachuptheme_search_filters( $query ) {
    if ( is_admin() || ! $query->is_main_query() || !$query->is_search() ) {
        return;
    }
    // 1) Recherche dans coachings UNIQUEMENT
    $query->set( 'post_type', array('coaching') );

    $tax_query = array();

    if ( ! empty($_GET['type-coaching']) ) {
        $tax_query[] = array(
            'taxonomy' => 'type-coaching',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_GET['type-coaching']),
        );
    }

    if ( ! empty($_GET['niveau']) ) {
        $tax_query[] = array(
            'taxonomy' => 'niveau',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_GET['niveau']),
        );
    }

    if ( count($tax_query) > 1 ) {
        $tax_query['relation'] = 'AND';
    }

    if ( ! empty($tax_query) ) {
        $query->set( 'tax_query', $tax_query );
    }

    // 3) Filtres meta (prix max + lieu)
    $meta_query = array();

    if ( ! empty($_GET['prix_max']) ) {
        $meta_query[] = array(
            'key'     => 'prix',
            'value'   => intval($_GET['prix_max']),
            'compare' => '<=',
            'type'    => 'NUMERIC',
        );
    }

    if ( ! empty($_GET['lieu']) ) {
        $meta_query[] = array(
            'key'     => 'lieu',
            'value'   => sanitize_text_field($_GET['lieu']),
            'compare' => '=',
        );
    }

    if ( count($meta_query) > 1 ) {
        $meta_query['relation'] = 'AND';
    }
    if ( ! empty($meta_query) ) {
        $query->set( 'meta_query', $meta_query );
    }
}
add_action( 'pre_get_posts', 'coachuptheme_search_filters' );