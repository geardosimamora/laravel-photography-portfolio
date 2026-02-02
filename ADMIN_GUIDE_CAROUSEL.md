# 📖 Panduan Penggunaan Carousel untuk Admin

## 🎯 Apa itu Carousel?

Carousel (atau slider) adalah fitur yang memungkinkan Anda menampilkan **multiple photos dalam satu project**. Pengunjung website bisa:
- Slide through photos seperti Instagram
- Melihat preview mini sebelum membuka detail
- Menikmati transisi smooth yang menarik

---

## 🚀 Cara Upload Multiple Photos

### Via Filament Admin Dashboard

1. **Login ke Filament Admin**
   - Buka `http://your-site.com/admin`
   - Login dengan akun admin

2. **Buka Portfolio Gallery**
   - Menu kiri → Click "Portfolio Gallery"
   - Atau klik "Create" untuk project baru

3. **Upload Multiple Photos**
   
   **Bagian "Gallery Images":**
   - Klik area upload atau drag-drop photos
   - Pilih multiple files sekaligus
   - Tunggu semuanya upload

4. **Edit Order (Optional)**
   - Drag photos untuk atur urutan
   - Urutan pertama jadi Hero Image
   - Urutan 2-onwards jadi Gallery Carousel

5. **Save**
   - Klik tombol "Save" di bawah
   - Photos sudah terslide di website

---

## 💡 Best Practices

### Jumlah Photos yang Optimal
- **Minimum**: 1 photo (tapi carousel tidak muncul)
- **Ideal**: 3-5 photos per project
- **Maximum**: Unlimited (tapi >20 bisa slow loading)

### Tips Ordering

**Untuk Wedding Photos:**
```
1. [Hero] Couple portrait close-up
2. [Gallery] Ceremony moment
3. [Gallery] Reception highlight
4. [Gallery] Candid emotional moment
5. [Gallery] Group/detail shot
```

**Untuk Pre-wedding:**
```
1. [Hero] Outdoor location overview
2. [Gallery] Couple laughing together
3. [Gallery] Close-up romantic moment
4. [Gallery] Fun/playful shot
5. [Gallery] Sunset/silhouette shot
```

---

## 📸 Format & Size Recommendations

| Aspect | Rekomendasi | Why? |
|--------|-------------|------|
| **Dimension** | 1920x1280 (4:3) atau 1920x1440 (4:3) | Optimal untuk web |
| **File Size** | Max 5MB per image | Faster loading |
| **Format** | JPG/JPEG | Compress terbaik |
| **Color Profile** | sRGB | Browser compatible |

### Cara Resize Sebelum Upload:
- Mac/Linux: `ImageMagick` atau Preview
- Windows: IrfanView atau Paint.NET
- Online: `tinypng.com` atau `imageoptim.com`

---

## 🎬 Carousel Preview

### Di Homepage
```
[Grid View]
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│  Project 1  │  │  Project 2  │  │  Project 3  │
│ (3 photos)  │  │ (5 photos)  │  │ (2 photos)  │
│   Auto-play │  │   Auto-play │  │   Auto-play │
│  4 sec each │  │  4 sec each │  │  4 sec each │
└─────────────┘  └─────────────┘  └─────────────┘
```

### Di Category Page
```
[Grid View dengan mini carousel]
┌──────────────────────┐
│   Photo 1/3 ▶        │
│   (Rotating)         │
│   📸 Project Title   │
│   Wedding - Jan 2026 │
└──────────────────────┘
```

### Di Detail Page
```
[Full Width Carousel]
┌────────────────────────────────┐
│                                │
│        Photo 1 / 5             │ ◀ Navigasi Manual
│   (Hero Image Besar)           │
│                                │ ▶
└────────────────────────────────┘

[Slide Gallery]
[Photo 1]  [Photo 2]  [Photo 3]
[Photo 4]  [Photo 5]
```

---

## ⚙️ Image Editor Features (Di Filament)

Saat upload photo, Anda bisa:

1. **Crop** - Potong ukuran foto
   - Free crop (custom size)
   - 16:9 (landscape)
   - 4:3 (landscape)
   - 1:1 (square)
   - 9:16 (portrait)

2. **Rotate** - Putar foto
   - 90° CW
   - 90° CCW
   - Flip horizontal
   - Flip vertical

3. **Zoom** - Perbesar/perkecil

**Tips:**
- Jangan rotate jika foto sudah portrait/landscape
- Use 16:9 untuk consistency
- Crop dengan generous margins

---

## 🔍 Troubleshooting

### ❌ Carousel tidak muncul di website
**Solution:**
- ✅ Upload minimal 2 photos
- ✅ Check photos sudah processed (bukan pending)
- ✅ Hard refresh browser (Ctrl+F5)

### ❌ Photos blur atau quality jelek
**Solution:**
- ✅ Upload original size (min 1920px width)
- ✅ Gunakan JPG bukan PNG
- ✅ Check image compression di Filament editor

### ❌ Slide terlalu cepat/lambat
**Solution:**
- This bukan user setting - hubungi developer
- Homepage: 4 detik per slide
- Category: 3 detik per slide
- Detail: Manual (tidak auto)

### ❌ Arrow buttons tidak muncul
**Solution:**
- ✅ Arrows hanya di detail page (tidak di category)
- ✅ Hover untuk show arrows
- ✅ Try refresh page

---

## 📱 Mobile Experience

### Mobile Users Lihat:

**Homepage:**
- Full width carousel
- Auto-play continues
- Landscape untuk 3+ cols becomes 1 col

**Category:**
- 1 column grid
- Still auto-rotating carousel
- Touch support (swipe to next)

**Detail:**
- Full width carousel
- Manual navigation (arrows)
- Touch swipe supported

---

## 🎨 Customization (Developer Only)

Untuk ubah timing/behavior:

**File:** `resources/views/layout.blade.php`

```javascript
// Homepage carousel timing
interval: 4000,  // 4000ms = 4 detik

// Category carousel timing
interval: 3000,  // 3000ms = 3 detik

// Detail carousel speed
speed: 800,      // 800ms transition
```

---

## 💾 Backup & Safety

**Important:**
- Filament auto-saves ke database
- Original images disimpan di `storage/app/media/`
- Conversions (thumb, large) di-generate otomatis

**Jangan lakukan:**
- ❌ Delete files dari server manually
- ❌ Rename media folders
- ❌ Edit database directly

---

## 📊 FAQ

**Q: Bisa pakai 30+ photos per project?**  
A: Technically yes, tapi recommend max 15 untuk page speed.

**Q: Bisa duplicate carousel style di page lain?**  
A: Yes, tapi need developer untuk implement.

**Q: Bisa set different timing per project?**  
A: Not currently - all use default timing.

**Q: Bisa add music/sound ke carousel?**  
A: Not recommended untuk website. Use video untuk audio.

**Q: Bisa disable autoplay?**  
A: Detail page already manual. Category/homepage autoplay intentional.

---

## 🆚 Comparison: Before vs After

| Feature | Before | After |
|---------|--------|-------|
| Photos per project | 1 (hero only) | Unlimited |
| Reordering photos | Manual DB edit | Drag & drop |
| Photo preview | Grid 2-3 cols | Mini carousel |
| Detail page gallery | Grid layout | Full carousel |
| Mobile experience | Static images | Smooth slider |
| Loading speed | Static images | WebP + lazy load |

---

## 📞 Support

Jika ada issue:

1. **Check console errors** - F12 → Console tab
2. **Verify photos uploaded** - Check in Filament
3. **Try hard refresh** - Ctrl+Shift+R
4. **Check storage folder** - `storage/app/media/`
5. **Contact developer** - Include screenshot & error message

---

**Version:** 1.0  
**Last Updated:** January 29, 2026  
**Status:** ✅ Ready to Use
