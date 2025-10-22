# 🚀 Guide de Déploiement - Page Blog en Production

Ce guide explique comment déployer la nouvelle page Blog Elementor sur votre site de production.

---

## 📋 Prérequis

- ✅ Accès FTP ou cPanel au serveur de production
- ✅ Accès administrateur WordPress en production
- ✅ Le thème Tekprof et le plugin Tekprof Toolkit installés en production
- ✅ Elementor et Elementor Pro actifs en production
- ✅ Test réussi en local

---

## 🎯 Méthode Recommandée: Script Automatique

### Étape 1: Upload du fichier

1. **Via FTP (FileZilla, WinSCP, etc.)**
   - Connectez-vous à votre serveur de production
   - Uploadez le fichier `deploy-blog-page-prod.php` à la **racine** de votre site WordPress
   - Chemin: `/public_html/` ou `/www/` ou `/html/` (selon votre hébergeur)

2. **Via cPanel File Manager**
   - Connectez-vous à cPanel
   - Ouvrez "Gestionnaire de fichiers"
   - Allez dans le dossier `public_html`
   - Cliquez sur "Upload"
   - Sélectionnez `deploy-blog-page-prod.php`

### Étape 2: Connexion WordPress

1. Connectez-vous au tableau de bord WordPress de production
2. Assurez-vous d'être connecté en tant qu'**Administrateur**

### Étape 3: Exécution du script

1. Dans votre navigateur, accédez à:
   ```
   https://votre-site.com/deploy-blog-page-prod.php
   ```

2. Le script va automatiquement:
   - ✅ Créer la page "Blog"
   - ✅ Configurer Elementor
   - ✅ Ajouter le widget Recent Post
   - ✅ Désactiver l'ancienne page "Actualités" comme page des articles
   - ✅ Vider les caches

3. Vous verrez un rapport détaillé avec:
   - L'ID de la page créée
   - L'URL de la nouvelle page
   - Les prochaines étapes à suivre

### Étape 4: Vérification

1. **Tester la nouvelle page:**
   - Cliquez sur le lien fourni pour voir la page Blog
   - Vérifiez que les articles s'affichent correctement
   - Vérifiez que le header et footer sont présents

2. **Personnaliser si nécessaire:**
   - Cliquez sur "Modifier avec Elementor"
   - Ajustez les couleurs, styles, sections selon vos besoins
   - Publiez les modifications

### Étape 5: Mettre à jour le menu

1. Allez dans **Apparence → Menus**
2. Trouvez l'élément "Actualités"
3. **Option A:** Modifier le lien existant
   - Changez l'URL de `/actualites/` vers `/blog/`
   - Changez le libellé si nécessaire

4. **Option B:** Ajouter un nouveau lien
   - Cherchez la page "Blog" dans Pages
   - Ajoutez-la au menu
   - Supprimez l'ancien lien "Actualités"

5. Enregistrez le menu

### Étape 6: Nettoyage (IMPORTANT!)

1. **Supprimez le fichier de déploiement:**
   - Via FTP: Supprimez `deploy-blog-page-prod.php`
   - Via cPanel: Supprimez le fichier du gestionnaire de fichiers

   ⚠️ **CRITIQUE:** Ce fichier ne doit PAS rester sur votre serveur pour des raisons de sécurité!

2. **Optionnel:** Supprimer l'ancienne page "Actualités"
   - Allez dans Pages
   - Trouvez "Actualités"
   - Mettez à la corbeille ou supprimez définitivement

---

## 🔄 Méthode Alternative: Export/Import Manuel

Si vous préférez ne pas utiliser le script automatique:

### Export depuis Local

1. En local, dans Elementor:
   - Ouvrez la page Blog avec Elementor
   - Cliquez sur l'icône en haut à gauche (menu hamburger)
   - Allez dans **Templates → Saved Templates**
   - Ou exportez directement la page via **Page Settings → Export Template**

2. Téléchargez le fichier `.json`

### Import en Production

1. En production:
   - Créez une nouvelle page "Blog"
   - Ouvrez-la avec Elementor
   - Cliquez sur l'icône dossier (Templates)
   - Onglet **My Templates**
   - Cliquez sur **Import**
   - Uploadez votre fichier `.json`
   - Insérez le template

2. Configurez les paramètres de page:
   - Page Settings → Hide Title: Yes
   - Page Layout: Elementor Full Width

3. Publiez la page

4. Dans **Réglages → Lecture**:
   - Décochez "Actualités" comme page des articles
   - Enregistrez

---

## 📝 Checklist Post-Déploiement

- [ ] La page `/blog/` s'affiche correctement
- [ ] Les articles de blog sont visibles
- [ ] Le header s'affiche
- [ ] Le footer s'affiche
- [ ] Les images des articles s'affichent
- [ ] La pagination fonctionne (si vous avez plus de 9 articles)
- [ ] Le menu pointe vers `/blog/`
- [ ] L'ancienne page "Actualités" est désactivée ou supprimée
- [ ] Le fichier `deploy-blog-page-prod.php` a été SUPPRIMÉ du serveur
- [ ] Le cache du site a été vidé (si vous utilisez un plugin de cache)

---

## 🐛 Résolution de problèmes

### Problème: "Une page Blog existe déjà"

**Solution:**
- Supprimez l'ancienne page Blog dans WordPress
- Relancez le script

### Problème: "Vous devez être connecté en tant qu'administrateur"

**Solution:**
- Connectez-vous au tableau de bord WordPress en production
- Vérifiez que vous avez les droits d'administrateur
- Réessayez d'accéder au script

### Problème: Les articles ne s'affichent pas

**Solutions:**
1. Vérifiez que vous avez des articles publiés
2. Allez dans Elementor → Paramètres du widget Recent Post
3. Vérifiez que "Post Type" = "cpt"
4. Vérifiez que "Post From" = "all"
5. Vérifiez que "Post Limit" est supérieur à 0

### Problème: Le header/footer ne s'affichent pas

**Solutions:**
1. Vérifiez dans **Réglages → Lecture** que "page_for_posts" est bien désactivé (0)
2. Allez dans les paramètres de la page Blog
3. Vérifiez les métadonnées Tekprof:
   - `page_default_header` = `enabled`
   - `page_default_footer` = `enabled`

### Problème: Erreur 500 lors de l'exécution du script

**Solutions:**
1. Vérifiez les logs d'erreur PHP de votre hébergeur
2. Assurez-vous que WordPress est bien à jour
3. Vérifiez que tous les plugins sont actifs
4. Contactez votre hébergeur si le problème persiste

---

## 📞 Support

Si vous rencontrez des problèmes:

1. Vérifiez cette checklist
2. Consultez les logs d'erreur
3. Testez d'abord en local
4. Documentez l'erreur exacte avant de demander de l'aide

---

## 🔐 Sécurité

⚠️ **IMPORTANT:** Après le déploiement réussi:

1. **Supprimez** `deploy-blog-page-prod.php` du serveur
2. **Supprimez** `create-blog-page.php` du serveur si uploadé par erreur
3. Conservez une copie locale des scripts pour référence future
4. Ne commitez PAS ces fichiers dans votre repository Git

---

## 📅 Historique des modifications

- **2025-01-XX** - Création initiale de la page Blog avec Elementor
- Script automatisé pour déploiement en production
- Widget Recent Post (Layout 6) configuré par défaut

---

**Bon déploiement! 🚀**
