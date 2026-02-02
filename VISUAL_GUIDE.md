# 🎬 Visual Guide - Carousel Feature Demo

## 🏠 Homepage Carousel

```
DESKTOP VIEW (1920x1080):
┌────────────────────────────────────────────────────────────┐
│                                                            │
│  ┌──────────────────────────┐  ┌───────────────────────┐  │
│  │   PROJECT 1 - WEDDING    │  │  PROJECT 2 - WEDDING  │  │
│  │  (Carousel Auto-play)    │  │ (Carousel Auto-play)  │  │
│  │                          │  │                       │  │
│  │  [Photo 1/3 Fading]      │  │  [Photo 2/4 Fading]   │  │
│  │  Beautiful couple        │  │  Candid moment        │  │
│  │  in garden               │  │  dancing              │  │
│  │                          │  │                       │  │
│  │  Wedding - Jan 2026      │  │  Wedding - Dec 2025   │  │
│  └──────────────────────────┘  └───────────────────────┘  │
│                                                            │
│  ┌──────────────────────────┐                             │
│  │ PROJECT 3 - PREWEDDING   │                             │
│  │ (Carousel Auto-play)     │                             │
│  │                          │                             │
│  │  [Photo 1/2 Fading]      │                             │
│  │  Beach sunset            │                             │
│  │                          │                             │
│  │  Prewedding - Feb 2026   │                             │
│  └──────────────────────────┘                             │
│                                                            │
└────────────────────────────────────────────────────────────┘

MOBILE VIEW (375x667):
┌──────────────────────┐
│  PROJECT 1 - WEDDING │
│ (Carousel 4s autoplay)
│                      │
│  [Photo rotating]    │
│   Couple portrait    │
│                      │
│  Wedding - Jan 2026  │
│  3 Photos           │
└──────────────────────┘
```

### Features:
- 🔄 Auto-play every 4 seconds
- 🖼️ Grid layout (responsive)
- 📊 Photo count indicator
- 💫 Smooth fade transition

---

## 📂 Category Page Carousel

```
DESKTOP (3 COLUMNS):
┌─────────────────────┬─────────────────────┬─────────────────────┐
│   WEDDING #1        │   WEDDING #2        │   WEDDING #3        │
├─────────────────────┼─────────────────────┼─────────────────────┤
│ ┌───────────────┐   │ ┌───────────────┐   │ ┌───────────────┐   │
│ │  [Photo 1]    │   │ │  [Photo 1]    │   │ │  [Photo 1]    │   │
│ │  Auto-rotate  │   │ │  Auto-rotate  │   │ │  Auto-rotate  │   │
│ │               │   │ │               │   │ │               │   │
│ │  1 / 5 📸     │   │ │  1 / 3 📸     │   │ │  1 / 4 📸     │   │
│ └───────────────┘   │ └───────────────┘   │ └───────────────┘   │
│  Bride & Groom      │  Couple Portrait    │  Ceremony Moment    │
│  5 Photos          │  3 Photos           │  4 Photos           │
└─────────────────────┴─────────────────────┴─────────────────────┘

MOBILE (1 COLUMN):
┌──────────────────────┐
│   WEDDING #1         │
├──────────────────────┤
│  ┌────────────────┐  │
│  │  [Photo 1/5]   │  │
│  │  Auto-rotating │  │
│  │  Bride & Groom │  │
│  └────────────────┘  │
│  5 Photos            │
│                      │
│  WEDDING #2          │
│  ┌────────────────┐  │
│  │  [Photo 2/3]   │  │
│  │  Auto-rotating │  │
│  │  Couple        │  │
│  └────────────────┘  │
│  3 Photos            │
└──────────────────────┘
```

### Features:
- 🔄 Auto-play every 3 seconds
- 📍 Photo counter (bottom-right)
- 📐 Grid responsive layout
- 🖱️ Hover shows project info

---

## 🎞️ Detail Page Carousel

```
DESKTOP (Full Width):
┌───────────────────────────────────────────────────────────┐
│ ◀ Photo 1 / 5 ▶                                            │
│ ┌─────────────────────────────────────────────────────────┐│
│ │                                                         ││
│ │                  [FULL SIZE PHOTO]                     ││
│ │            Beautiful Wedding Ceremony                  ││
│ │                                                         ││
│ └─────────────────────────────────────────────────────────┘│
└───────────────────────────────────────────────────────────┘
         (Arrow hover shows - click to navigate)

GALLERY BELOW:
[Photo 1]  [Photo 2]  [Photo 3]  [Photo 4]  [Photo 5]
 (current)

MOBILE (Full Width):
┌──────────────────────┐
│ ◀ Photo 1 / 5 ▶      │
│ ┌────────────────┐   │
│ │                │   │
│ │ [FULL PHOTO]   │   │
│ │                │   │
│ └────────────────┘   │
│                      │
│  Wedding Ceremony    │
│  Bride & Groom       │
│                      │
│ [Gallery slides]     │
│ [Scroll down]        │
└──────────────────────┘
```

### Features:
- ◀ ▶ Manual navigation (arrows)
- 📍 Photo counter (updates on change)
- 🖱️ Click arrows or scroll gallery
- 🚫 No auto-play (user-controlled)

---

## 🎨 Carousel Animations

### Transition: Fade Effect
```
Photo A                Mix (800ms)              Photo B
(100%)  ────────────────────────────────────→  (100%)
Visible                Blending                 Visible

Timeline:
0ms    ┌──────────────────────┐               800ms
└──────┤   Fade Transition    ├───────────────┘
  A    │  Smooth & Elegant    │  B
```

### Arrow Behavior
```
Default (Hidden):        Hover (Visible):
┌──────────────┐        ┌──────────────┐
│              │        │  ◀    ▶      │
│  [PHOTO]     │  →→→  │ [PHOTO]      │
│              │        │              │
└──────────────┘        └──────────────┘
```

---

## 📊 Carousel States

### State 1: Loading
```
┌─────────────────┐
│   CAROUSEL      │
│   LOADING...    │
│   [spinner]     │
└─────────────────┘
(CDN loading Splide JS)
```

### State 2: Ready
```
┌─────────────────┐
│                 │
│   [PHOTO 1]     │
│   Ready to play │
│                 │
└─────────────────┘
```

### State 3: Playing
```
┌──────────────────┐
│ ◀ Photo 2/5 ▶   │
│                  │
│   [PHOTO 2]      │
│   Current slide  │
│                  │
└──────────────────┘
```

---

## 🎯 User Interactions

### Desktop User Flow
```
1. Land on Homepage
   ↓
2. See carousel grid (auto-rotating)
   ↓
3. Click on project card
   ↓
4. View full detail page with manual carousel
   ↓
5. Use arrows to browse all photos
   ↓
6. Or click "View Category" to see related items
```

### Mobile User Flow
```
1. Land on Homepage (1 column)
   ↓
2. Scroll through carousel cards
   ↓
3. Tap to view detail
   ↓
4. See full-width carousel
   ↓
5. Tap arrows or swipe to navigate
```

---

## 🎬 Animation Timeline (Detail Page)

```
Time: 0s         1s         2s         3s         4s
      ├────────────┼────────────┼────────────┼────────────┤
      
Photo 1: ▓▓▓▓▓▓▓▓▓▓ (Visible)
Fade     (Fade Start)
Photo 2:           ░░░░░░░░░░░░ (Fade In)
        (Transition 800ms)

Result: User sees smooth fade from Photo 1 → Photo 2
```

---

## 🎪 Gallery Layout Comparison

### Before (Old)
```
DESKTOP GRID:          MOBILE:
┌──┬──┬──┐            ┌──┐
│  │  │  │            │  │
├──┼──┼──┤            ├──┤
│  │  │  │            │  │
├──┼──┼──┤            ├──┤
│  │  │  │            │  │
└──┴──┴──┘            └──┘

Static photos
No carousel
Click each individually
```

### After (New)
```
DESKTOP CAROUSEL:      MOBILE:
┌──────────────┐      ┌──────┐
│ ◀ [PHOTO] ▶ │      │  ◀   ▶ │
│   1 / 5      │      │[PHOTO] │
└──────────────┘      │ 2 / 5  │
                      └──────┘

Animated carousel
Browse smoothly
Multiple photos visible simultaneously
```

---

## 🌅 Use Case Examples

### Wedding Portfolio
```
Hero Section (Photo 1)
    ↓
Couple Portrait - Shows emotion
    ↓
Ceremony Detail - Shows preparation
    ↓
Reception Moment - Shows celebration
    ↓
Candid Laughter - Shows authenticity
    ↓
Sunset Shot - Beautiful close
```

### Pre-Wedding Portfolio
```
Location Overview (Photo 1)
    ↓
Couple Pose - Classic shot
    ↓
Candid Moment - Laugh together
    ↓
Close-up Kiss - Romantic detail
    ↓
Sunset Silhouette - Artistic final
```

---

## 📱 Device-Specific Display

### iPhone 12 Mini (375px)
```
┌────────────────┐
│  CAROUSEL MIN  │  ← Full width with padding
│ Auto 4 sec     │
│                │
│ [PHOTO TALL]   │
│     1/3        │
│                │
└────────────────┘
```

### iPad Air (820px)
```
┌──────────────────────────────────┐
│      CAROUSEL MEDIUM              │
│      Auto 4 sec / Manual option   │
│                                   │
│      [PHOTO MEDIUM SIZE]          │
│            2 / 4                   │
│                                   │
└──────────────────────────────────┘
```

### Desktop Monitor (1920px+)
```
┌──────────────────────────────────────────────────────────────┐
│           CAROUSEL LARGE (Full Professional View)             │
│           Auto 4s / Manual with arrows                        │
│                                                               │
│                  [PHOTO LARGE SIZE]                           │
│                        3 / 5                                   │
│                                                               │
└──────────────────────────────────────────────────────────────┘
```

---

## ✨ Visual Enhancements

### Hover Effects
```
Default State:
┌──────────────────┐
│                  │
│   [PHOTO]        │
│                  │
└──────────────────┘

Hover State:
┌──────────────────┐
│  ◀ PHOTO INFO ▶ │
│   [PHOTO] ✨     │
│  TITLE & DATE    │
└──────────────────┘
(Arrows visible, info overlay visible)
```

### Navigation Visual
```
Arrow Default:  Arrow Hover:  Arrow Active:
    ◀              ◀☀           ◀▼
  White          White         White
  Semi-trans     Solid         Solid
  Hidden         Visible       Click feedback
```

---

## 🎭 Carousel Moods

### Romantic (Wedding)
- Slow transitions (800ms)
- Soft fade
- Cool stone colors
- Elegant typography

### Energetic (Party/Events)
- Faster transitions (600ms)
- Could add movement
- Vibrant colors
- Bold typography

### Professional (Corporate)
- Medium transitions (700ms)
- Clean layout
- Neutral colors
- Clear typography

---

## 📸 Photo Quality Expectations

### Excellent Quality
```
┌──────────────┐
│   SHARP      │
│   DETAILED   │  ← What you want
│   VIBRANT    │
│   BALANCED   │
└──────────────┘
```

### Poor Quality
```
┌──────────────┐
│   BLURRY     │
│   PIXELATED  │  ← What to avoid
│   WASHED OUT │
│   COMPRESSED │
└──────────────┘
```

### Optimization Tips
```
Before:          After Optimization:
10MB JPG    →    1.5MB WebP (90% reduction)
Unoptimized →    Crisp & Clear
```

---

## 🎉 Success Checklist - What It Should Look Like

- ✅ Carousel loads without errors
- ✅ Photos display crisp and clear
- ✅ Transitions are smooth (no jank)
- ✅ Arrows visible on hover (detail page)
- ✅ Counter updates correctly
- ✅ Mobile view is responsive
- ✅ Auto-play works on homepage
- ✅ Performance is fast (<2sec load)
- ✅ Navigation arrows responsive to clicks
- ✅ Photo order matches upload sequence

---

**Visual Guide Version:** 1.0  
**Last Updated:** January 29, 2026  
**Status:** ✅ Complete Reference
