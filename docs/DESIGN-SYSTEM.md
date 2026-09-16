# Xentia Industries Design System Specification

**Design System Version:** 1.0.0  
**Status:** Canonical & Enforced  
**Date:** September 15, 2026  
**Creative Director & UI/UX Architect:** Lead Creative Engineer  
**File Path:** `/docs/DESIGN-SYSTEM.md`  

---

## 1. Brand Identity & Aesthetic Foundation

The visual identity of Xentia Industries is directly derived from its authoritative brand mark: an engineered geometric emblem rendered in brushed steel and gold, set against an industrial dark texture.

* **Core Aesthetic:** Precision Surgical Engineering, Dark Industrial Luxury, Surgical Steel, Precision Metallic Gold, High Contrast, Micron-Level Restraint.
* **Emotional Resonance:** Trust, Surgical Sharpness, Uncompromising Reliability, German-Grade Metallurgical Pedigree.
* **Prohibited Tropes:** No generic hospital cyan/light blue; no childish cartoon illustrations; no excessive neon glow; no unbranded generic SaaS card styling.

---

## 2. Color Tokens & Semantic Palette

```
  OBSIDIAN BLACK         TITANIUM DEEP          SURFACE ELEVATED       METALLIC GOLD          SURGICAL STEEL
  #0A0A0C                #121216                #1B1C22                #D4AF37                #E5E7EB
  [Background Base]      [Card / Section Base]  [Modal / Popover]      [Primary Accent]       [Technical Text]
```

### 2.1 CSS Custom Properties (`:root`)
```css
:root {
  /* Surface & Background */
  --color-bg-deep: #0a0a0c;             /* Deepest obsidian black */
  --color-bg-base: #0e0f13;             /* Primary page background */
  --color-surface-subtle: #14151a;      /* Subtle secondary surface */
  --color-surface: #181920;             /* Standard card surface */
  --color-surface-elevated: #20222b;    /* Modals, popovers, drawers */
  --color-surface-hover: #262834;       /* Interactive hover state */

  /* Metallic Gold Palette (Logo-Matched) */
  --color-gold-deep: #aa771c;           /* Deep bronze-gold for borders & shadows */
  --color-gold-base: #d4af37;           /* Master metallic gold token */
  --color-gold-bright: #f3e5ab;         /* High-light sheen & badge accents */
  --color-gold-glow: rgba(212, 175, 55, 0.25); /* Focused button & card glow */
  --color-gold-subtle: rgba(212, 175, 55, 0.12); /* Subtle card wash */

  /* Surgical Steel & Monochromes */
  --color-steel-pure: #ffffff;          /* Pure white high-contrast text */
  --color-steel-bright: #f3f4f6;        /* Primary heading & value text */
  --color-steel-silver: #e5e7eb;        /* Secondary headings, active labels */
  --color-steel-medium: #9ca3af;        /* Body copy, technical descriptions */
  --color-steel-muted: #6b7280;         /* Footnotes, placeholders, disabled */
  --color-steel-dark: #374151;          /* Inactive dividers, faint grids */

  /* Engineered Borders */
  --color-border-subtle: rgba(255, 255, 255, 0.08); /* Hairline card boundary */
  --color-border-medium: rgba(255, 255, 255, 0.16); /* Standard card boundary */
  --color-border-gold: rgba(212, 175, 55, 0.35);    /* Featured card / focus boundary */
  --color-border-steel: rgba(229, 231, 235, 0.25);   /* Secondary action boundary */

  /* Semantic Feedback */
  --color-success: #10b981;             /* Cart added, RFQ sent, form valid */
  --color-warning: #f59e0b;             /* Low stock, custom lead time note */
  --color-error: #ef4444;               /* Form error, invalid input */
  --color-info: #3b82f6;                /* Informational guidance */

  /* Metallic Gradients */
  --grad-gold: linear-gradient(135deg, #aa771c 0%, #d4af37 50%, #f3e5ab 100%);
  --grad-gold-hover: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #ffffff 100%);
  --grad-steel: linear-gradient(135deg, #374151 0%, #9ca3af 50%, #e5e7eb 100%);
  --grad-surface: linear-gradient(180deg, rgba(28, 29, 36, 0.8) 0%, rgba(18, 19, 24, 0.95) 100%);
  --grad-scrim: linear-gradient(180deg, rgba(10, 10, 12, 0.75) 0%, rgba(10, 10, 12, 0.92) 100%);
}
```

---

## 3. Typography Scale & Hierarchy

We specify Google Fonts:
* **Display / Headings:** `'Outfit'`, sans-serif (Precision engineering, geometric clarity, ultra-modern).
* **Body / Technical Specs:** `'Inter'`, sans-serif (High legibility at small sizes, tabular figures for dimensions and prices).
* **Luxury Brand Accents:** `'Montserrat'`, sans-serif (Badges, subtitles, uppercase category pills).

```css
:root {
  --font-display: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
  --font-body: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  --font-accent: 'Montserrat', sans-serif;

  /* Type Scale */
  --text-xs: 0.75rem;     /* 12px - Badges, legal disclaimers */
  --text-sm: 0.875rem;    /* 14px - Technical specs, form labels */
  --text-base: 1rem;       /* 16px - Standard body copy */
  --text-lg: 1.125rem;    /* 18px - Subheadings, card titles */
  --text-xl: 1.25rem;     /* 20px - Section subheads, product titles */
  --text-2xl: 1.5rem;     /* 24px - Section headers (mobile) */
  --text-3xl: 1.875rem;   /* 30px - Section headers (tablet) */
  --text-4xl: 2.25rem;    /* 36px - Section headers (desktop) */
  --text-5xl: 3rem;       /* 48px - Hero sub-displays */
  --text-6xl: 3.75rem;    /* 60px - Hero primary display */

  /* Line Heights */
  --leading-tight: 1.15;
  --leading-snug: 1.3;
  --leading-normal: 1.5;
  --leading-relaxed: 1.65;
}
```

---

## 4. Spacing Scale (8px Strict Scale)

```css
:root {
  --space-1: 0.25rem;   /* 4px */
  --space-2: 0.5rem;    /* 8px */
  --space-3: 0.75rem;   /* 12px */
  --space-4: 1rem;      /* 16px */
  --space-6: 1.5rem;    /* 24px */
  --space-8: 2rem;      /* 32px */
  --space-12: 3rem;     /* 48px */
  --space-16: 4rem;     /* 64px */
  --space-24: 6rem;     /* 96px */
  --space-32: 8rem;     /* 128px */
}
```

---

## 5. Container System & Breakpoints

* **Mobile:** `< 640px` (Full bleed with `16px` padding, 1-column layouts, sticky bottom actions).
* **Tablet:** `640px - 1024px` (2-column grids, `24px` padding).
* **Desktop:** `1024px - 1280px` (3/4-column grids, `32px` padding, max-width `1200px`).
* **Wide Desktop:** `> 1280px` (Max-width `1440px`, generous margins).

---

## 6. Border Radius & Elevation Matrix

```css
:root {
  --radius-xs: 4px;     /* Badges, micro tags */
  --radius-sm: 8px;     /* Form inputs, buttons */
  --radius-md: 12px;    /* Product cards, standard containers */
  --radius-lg: 16px;    /* Modals, featured hero cards */
  --radius-pill: 9999px;/* Category chips, status indicators */

  /* Shadows */
  --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.4);
  --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.5), 0 0 1px var(--color-border-subtle);
  --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.7), 0 0 1px var(--color-border-gold);
  --shadow-gold: 0 0 24px rgba(212, 175, 55, 0.25);
}
```

---

## 7. Component Style Rules

### 7.1 Buttons
* **Primary (Metallic Gold):** Background `var(--grad-gold)`, text `#0a0a0c` (bold, uppercase, letter-spacing `0.05em`), border `none`, hover: background `var(--grad-gold-hover)` + `box-shadow: var(--shadow-gold)`.
* **Secondary (Brushed Steel):** Background `transparent`, border `1px solid var(--color-steel-silver)`, text `var(--color-steel-silver)`, hover: background `rgba(255,255,255,0.08)`, border-color `var(--color-gold-base)`.
* **Quote / RFQ (Ghost Gold):** Border `1px solid var(--color-gold-base)`, text `var(--color-gold-base)`, background `var(--color-gold-subtle)`.

### 7.2 Product Cards
* Uncropped image presentation on subtle neutral-dark backing.
* Title in `var(--color-steel-bright)`.
* Sub-specialty tag / clinical category pill in `var(--color-gold-base)`.
* Dual action buttons: "Quick Add Sample" + "Custom Quote".

### 7.3 Form Inputs
* Background: `#14151a`.
* Border: `1px solid rgba(255, 255, 255, 0.12)`.
* Focus: `border-color: var(--color-gold-base)`, `outline: none`, `box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.2)`.

---

## 8. Accessibility & WCAG Compliance Standards

1. **Contrast Ratio:** All primary text achieves at least **7:1** (AAA standard against `#0a0a0c`). Accent gold on dark surfaces achieves **> 4.5:1**.
2. **Focus Rings:** Visible focus ring on all interactive controls (`outline: 2px solid var(--color-gold-base); outline-offset: 2px;`).
3. **Motion Safety:** All transitions and keyframe animations must be conditionally wrapped:
   ```css
   @media (prefers-reduced-motion: reduce) {
     *, *::before, *::after {
       animation-duration: 0.01ms !important;
       animation-iteration-count: 1 !important;
       transition-duration: 0.01ms !important;
       scroll-behavior: auto !important;
     }
   }
   ```
