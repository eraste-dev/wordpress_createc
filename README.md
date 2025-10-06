# Tekprof - Web Design & SEO WordPress Theme

A professional WordPress theme built for web design agencies, SEO companies, and digital marketing businesses. Features a powerful Elementor-based page builder with 30+ custom widgets.

## 🚀 Features

- **Custom Elementor Widgets** - 30+ professional widgets for building stunning pages
- **WooCommerce Ready** - Full e-commerce integration
- **Responsive Design** - Mobile-first, fully responsive layout
- **SEO Optimized** - Built with SEO best practices
- **One-Click Demo Import** - Get started quickly with pre-built demos
- **Portfolio System** - Custom post type for showcasing work
- **Template Builder** - Build custom headers, footers, and page templates
- **Child Theme Included** - Safe customization support
- **RTL Support** - Translation ready with .pot file included
- **Performance Optimized** - Clean, efficient code

## 📋 Requirements

- **WordPress**: 4.5 or higher (tested up to 6.8)
- **PHP**: 7.0 or higher
- **MySQL**: 5.6 or higher
- **Elementor**: Latest version (required)

## 🛠️ Installation

### Standard Installation

1. Download the theme package
2. Go to **WordPress Admin → Appearance → Themes**
3. Click **Add New** → **Upload Theme**
4. Choose `tekprof.zip` and click **Install Now**
5. Activate the theme
6. Install and activate required plugins when prompted

### Database Setup

If setting up from scratch:

```sql
CREATE DATABASE createcgroupe_tekprof_102;
```

Update `wp-config.php` with your database credentials:

```php
define("DB_NAME", "createcgroupe_tekprof_102");
define("DB_USER", "your_username");
define("DB_PASSWORD", "your_password");
define("DB_HOST", "localhost");
```

## 🔌 Required Plugins

The following plugins are required for full functionality:

- **Tekprof Toolkit** (included) - Custom widgets and functionality
- **Elementor** - Page builder
- **Elementor Pro** - Advanced Elementor features
- **Contact Form 7** - Contact forms

### Recommended Plugins

- **WooCommerce** - For e-commerce features
- **Breadcrumb NavXT** - Breadcrumb navigation
- **One Click Demo Import** - Import demo content

## 📦 What's Included

```
tekprof/
├── assets/                 # CSS, JS, images
│   ├── css/
│   ├── js/
│   ├── img/
│   └── vendor/
├── includes/               # Core functionality
│   ├── classes/           # Theme classes
│   ├── admin/             # Admin panel
│   └── library/           # Third-party libraries
├── template-parts/        # Reusable template parts
├── languages/             # Translation files
├── functions.php          # Theme functions
├── style.css             # Main stylesheet
└── screenshot.png        # Theme screenshot

tekprof-child/            # Child theme (active)
└── functions.php
└── style.css

tekprof-toolkit/          # Companion plugin
├── includes/
│   ├── elementor/        # Custom Elementor widgets
│   ├── helper/           # Helper functions
│   ├── post-type/        # Custom post types
│   └── template-builder/ # Template builder
└── assets/
```

## 🎨 Customization

### Using Child Theme

The child theme is already active. Add customizations here:

**Custom Functions:**
```php
// In tekprof-child/functions.php
add_action('init', 'my_custom_function');
function my_custom_function() {
    // Your code here
}
```

**Custom Styles:**
```css
/* In tekprof-child/style.css */
.your-custom-class {
    color: #000;
}
```

### Theme Options

Access theme options:
- Go to **WordPress Admin → Theme Options**
- Configure logo, colors, typography, layout settings

### Page Options

Each page/post has custom metaboxes for:
- Header settings
- Footer settings
- Sidebar configuration
- Body class
- Custom CSS

## 🧩 Custom Elementor Widgets

The theme includes 30+ custom widgets:

**Layout Widgets:**
- Header
- Banner/Hero
- Footer (multiple variations)

**Content Widgets:**
- About Section
- Services Grid/Details
- Team Grid/Details
- Portfolio Grid/Details
- Blog Posts

**Interactive Elements:**
- Funfacts/Counter
- Testimonials
- FAQ Accordion
- Pricing Tables
- Skills/Progress Bars
- Working Process
- Why Choose Us

**Utility Widgets:**
- Call to Action
- Video Player
- Contact Form
- Newsletter Signup
- Social Icons
- Sponsors/Logos

## 🖼️ Custom Image Sizes

The theme registers these image sizes:

- `tekprof_850x470` - Blog thumbnails
- `tekprof_1290x620` - Full-width featured images
- `tekprof_100x80` - Small thumbnails

Regenerate thumbnails after theme activation using a plugin like **Regenerate Thumbnails**.

## 🌐 Development

### Local Development Setup (XAMPP/LAMPP)

1. Place files in: `/opt/lampp/htdocs/www/creative_agency/src/tekprof_102/`
2. Start Apache and MySQL
3. Create database
4. Access site: `http://localhost/www/creative_agency/src/tekprof_102/`

### File Structure Constants

The theme defines these constants:

```php
TEKPROF_PATH       // Theme directory path
TEKPROF_URI        // Theme directory URI
TEKPROF_ASSETS     // Assets URI
TEKPROF_INCLUDES   // Includes path
TEKPROF_CLASSES    // Classes path
```

Plugin constants:

```php
RT_PATH            // Plugin path
RT_URL             // Plugin URL
RT_ELEMENTOR       // Elementor widgets path
RT_INCLUDES        // Includes path
```

## 🔧 Troubleshooting

### Common Issues

**Elementor widgets not showing:**
- Make sure Tekprof Toolkit plugin is activated
- Check that Elementor and Elementor Pro are installed

**Demo content not importing:**
- Increase PHP memory limit to 256MB
- Increase max execution time to 300 seconds

**Images not displaying:**
- Regenerate thumbnails
- Check file permissions (755 for directories, 644 for files)

### Support

For theme support:
- Documentation: [https://wp.webtend.net/tekprof](https://wp.webtend.net/tekprof)
- Author: [WebTend on ThemeForest](https://themeforest.net/user/webtend)

## 📄 License

This theme is licensed under the GNU General Public License v3.0 or later.

- **License URI**: http://www.gnu.org/licenses/gpl-3.0.html
- **Copyright**: © 2025 WebTend/Coderstation

### Third-Party Resources

The theme uses the following third-party resources:

- **Elementor** - GPLv3
- **Codestar Framework** - GPLv3
- **TGM Plugin Activation** - GPLv2+
- **Bootstrap** (vendor) - MIT License

See individual libraries for their respective licenses.

## 📝 Changelog

### Version 1.0.2
- WordPress 6.8 compatibility
- Bug fixes and improvements
- Updated Elementor integration

### Version 1.0.0
- Initial release

## 🤝 Contributing

This is a premium theme. For customization requests or bug reports, please contact the theme author through ThemeForest.

## 👨‍💻 Credits

- **Theme Author**: WebTend
- **Theme URI**: https://wp.webtend.net/tekprof
- **Author URI**: https://themeforest.net/user/webtend

---

**Note**: This is a premium WordPress theme. Please ensure you have a valid license before using it in production.
