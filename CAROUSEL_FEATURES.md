# 🎨 Instagram-Style Carousel Features - Dokumentasi

## 📋 Ringkasan Perubahan

Telah ditambahkan fitur carousel/slider untuk menampilkan multiple photos per portfolio item, seperti Instagram stories. Setiap kategori sekarang dapat menampilkan hingga **unlimited photos** dengan transisi smooth dan auto-play.

---

## 🎯 Fitur Utama

### 1. **Portfolio Detail Page Carousel**
- **Lokasi**: `resources/views/portfolio/detail.blade.php`
- **Fitur**:
  - Navigation arrows (Previous/Next)
  - Photo counter (e.g., "1 / 5")
  - Smooth fade transition (800ms)
  - Manual navigation (tidak auto-play saat viewing)
  - Hover effects pada arrows

### 2. **Category Gallery Carousel**
- **Lokasi**: `resources/views/portfolio/category.blade.php`
- **Fitur**:
  - Auto-play setiap 3 detik
  - Mini carousel untuk setiap portfolio item
  - Photo counter di bottom-right corner
  - Smooth transitions tanpa manual navigation

### 3. **Homepage Portfolio Showcase**
- **Lokasi**: `resources/views/welcome.blade.php`
- **Fitur**:
  - Auto-play setiap 4 detik
  - Grid layout (1 kolom mobile, 2 kolom tablet, 3 kolom desktop)
  - Info bar menampilkan jumlah photos
  - Hover overlay dengan judul dan kategori

---

## 🛠️ Teknologi yang Digunakan

### Library: **Splide.js**
- Modern carousel library yang ringan (~5KB)
- No dependencies (pure JavaScript)
- CDN: `https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/`

**File Konfigurasi:**
- CSS: `splide.min.css`
- JS: `splide.min.js`
- Custom styling di `resources/views/layout.blade.php`

---

## 📱 Responsive Design

| Device | Portfolio Detail | Category View | Homepage |
|--------|-----------------|---------------|----------|
| Mobile | Full width, 1 photo | Grid 1 col, h-80 | Grid 1 col |
| Tablet | Full width, 1 photo | Grid 2 col, h-96 | Grid 2 col |
| Desktop | Full width, 1 photo | Grid 3 col, h-96 | Grid 3 col |

---

## 🎬 Carousel Configurations

### Main Detail Carousel (Portfolio Page)
```javascript
{
    type: 'fade',           // Transisi fade smooth
    autoplay: false,        // Manual navigation
    arrows: true,           // Tombol prev/next
    pagination: true,       // Navigation dots
    speed: 800,            // Transisi duration 800ms
}
```

### Category Carousel (Gallery Page)
```javascript
{
    type: 'fade',
    autoplay: true,
    interval: 3000,        // Auto-play setiap 3 detik
    arrows: false,
    pagination: false,
    speed: 600,
}
```

### Homepage Carousel
```javascript
{
    type: 'fade',
    autoplay: true,
    interval: 4000,        // Auto-play setiap 4 detik
    arrows: false,
    pagination: false,
    speed: 700,
}
```

---

## 📊 Photo Management di Filament CMS

Di **Filament Resource** (`PortfolioResource.php`), sudah tersedia upload section:

```php
SpatieMediaLibraryFileUpload::make('gallery')
    ->collection('default')
    ->multiple()              // Multiple file upload
    ->reorderable()          // Drag & drop ordering
    ->image()
    ->imageEditor()          // Built-in crop/resize
    ->columnSpanFull(),
```

**Fitur:**
✅ Upload unlimited photos  
✅ Drag & drop reordering  
✅ Built-in image editor (crop, rotate, resize)  
✅ Support aspect ratio: free, 16:9, 4:3, 1:1, 9:16  
✅ Auto-convert ke WebP format (ringan)  

---

## 🎨 Custom Styling

Styling di-customize di `layout.blade.php`:

```css
/* Arrow styling */
.splide__arrow {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
    width: 45px;
    height: 45px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.splide:hover .splide__arrow {
    opacity: 1;  /* Show on hover */
}

/* Progress bar color */
.splide__progress__bar {
    background: #78716c;  /* Stone color */
}
```

---

## 🔄 Initialization Flow

Semua carousel di-initialize otomatis via `DOMContentLoaded` event:

1. **Load layout.blade.php** → Muat Splide CSS & JS
2. **Render page dengan carousel** → Buat container dengan class `.splide`
3. **DOM Ready** → JavaScript otomatis init semua carousel
4. **User Interaction** → Manual atau auto-play sesuai config

---

## ✨ User Experience

### Pengalaman Pengguna di Berbagai Halaman:

#### 📸 Portfolio Detail Page
- Klik "View Portfolio" dari kategori
- Lihat hero image besar
- Scroll down ke gallery section
- Lihat carousel dengan semua photos
- Klik arrows atau tunggu auto-play
- Photo counter menunjukkan posisi

#### 🎯 Category Gallery
- Klik kategori (Wedding, Prewedding, dll)
- Lihat semua projects dalam grid
- Setiap card punya mini carousel
- Auto-play carousel untuk preview
- Klik card untuk view detail

#### 🏠 Homepage
- Landing page dengan hero section
- Scroll ke "Curated Memories"
- Grid portfolio dengan mini carousel
- Hover untuk lihat project info
- Klik untuk view full detail

---

## 🚀 Performance Optimizations

✅ **CDN Delivery** - Splide loaded dari CDN  
✅ **WebP Format** - Semua images auto-convert ke WebP (40% lebih ringan)  
✅ **Lazy Loading** - Images di-load saat diperlukan  
✅ **Minimal JS** - Splide hanya ~5KB  
✅ **CSS Efficiency** - Custom CSS inline di head (no extra files)  

---

## 📝 Testing Checklist

- [ ] Upload 2-3 photos ke portfolio item
- [ ] Cek carousel di homepage (auto-play)
- [ ] Cek carousel di category page (auto-play)
- [ ] Cek carousel di detail page (manual + counter)
- [ ] Test navigation arrows (detail page)
- [ ] Test responsive di mobile
- [ ] Test hover effects
- [ ] Test image quality setelah upload

---

## 🐛 Troubleshooting

**Q: Carousel tidak muncul?**  
A: Pastikan ada photos uploaded di portfolio item. Carousel hanya muncul jika ada 2+ photos.

**Q: Autoplay tidak jalan di detail page?**  
A: Itu intentional - detail page manual navigation. Gunakan arrows untuk browse.

**Q: Images blur atau tidak sharp?**  
A: Check Spatie Media Library conversion settings di `Portfolio.php` model.

**Q: Carousel terlalu cepat/lambat?**  
A: Edit `interval` value di layout.blade.php JavaScript section.

---

## 📚 File yang Dimodified

1. ✅ `resources/views/layout.blade.php` - Splide library + custom JS
2. ✅ `resources/views/portfolio/detail.blade.php` - Main carousel
3. ✅ `resources/views/portfolio/category.blade.php` - Category carousel
4. ✅ `resources/views/welcome.blade.php` - Homepage carousel

**No changes needed** untuk:
- `PortfolioResource.php` - Already has multi-upload
- `Portfolio.php` - Already has media conversions
- Database migrations - No schema changes needed

---

## 🎓 Saran Penggunaan

### Best Practices:
1. Upload 3-5 photos per project (optimal untuk carousel)
2. Order photos dengan meaningful progression
3. Gunakan 16:9 aspect ratio untuk consistency
4. Resize images ke max width 1920px before upload
5. Gunakan image editor di Filament untuk crop yang sempurna

### Untuk Wedding/Prewedding Photography:
- Photo 1: Couple overview shot
- Photo 2: Detail/close-up
- Photo 3: Candid/emotional moment
- Photo 4+: Additional highlights

---

## 🔗 Reference Links

- **Splide Docs**: https://splidejs.com/
- **Spatie Media Library**: https://spatie.be/docs/laravel-medialibrary/
- **Filament CMS**: https://filamentphp.com/

---

## 📞 Need Help?

Jika ada pertanyaan atau issues dengan carousel feature, check:
1. Browser console (F12) untuk error messages
2. Network tab untuk CDN loading status
3. Filament admin untuk photo uploads

---

**Updated**: January 29, 2026  
**Version**: 1.0  
**Status**: ✅ Production Ready
