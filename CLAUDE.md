# Eagle BIM Widgets - Project Guide

## 🎯 Project Goal
Convert the static design from `eagle_bim_v3.html` into a set of custom Elementor widgets. The goal is to achieve a **pixel-perfect match** of the original design while making every piece of content **dynamic** (editable via the Elementor editor).

## 🛠 Technical Architecture
- **Framework:** WordPress + Elementor Custom Widgets.
- **Widget Location:** `/widgets/*.php`
- **Styling:** `/assets/css/*.css` (Dedicated CSS per widget).
- **Scripts:** `/assets/js/*.js` (For animations like count-up or FAQ toggles).
- **Base Class:** All widgets extend `\Elementor\Widget_Base`.

## 📏 Conversion Rules (The "How-To")
When creating or updating widgets, always follow these steps:

1.  **Design Blueprint:** Use `eagle_bim_v3.html` as the source of truth for HTML structure and CSS.
2.  **Naming Convention:**
    - Use the prefix `eb-` (Eagle BIM) for all CSS classes (e.g., `.eb-hero-title`, `.eb-btn-gold`) to avoid conflicts with theme styles.
    - Use the prefix `eagle-bim-` for widget names and categories.
3.  **Dynamic Controls:**
    - **Lists/Grids:** Use `\Elementor\Controls_Manager::REPEATER` for any section with multiple items (Services, Stats, FAQs, Testimonials).
    - **Rich Text:** Use `WYSIWYG` for titles and descriptions to allow `<em>` or `<strong>` tags.
    - **SVGs:** Provide a `TEXT` control for SVG code to allow flexibility.
    - **Links:** Use `URL` controls for all buttons and anchors.
4.  **Responsiveness:**
    - Port media queries directly from the HTML source.
    - Ensure a "Mobile First" or "Graceful Degradation" approach.
5.  **WordPress Integration:**
    - Where applicable (e.g., Projects, Blogs), pull content dynamically from WordPress Post Types (e.g., `tm_portfolio` for projects) using `get_posts`.

## 🎨 Design Tokens (CSS Variables)
All widgets must use these variables to ensure brand consistency:
- **Blues:** `--eb-blue: #687d9c;` | `--eb-blue-dk: #4a6080;` | `--eb-blue-lt: #8a9db8;`
- **Golds:** `--eb-gold: #deaa57;` | `--eb-gold-dk: #c8943d;` | `--eb-gold-lt: #ecc278;`
- **Neutrals:** `--eb-white: #ffffff;` | `--eb-off: #f8f7f5;` | `--eb-cream: #f3f1ec;`
- **Text:** `--eb-txt: #1a2233;` | `--eb-txt-mid: #4a5568;` | `--eb-txt-muted: #8a94a6;`

## 🗺 Widget Mapping
| HTML Section | Widget File | Key Feature |
| :--- | :--- | :--- |
| Hero Section | `hero-widget.php` | Animated SVG / Badges / 2 CTAs |
| Stats Bar | `stats-widget.php` | Count-up animation / Anchor link |
| Services Grid | `services-widget.php` | 11-item grid / Last item spans 2 cols |
| BIM Explainer | `bim-explainer-widget.php` | Split layout / Feature points |
| Why Us | `why-widget.php` | 3-column value props |
| Process Steps | `process-widget.php` | 5-step numbered flow |
| Industries | `industries-widget.php` | Sector-specific grid |
| Geo Coverage | `geo-coverage-widget.php` | Primary region + State grid |
| Deliverables | `deliverables-widget.php` | Highlighted items / Format chips |
| Projects | `projects-widget.php` | `tm_portfolio` integration |
| Blog | `blog-widget.php` | Latest posts integration |
| Testimonials | `testimonials-widget.php` | Quote cards |
| FAQs | `faqs-widget.php` | Accordion toggle |
| Final CTA | `final-cta-widget.php` | Primary + Ghost buttons |

## 🏗 Architectural BIM Services (Sub-page)
*These widgets are located in `/widgets/service/` and `/assets/css/service/`.*

| HTML Section | Widget File | Key Feature |
| :--- | :--- | :--- |
| Core Areas | `service-core-areas-widget.php` | Core service areas grid |
| Consulting Intro | `service-consulting-intro-widget.php` | Intro content + phase cards |
| Design Phases | `service-design-phases-widget.php` | Phase-by-phase breakdown |
| Coordination | `service-coordination-widget.php` | Interdisciplinary coord. details |
| Detailing Scope | `service-detailing-scope-widget.php` | Specialty components list |
| As-Built | `service-asbuilt-widget.php` | Record BIM documentation rows |
| Benefits | `service-benefits-widget.php` | Client outcomes grid |
| Deliverables | `service-deliverables-widget.php` | Deliverables list + CTA box |
