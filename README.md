# GovPress - Professional Government WordPress Theme

## Overview

GovPress is an enterprise-standard WordPress theme designed specifically for government and public-sector websites. Built with accessibility (WCAG 2.1 AA), performance, and security as core principles, it provides a professional, responsive design system inspired by GOV.UK standards.

**Version:** 2.0.0  
**License:** GNU General Public License v2 or later  
**Text Domain:** govpress

---

## Features

### Core Functionality
- **Responsive Design** - Mobile-first approach for all devices
- **Accessibility First** - WCAG 2.1 AA compliant with semantic HTML5
- **Performance Optimized** - Lazy loading, critical CSS, optimized assets
- **Security Hardened** - Security headers, input sanitization, proper escaping

### Custom Post Types
- **Notices** - Important announcements and alerts
- **Publications** - Downloadable documents and resources
- **Press Releases** - Official news and media updates
- **Documents** - Organized document library with custom types

### Custom Taxonomies
- **Departments** - Organize content by government departments
- **Document Types** - Categorize documents (PDF, Report, etc.)

### Gutenberg Blocks
- **Alert Notice Block** - Styled alerts with multiple types (info, warning, error, success)
- **Download Document Block** - Display downloadable files with metadata
- **Service Card Block** - Feature government services
- **Announcement Banner Block** - Prominent announcements

### Advanced Features
- **Custom Navigation Walker** - Accessible, semantic menu rendering
- **Block Patterns** - Pre-built layouts for common use cases
- **Reusable Blocks** - Save time with component library
- **Multiple Widget Areas** - Sidebar + 3 footer widget areas

---

## Installation

1. Download the theme to your WordPress themes directory: `/wp-content/themes/govpress/`
2. Activate in WordPress Dashboard: **Appearance → Themes → GovPress**
3. Configure theme settings and menus
4. Upload your site logo in **Appearance → Customize**

---

## Configuration

### Theme Customization

Access theme settings via **Appearance → Customize**:
- **Site Identity** - Logo, tagline, and site description
- **Colors** - Brand colors matching government palette
- **Typography** - Font families and sizes
- **Menu** - Primary and footer navigation
- **Widgets** - Content areas and sidebar

### Menu Setup

1. Go to **Appearance → Menus**
2. Create new menu or edit existing
3. Add pages, categories, or custom links
4. Assign to **Primary Menu** location
5. Create footer menu separately and assign to **Footer Menu** location

### Widget Areas

**Sidebar:** Located on pages with sidebar template  
**Footer Widgets:** Three customizable footer widget areas

---

## File Structure

```
govpress/
├── 404.php                    # 404 error page template
├── archive.php                # Archive template (categories, tags, etc.)
├── footer.php                 # Footer template
├── functions.php              # Theme functions and hooks
├── header.php                 # Header template
├── index.php                  # Main template
├── page.php                   # Page template
├── style.css                  # Main stylesheet (imports)
├── theme.json                 # Modern block theme configuration
├── README.md                  # This file
├── assets/
│   ├── css/
│   │   ├── blocks.css        # Custom block styles
│   │   ├── components.css    # Reusable component styles
│   │   └── main.css          # Main theme stylesheet
│   └── js/
│       ├── blocks.js         # Custom block scripts
│       └── navigation.js      # Navigation functionality
└── template-parts/
    ├── announcement.php       # Announcement banner
    ├── breadcrumb.php        # Breadcrumb navigation
    └── document-card.php     # Document display card
```

---

## Development

### Constants

Define these in `functions.php` for easy access:

```php
GOVPRESS_VERSION     // Theme version (2.0.0)
GOVPRESS_THEME_DIR   // Theme directory path
GOVPRESS_THEME_URI   // Theme URI
GOVPRESS_INCLUDES    // Includes directory path
```

### Adding Custom Post Types

Extend the post types by modifying `govpress_register_post_types()` in `functions.php`:

```php
register_post_type('custom', [
    'labels' => ['name' => __('Custom', 'govpress')],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
]);
```

### Creating Custom Blocks

Register blocks in `govpress_register_blocks()`:

```php
register_block_type('govpress/custom-block', [
    'editor_script' => 'govpress-blocks',
    'render_callback' => 'govpress_render_custom_block',
]);
```

### Enqueuing Scripts and Styles

Use the asset constants for proper versioning:

```php
wp_enqueue_style(
    'custom-style',
    GOVPRESS_THEME_URI . '/assets/css/custom.css',
    [],
    GOVPRESS_VERSION
);
```

---

## Security & Performance

### Security Features
- **Security Headers** - XSS, clickjacking, and MIME-type protection
- **Input Sanitization** - All user input validated and escaped
- **Output Escaping** - All output properly escaped for context
- **Permissions** - Proper capability checks throughout
- **Nonce Verification** - CSRF protection for forms
- **CSP Support** - Content Security Policy headers

### Performance Optimization
- **Lazy Loading** - Images load on demand
- **Critical CSS** - Inline above-the-fold styles
- **Asset Versioning** - Cache busting with version numbers
- **Conditional Loading** - Scripts/styles load only when needed
- **Minification** - CSS and JavaScript optimized
- **Block Theme Support** - Full modern WordPress block theme features

---

## Accessibility

GovPress is designed to meet WCAG 2.1 AA standards:

- **Semantic HTML** - Proper heading hierarchy and landmarks
- **ARIA Attributes** - Enhanced screen reader support
- **Keyboard Navigation** - Full keyboard accessibility
- **Focus Indicators** - Clear focus states throughout
- **Color Contrast** - WCAG AA compliant color ratios
- **Skip Links** - Quick navigation for keyboard users
- **Accessible Navigation** - Custom menu walker with aria-current support
- **Form Labels** - Proper label associations
- **Image Alt Text** - Semantic images have appropriate alt text

### Testing Accessibility

Use these tools to verify accessibility:
- **axe DevTools** - Browser extension for automated testing
- **WAVE** - Web accessibility evaluation tool
- **Lighthouse** - Built into Chrome DevTools
- **Screen Readers** - Test with NVDA (free) or JAWS

---

## Internationalization (i18n)

The theme is fully internationalized and ready for translation:

```php
__('Text', 'govpress')                  // Simple translation
_e('Text', 'govpress')                  // Echo translation
esc_html__('Text', 'govpress')          // Escaped translation
sprintf(__('Text %s', 'govpress'), $var) // With variables
_n($single, $plural, $count, 'govpress') // Plural forms
```

### Language Files

To add translations:
1. Create `/languages/` directory in theme
2. Use tools like Poedit to create `.po` files
3. Generate `.mo` (machine object) files
4. Activate language in WordPress

---

## Browser Support

- Chrome/Chromium (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

---

## Customization Guide

### Custom Colors

Edit the color palette in `theme.json`:

```json
"palette": [
  {
    "color": "#003366",
    "name": "Government Blue",
    "slug": "gov-blue"
  }
]
```

### Custom Fonts

Add fonts via Google Fonts integration or add custom font files:

```json
"fontFamilies": [
  {
    "fontFamily": "\"Your Font\", sans-serif",
    "name": "Your Font",
    "slug": "your-font"
  }
]
```

### Child Theme

Create a child theme for safe customizations:

```php
<?php
/**
 * Child Theme Functions
 */

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'govpress-child',
        get_stylesheet_uri(),
        ['govpress-main'],
        wp_get_theme()->get('Version')
    );
});
```

---

## Troubleshooting

### Styles Not Loading
- Clear browser cache (hard refresh with Ctrl+Shift+R)
- Check CSS file paths in Chrome DevTools
- Verify file permissions (755 for directories, 644 for files)

### JavaScript Issues
- Check browser console for errors (F12)
- Ensure jQuery is not dequeued
- Verify script dependencies are loaded

### Menu Not Displaying
- Ensure menu is assigned to a menu location
- Check if custom walker class is available
- Verify menu items have proper hierarchy

### Accessibility Issues
- Run axe DevTools scan
- Test with keyboard navigation only
- Check color contrast ratios
- Validate semantic HTML structure

---

## FAQ

**Q: Can I use GovPress for non-government sites?**  
A: Yes! While designed for government, it works great for any professional organization.

**Q: How do I add more widget areas?**  
A: Edit `govpress_widgets_init()` in `functions.php` to register additional sidebars.

**Q: Is this theme WCAG 2.1 AAA compliant?**  
A: It meets WCAG 2.1 AA standards. Achieving AAA may require additional customization based on content.

**Q: Can I use this theme with WooCommerce?**  
A: Yes, with additional styling. Consider a child theme for e-commerce specific layouts.

**Q: How often is GovPress updated?**  
A: Regular updates are released for security patches and WordPress compatibility.

---

## Support & Resources

- **WordPress Documentation** - https://developer.wordpress.org/
- **Block Editor Handbook** - https://developer.wordpress.org/block-editor/
- **WCAG Guidelines** - https://www.w3.org/WAI/WCAG21/quickref/
- **GOV.UK Design System** - https://design-system.service.gov.uk/

---

## Version History

### 2.0.0 (Current)
- Professional code standards and documentation
- Enhanced security headers and CSP support
- Modern block theme support via theme.json
- Improved accessibility with ARIA attributes
- Performance optimizations (lazy loading, critical CSS)
- Custom Navigation Walker for semantic menus
- Multiple footer widget areas
- Professional README and development guide

### 1.0.0 (Legacy)
- Initial theme release

---

## License

GovPress is licensed under the GNU General Public License v2 or later. See LICENSE file for details.

---

## Credits

**Created by:** Seyi Ajibare (oseyiajibare@gmail.com) 
**Inspired by:** GOV.UK Design System  
**Built for:** Government and Public Sector Organizations

---

**Last Updated:** 2026-02-10  
**Theme Version:** 2.0.0  
**WordPress Compatibility:** 6.0+
