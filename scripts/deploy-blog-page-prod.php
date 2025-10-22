<?php
/**
 * Script de déploiement de la page Blog en PRODUCTION
 *
 * IMPORTANT - Instructions de déploiement:
 * 1. Uploadez ce fichier à la RACINE de votre site en production
 * 2. Accédez à https://votre-site.com/deploy-blog-page-prod.php via le navigateur
 * 3. Le script créera automatiquement la page Blog
 * 4. SUPPRIMEZ ce fichier immédiatement après utilisation pour la sécurité
 *
 * Ce script va:
 * - Créer une nouvelle page "Blog" avec Elementor
 * - Désactiver l'ancienne page "Actualités" comme page des articles
 * - Configurer automatiquement les paramètres
 */

// Sécurité: Vérifier que nous ne sommes pas en local
if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1', 'localhost'])) {
    die('⚠️ Ce script est destiné à la PRODUCTION uniquement. Utilisez create-blog-page.php en local.');
}

// Load WordPress
require_once('wp-load.php');

// Vérifier les droits admin
if (!current_user_can('manage_options')) {
    die('❌ Vous devez être connecté en tant qu\'administrateur pour exécuter ce script.');
}

echo "<html><head><meta charset='UTF-8'><title>Déploiement Page Blog</title>";
echo "<style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;background:#f5f5f5;}";
echo ".success{color:#0a7e07;background:#d4edda;padding:10px;border-left:4px solid #0a7e07;margin:10px 0;}";
echo ".info{color:#004085;background:#d1ecf1;padding:10px;border-left:4px solid #004085;margin:10px 0;}";
echo ".warning{color:#856404;background:#fff3cd;padding:10px;border-left:4px solid #856404;margin:10px 0;}";
echo ".error{color:#721c24;background:#f8d7da;padding:10px;border-left:4px solid #721c24;margin:10px 0;}";
echo "h1{color:#333;}ul{line-height:1.8;}a{color:#0073aa;text-decoration:none;}a:hover{text-decoration:underline;}</style>";
echo "</head><body>";

echo "<h1>🚀 Déploiement de la page Blog - PRODUCTION</h1>";

// Vérifier si une page Blog existe déjà et la supprimer
$existing_blog = get_page_by_path('blog');
if ($existing_blog) {
    echo "<div class='warning'>";
    echo "<strong>⚠️ Une page 'Blog' existe déjà (ID: {$existing_blog->ID})</strong><br>";
    echo "Suppression de l'ancienne page en cours...";
    echo "</div>";

    // Forcer la suppression définitive (bypass trash)
    $deleted = wp_delete_post($existing_blog->ID, true);

    if ($deleted) {
        echo "<div class='success'>✅ Ancienne page 'Blog' supprimée avec succès (ID: {$existing_blog->ID})</div>";
    } else {
        echo "<div class='error'>❌ Impossible de supprimer l'ancienne page. Veuillez la supprimer manuellement.</div>";
        echo "</body></html>";
        exit;
    }
}

// Vérifier l'ancienne page Actualités
$old_actualites = get_page_by_path('actualites');
$old_actualites_id = $old_actualites ? $old_actualites->ID : null;

echo "<div class='info'><strong>📋 Début du déploiement...</strong></div>";

// ÉTAPE 1: Créer la nouvelle page Blog
echo "<div class='info'>Étape 1/4: Création de la page Blog...</div>";

$page_data = array(
    'post_title'     => 'Blog',
    'post_name'      => 'blog',
    'post_content'   => '',
    'post_status'    => 'publish',
    'post_type'      => 'page',
    'post_author'    => get_current_user_id(),
    'comment_status' => 'closed',
    'ping_status'    => 'closed'
);

$page_id = wp_insert_post($page_data);

if (is_wp_error($page_id)) {
    echo "<div class='error'>❌ Erreur lors de la création de la page: " . $page_id->get_error_message() . "</div>";
    echo "</body></html>";
    exit;
}

echo "<div class='success'>✅ Page créée avec succès! ID: $page_id</div>";

// ÉTAPE 2: Configurer Elementor
echo "<div class='info'>Étape 2/4: Configuration d'Elementor...</div>";

update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_elementor_template_type', 'wp-page');
update_post_meta($page_id, '_wp_page_template', 'elementor_header_footer');

// Paramètres Tekprof
$page_meta = array(
    'page_default_header' => 'enabled',
    'page_default_footer' => 'enabled',
    'page_hide_title'     => 'yes'
);
update_post_meta($page_id, 'tekprof_page_meta', $page_meta);

// Créer le contenu Elementor
$elementor_data = array(
    array(
        'id'       => uniqid(),
        'elType'   => 'section',
        'settings' => array('layout' => 'boxed'),
        'elements' => array(
            array(
                'id'       => uniqid(),
                'elType'   => 'column',
                'settings' => array('_column_size' => 100),
                'elements' => array(
                    array(
                        'id'         => uniqid(),
                        'elType'     => 'widget',
                        'settings'   => array(
                            'title'       => 'Nos Actualités',
                            'header_size' => 'h2',
                            'align'       => 'center'
                        ),
                        'elements'   => array(),
                        'widgetType' => 'heading'
                    ),
                    array(
                        'id'         => uniqid(),
                        'elType'     => 'widget',
                        'settings'   => array(
                            'layout_type'             => 'layout_six',
                            'post_type'               => 'cpt',
                            'post_from'               => 'all',
                            'post_limit'              => 9,
                            'order_by'                => 'date',
                            'sort_order'              => 'DESC',
                            'show_thumbnail'          => 'yes',
                            'show_read_more'          => 'yes',
                            'read_more_text'          => 'Lire la suite',
                            'title_word'              => 10,
                            'excerpt_count'           => 15,
                            'layout_one_sub_title'    => 'Blog',
                            'layout_one_title'        => 'Nos Dernières Actualités',
                            'layout_one_title_tag'    => 'h2',
                            'layout_one_button_label' => '',
                            'post_thumbnail_size'     => 'tekprof_850x470'
                        ),
                        'elements'   => array(),
                        'widgetType' => 'tekprof-recent-post'
                    )
                )
            )
        )
    )
);

update_post_meta($page_id, '_elementor_data', wp_json_encode($elementor_data));
update_post_meta($page_id, '_elementor_page_settings', wp_json_encode(array(
    'hide_title'          => 'yes',
    'page_title_display'  => 'hide'
)));

echo "<div class='success'>✅ Elementor configuré avec le widget Recent Post (Layout 6)</div>";

// ÉTAPE 3: Désactiver l'ancienne configuration
echo "<div class='info'>Étape 3/4: Désactivation de l'ancienne page des articles...</div>";

$old_page_for_posts = get_option('page_for_posts');

if ($old_page_for_posts && $old_page_for_posts != 0) {
    update_option('page_for_posts', 0);
    echo "<div class='success'>✅ Ancienne page des articles (ID: $old_page_for_posts) désactivée</div>";

    if ($old_actualites_id) {
        echo "<div class='warning'>⚠️ L'ancienne page 'Actualités' (ID: $old_actualites_id) existe toujours. Vous pouvez la supprimer manuellement si nécessaire.</div>";
    }
} else {
    echo "<div class='info'>ℹ️ Aucune page des articles n'était configurée</div>";
}

// ÉTAPE 4: Vider le cache
echo "<div class='info'>Étape 4/4: Nettoyage du cache...</div>";

// Vider le cache Elementor
if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::instance()->files_manager->clear_cache();
}

// Vider le cache WordPress
wp_cache_flush();

echo "<div class='success'>✅ Cache vidé</div>";

// RÉSUMÉ FINAL
echo "<div class='success' style='margin-top:30px;padding:20px;'>";
echo "<h2 style='margin-top:0;'>🎉 Déploiement terminé avec succès!</h2>";
echo "<strong>Page créée:</strong><br>";
echo "• ID: $page_id<br>";
echo "• URL: <a href='" . get_permalink($page_id) . "' target='_blank'>" . get_permalink($page_id) . "</a><br>";
echo "</div>";

// PROCHAINES ÉTAPES
echo "<div class='info' style='padding:20px;'>";
echo "<h3 style='margin-top:0;'>📝 Prochaines étapes:</h3>";
echo "<ol style='margin:10px 0;'>";
echo "<li><strong>Visualiser la page:</strong> <a href='" . get_permalink($page_id) . "' target='_blank'>Voir la page Blog</a></li>";
echo "<li><strong>Personnaliser avec Elementor:</strong> <a href='/wp-admin/post.php?post=$page_id&action=elementor' target='_blank'>Modifier avec Elementor</a></li>";
echo "<li><strong>Mettre à jour le menu:</strong> <a href='/wp-admin/nav-menus.php' target='_blank'>Apparence → Menus</a>";
echo "<ul><li>Remplacez le lien 'Actualités' par 'Blog'</li></ul></li>";

if ($old_actualites_id) {
    echo "<li><strong>Supprimer l'ancienne page (optionnel):</strong> <a href='/wp-admin/post.php?post=$old_actualites_id&action=edit' target='_blank'>Modifier/Supprimer 'Actualités'</a></li>";
}

echo "<li><strong>⚠️ SUPPRIMER CE FICHIER:</strong> Supprimez <code>deploy-blog-page-prod.php</code> du serveur pour des raisons de sécurité!</li>";
echo "</ol>";
echo "</div>";

// AVERTISSEMENT DE SÉCURITÉ
echo "<div class='error' style='padding:20px;margin-top:20px;'>";
echo "<h3 style='margin-top:0;'>🔒 SÉCURITÉ IMPORTANTE</h3>";
echo "<p><strong>Supprimez immédiatement ce fichier via FTP/cPanel:</strong></p>";
echo "<code style='background:#fff;padding:5px;display:block;'>deploy-blog-page-prod.php</code>";
echo "<p>Ce fichier ne doit pas rester accessible sur votre serveur de production.</p>";
echo "</div>";

echo "</body></html>";
