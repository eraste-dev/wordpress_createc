<?php
/**
 * Script to create a Blog page with Elementor
 * This script should be run once from the browser
 */

// Load WordPress
require_once('wp-load.php');

// Check if page already exists
$existing_page = get_page_by_path('blog');
if ($existing_page) {
    die('Une page "Blog" existe déjà. ID: ' . $existing_page->ID);
}

// Create new page
$page_data = array(
    'post_title'    => 'Blog',
    'post_name'     => 'blog',
    'post_content'  => '', // Elementor will handle the content
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_author'   => 1,
    'comment_status' => 'closed',
    'ping_status'   => 'closed'
);

$page_id = wp_insert_post($page_data);

if (is_wp_error($page_id)) {
    die('Erreur lors de la création de la page: ' . $page_id->get_error_message());
}

echo "Page créée avec succès! ID: $page_id<br>";

// Enable Elementor for this page
update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_elementor_template_type', 'wp-page');
update_post_meta($page_id, '_wp_page_template', 'elementor_header_footer');

echo "Elementor activé pour la page<br>";

// Configure page settings for Tekprof
$page_meta = array(
    'page_default_header' => 'enabled',
    'page_default_footer' => 'enabled',
    'page_hide_title' => 'yes'
);
update_post_meta($page_id, 'tekprof_page_meta', $page_meta);

echo "Paramètres de page Tekprof configurés<br>";

// Create Elementor data with Recent Post widget
$elementor_data = array(
    array(
        'id' => uniqid(),
        'elType' => 'section',
        'settings' => array(
            'layout' => 'boxed'
        ),
        'elements' => array(
            array(
                'id' => uniqid(),
                'elType' => 'column',
                'settings' => array(
                    '_column_size' => 100,
                ),
                'elements' => array(
                    // Section Title
                    array(
                        'id' => uniqid(),
                        'elType' => 'widget',
                        'settings' => array(
                            'title' => 'Nos Actualités',
                            'header_size' => 'h2',
                            'align' => 'center'
                        ),
                        'elements' => array(),
                        'widgetType' => 'heading'
                    ),
                    // Recent Posts Widget
                    array(
                        'id' => uniqid(),
                        'elType' => 'widget',
                        'settings' => array(
                            'layout_type' => 'layout_six',
                            'post_type' => 'cpt',
                            'post_from' => 'all',
                            'post_limit' => 9,
                            'order_by' => 'date',
                            'sort_order' => 'DESC',
                            'show_thumbnail' => 'yes',
                            'show_read_more' => 'yes',
                            'read_more_text' => 'Lire la suite',
                            'title_word' => 10,
                            'excerpt_count' => 15,
                            'layout_one_sub_title' => 'Blog',
                            'layout_one_title' => 'Nos Dernières Actualités',
                            'layout_one_title_tag' => 'h2',
                            'layout_one_button_label' => '',
                            'post_thumbnail_size' => 'tekprof_850x470'
                        ),
                        'elements' => array(),
                        'widgetType' => 'tekprof-recent-post'
                    )
                )
            )
        )
    )
);

update_post_meta($page_id, '_elementor_data', wp_json_encode($elementor_data));
update_post_meta($page_id, '_elementor_page_settings', wp_json_encode(array(
    'hide_title' => 'yes',
    'page_title_display' => 'hide'
)));

echo "Contenu Elementor créé avec le widget Recent Post (Layout 6)<br>";

echo "<br><strong>✅ Page Blog créée avec succès!</strong><br>";
echo "<br>Prochaines étapes:<br>";
echo "1. <a href='/wp-admin/post.php?post=$page_id&action=elementor' target='_blank'>Modifier la page avec Elementor</a><br>";
echo "2. Allez dans Réglages → Lecture et désactivez 'Actualités' comme page des articles<br>";
echo "3. Ajoutez la nouvelle page 'Blog' à votre menu<br>";
echo "<br><a href='/blog/'>Voir la page Blog</a> | <a href='/wp-admin/edit.php?post_type=page'>Voir toutes les pages</a>";
echo "<br><br><strong>⚠️ N'oubliez pas de supprimer ce fichier (create-blog-page.php) après utilisation!</strong>";
