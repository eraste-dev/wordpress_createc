# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **WordPress 6.8** installation running the **Tekprof** theme - a custom Web Design & SEO theme built by WebTend. The project uses Elementor page builder extensively with custom widgets and template builders.

## Database Configuration

- **Database Name**: `createcgroupe_tekprof_102`
- **Database Host**: `localhost`
- **Table Prefix**: `wp_`
- **Development Environment**: XAMPP/LAMPP stack

## Theme Architecture

### Active Theme: Tekprof + Child Theme

The site uses a parent-child theme structure:

- **Parent Theme**: `/wp-content/themes/tekprof/` (v1.0.2)
- **Child Theme**: `/wp-content/themes/tekprof-child/`

### Theme Structure (Parent)

The Tekprof theme follows an OOP architecture with autoloaded classes:

**Core Classes** (loaded in `/wp-content/themes/tekprof/functions.php`):
- `class-setup.php` - Theme setup, image sizes, menus, sidebars
- `class-helper.php` - Helper functions for theme options and meta
- `class-assets.php` - CSS/JS enqueuing
- `class-post-helper.php` - Post/page utilities
- `class-comment-walker.php` - Custom comment markup
- `class-nav-walker.php` - Custom navigation walker
- `class-breadcrumb.php` - Breadcrumb navigation
- `class-woocommerce.php` - WooCommerce integration

**Constants Defined**:
```php
TEKPROF_NAME      // Theme name
TEKPROF_VERSION   // Theme version
TEKPROF_PATH      // Theme directory path
TEKPROF_URI       // Theme directory URI
TEKPROF_ASSETS    // Assets directory URI
TEKPROF_VENDOR    // Vendor assets URI
TEKPROF_INCLUDES  // Includes path
TEKPROF_CLASSES   // Classes path
TEKPROF_ADMIN     // Admin path
```

### Theme Assets

Assets are located in `/wp-content/themes/tekprof/assets/`:
- `css/` - Stylesheets
- `js/` - JavaScript files
- `img/` - Images
- `vendor/` - Third-party libraries

## Plugin Architecture

### Tekprof Toolkit (Custom Plugin)

**Location**: `/wp-content/plugins/tekprof-toolkit/`

This is the companion plugin for the Tekprof theme. It provides:

1. **Custom Post Types** (Portfolio)
2. **Custom Elementor Widgets** (30+ widgets)
3. **Theme Options** (via Codestar Framework)
4. **Page Metaboxes**
5. **Demo Content Import**
6. **Template Builder System**

**Constants Defined**:
```php
RT_VERSION        // Plugin version
RT_FILE           // Plugin file path
RT_PATH           // Plugin directory path
RT_URL            // Plugin directory URL
RT_ASSETS         // Plugin assets URL
RT_INCLUDES       // Includes path
RT_ELEMENTOR      // Elementor widgets path
RT_WP_WIDGETS     // WP widgets path
RT_DEMO_PATH      // Demo config path
RT_THEME_ASSETS   // Reference to theme assets
```

**Plugin Structure**:
- `includes/elementor/` - Custom Elementor widgets and addon system
- `includes/helper/` - Helper classes, options, metaboxes
- `includes/post-type/` - Custom post types (Portfolio)
- `includes/template-builder/` - Template builder system
- `includes/wp-widgets/` - WordPress widgets
- `includes/demo-config/` - Demo import configuration
- `includes/library/` - Third-party libraries (Codestar Framework, TGM Plugin Activation)

### Custom Elementor Widgets

The toolkit provides 30+ custom Elementor widgets in the "Tekprof Elements" category:

**Section Widgets**: Header, Banner, Footer (Top, About, Nav, Contact, Newsletter, Shape, Copyright)
**Content Widgets**: About, Service, Service Details, Team, Team Details, Portfolio, Portfolio Details, Recent Post, Latest Work
**Interactive Widgets**: Funfact, Features, Why Choose Us, Working Process, Testimonial, FAQ, Pricing, Skills, Experience
**Utility Widgets**: Call to Action, Video, Sliding Text, Sponsors, Contact, Newsletter, Social Icon, Integrating

All widgets are registered in `/wp-content/plugins/tekprof-toolkit/includes/elementor/class-elementor-addon.php`

## Key Plugins Installed

- **Elementor** + **Elementor Pro** - Page builder (primary design tool)
- **Contact Form 7** - Form handling
- **WooCommerce** - E-commerce functionality
- **Breadcrumb NavXT** - Breadcrumb navigation
- **One Click Demo Import** - Demo content import
- **Duplicator Pro** - Site backup/migration
- **Duplicate Page** - Page duplication utility
- **WP File Manager Pro** - File management

## Development Workflow

### Working with Theme Files

**For minor customizations**: Use the child theme at `/wp-content/themes/tekprof-child/`
- Override parent templates by copying to child theme
- Add custom functions to `functions.php`
- Add custom styles to `style.css`

**For major modifications**: Edit parent theme files directly in `/wp-content/themes/tekprof/`

### Working with Elementor Widgets

Custom widgets are located in: `/wp-content/plugins/tekprof-toolkit/includes/elementor/widgets/`

To add a new widget:
1. Create widget file in the widgets directory
2. Include it in `class-elementor-addon.php` (line 60+)
3. Register it in the `init_widgets()` method (line 96+)

Widget templates are in: `/wp-content/plugins/tekprof-toolkit/includes/elementor/templates/`

### Theme Options & Metaboxes

Theme options use the **Codestar Framework** and are defined in:
- `/wp-content/plugins/tekprof-toolkit/includes/helper/class-options.php`
- `/wp-content/plugins/tekprof-toolkit/includes/helper/class-metaboxes.php`

Access theme options in templates using: `Tekprof_Helper::get_option('option_name', 'default')`
Access page meta using: `Tekprof_Helper::get_meta('tekprof_page_meta', 'meta_key')`

### Image Sizes

Custom image sizes registered in theme:
- `tekprof_850x470` - Standard blog post thumbnail
- `tekprof_1290x620` - Full-width featured images
- `tekprof_100x80` - Small thumbnails

### Elementor Configuration

Default Elementor settings are configured on theme activation (in `class-setup.php:149`):
- Color schemes disabled (custom colors enabled)
- Typography schemes disabled
- Container experiment enabled
- Nested elements enabled
- Additional custom breakpoints enabled
- Font Icon SVG disabled

### WooCommerce Integration

WooCommerce sidebar is removed on shop/cart/checkout pages (see `functions.php:76`)
Custom WooCommerce functionality is in `/wp-content/themes/tekprof/includes/classes/class-woocommerce.php`

## File Locations Reference

**Theme Templates**:
- Archive: `/wp-content/themes/tekprof/archive.php`
- Single Post: `/wp-content/themes/tekprof/single.php`
- Single Page: `/wp-content/themes/tekprof/page.php`
- Search: `/wp-content/themes/tekprof/search.php`
- 404: `/wp-content/themes/tekprof/404.php`
- Template Parts: `/wp-content/themes/tekprof/template-parts/`

**Configuration**:
- WordPress config: `/wp-config.php`
- Theme functions: `/wp-content/themes/tekprof/functions.php`
- Child theme functions: `/wp-content/themes/tekprof-child/functions.php`

**Assets**:
- Theme CSS: `/wp-content/themes/tekprof/assets/css/`
- Theme JS: `/wp-content/themes/tekprof/assets/js/`
- Plugin CSS/JS: `/wp-content/plugins/tekprof-toolkit/assets/`

## Namespace Structure

The codebase uses PHP namespaces:
- Theme classes: `TekprofTheme\Classes\`
- Plugin Elementor addon: `TekprofToolkit\ElementorAddon\`
- Widgets namespace: `TekprofToolkit\ElementorAddon\Widgets\`

## Important Notes

- The theme requires PHP 7.0+
- Tested up to WordPress 6.8
- Child theme is active - always check child theme first when looking for overrides
- The Tekprof Toolkit plugin is tightly coupled to the theme and required for full functionality
- Gutenberg block editor for widgets is disabled
- The site uses maintenance mode functionality (configured in toolkit plugin)
