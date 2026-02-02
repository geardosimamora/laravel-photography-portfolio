# 🚀 Deployment Guide - Carousel Feature

**Feature:** Instagram-Style Photo Carousel  
**Version:** 1.0  
**Last Updated:** January 29, 2026  

---

## 📋 Pre-Deployment Checklist

### Step 1: Local Testing (on your machine)
```
☐ Test on Chrome/Firefox/Safari
☐ Test on mobile browser (iOS/Android)
☐ Test carousel auto-play
☐ Test manual navigation (arrows)
☐ Verify photo counter displays
☐ Check responsive design
☐ Test image loading speed
☐ Verify no console errors (F12)
```

### Step 2: Code Review
```
☐ Review modified files:
  ☐ resources/views/layout.blade.php
  ☐ resources/views/welcome.blade.php
  ☐ resources/views/portfolio/detail.blade.php
  ☐ resources/views/portfolio/category.blade.php
☐ Verify no syntax errors
☐ Check Git diff looks clean
```

### Step 3: Database Verification
```
☐ No database migrations needed (safe!)
☐ Existing photos already compatible
☐ Test with existing portfolio items
☐ Upload new photos and test carousel
```

---

## 📤 Deployment Steps

### Option A: Using Git (Recommended)

```bash
# 1. On your local machine, commit changes
git add .
git commit -m "Add Instagram-style carousel feature"

# 2. Push to remote repository
git push origin main

# 3. On production server
cd /path/to/photography-website

# 4. Pull latest changes
git pull origin main

# 5. Clear cache (important!)
php artisan cache:clear
php artisan config:cache
php artisan view:cache

# 6. Done! 🎉
```

### Option B: Manual Upload (FTP/SFTP)

```
1. Download modified files locally
2. Connect to server via FTP/SFTP
3. Upload to server:
   - resources/views/layout.blade.php
   - resources/views/welcome.blade.php
   - resources/views/portfolio/detail.blade.php
   - resources/views/portfolio/category.blade.php

4. SSH into server:
   php artisan cache:clear
   php artisan config:cache
   php artisan view:cache

5. Verify on production URL
```

### Option C: Using Laravel Deployment Tools

```bash
# If using Laravel Forge/Envoyer
# (recommended for professional hosting)

# 1. Push to GitHub
git push origin main

# 2. Forge auto-deploys via webhook
# 3. Automatically runs cache clearing
# 4. Website updates instantly

# No manual intervention needed!
```

---

## ✅ Post-Deployment Verification

### Step 1: Check File Deployment
```bash
# SSH into server and verify files
ls -la resources/views/layout.blade.php
ls -la resources/views/welcome.blade.php
ls -la resources/views/portfolio/detail.blade.php
ls -la resources/views/portfolio/category.blade.php

# Should show recent modification time
```

### Step 2: Test on Production

**Open in browser:**
```
https://your-photography-site.com
```

Verify:
- ☐ Homepage loads without errors
- ☐ Carousel appears on homepage
- ☐ Click on category link
- ☐ Category gallery loads with carousels
- ☐ Click on project detail
- ☐ Detail carousel loads with arrows
- ☐ Browser console clean (F12)

### Step 3: Mobile Testing

**Test on real devices:**
```
☐ iPhone 12/13/14/15
☐ Android phone (Samsung/Pixel)
☐ iPad/Tablet
☐ Verify touch/swipe works
☐ Verify responsive layout
```

### Step 4: Performance Check

```bash
# Check page load time
# Open DevTools (F12) → Network tab
# Reload page and check:

☐ Total load time < 3 seconds
☐ Images load properly
☐ No 404 errors
☐ CDN files load (Splide library)
☐ No console errors/warnings
```

---

## 🔍 Troubleshooting Deployment

### Issue: Carousel not showing

**Check 1: Cache not cleared**
```bash
# SSH into server
php artisan cache:clear
php artisan config:cache
php artisan view:cache

# Hard refresh browser (Ctrl+Shift+R)
```

**Check 2: Files not uploaded**
```bash
# Verify files exist
ls -la resources/views/portfolio/detail.blade.php

# If not, re-upload via FTP
```

**Check 3: CDN not loading**
```bash
# Open browser console (F12)
# Check Network tab
# Look for splide.min.js and splide.min.css

# If not loading:
- Check internet connection
- Check firewall rules
- Verify CDN URL is correct
```

### Issue: Images not displaying

**Check 1: Storage linked**
```bash
# Verify storage symlink
php artisan storage:link

# Should output:
# "The [public/storage] directory has been successfully linked."
```

**Check 2: File permissions**
```bash
# SSH into server
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Restart web server
sudo systemctl restart php-fpm
```

**Check 3: Media library**
```bash
# Check if images in database
php artisan tinker
>>> App\Models\Portfolio::first()->getMedia('default');
>>> exit
```

### Issue: Slow loading

**Check 1: Image optimization**
```bash
# Images should be WebP format
# Check in storage/app/media/

# If not optimized:
- Re-upload images
- Use TinyPNG before uploading
- Optimize server settings
```

**Check 2: Enable gzip compression**
```
# In .htaccess (Apache)
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml
</IfModule>

# Or nginx.conf (Nginx)
gzip on;
gzip_types text/plain text/css application/json;
```

**Check 3: CDN caching**
```
# Use CloudFlare or similar
# Can reduce load by 50%+
```

---

## 🎯 Rollback Plan (If needed)

If something goes wrong, you can revert:

```bash
# Via Git (recommended)
git revert HEAD~1
git push origin main

# Or restore from backup
# Contact your hosting provider
```

---

## 📊 Monitoring After Deployment

### Google Analytics
```
1. Track session duration
2. Monitor bounce rate
3. Check pages per session
4. Verify mobile vs desktop ratio
```

### Error Monitoring
```
# Check server logs
tail -f storage/logs/laravel.log

# Monitor for errors
grep ERROR storage/logs/laravel.log

# Check 404s
grep 404 storage/logs/laravel.log
```

### Performance Monitoring
```
# Use tools:
- Google PageSpeed Insights
- GTmetrix
- Lighthouse (built into Chrome)

# Aim for:
- Lighthouse Score: 80+
- Page load: <2 seconds
- First Contentful Paint: <1.5s
```

---

## 🔐 Security Checks

### Step 1: File Permissions
```bash
# Set correct permissions
chmod 644 resources/views/*.blade.php
chmod 644 resources/views/portfolio/*.blade.php

# Verify
ls -la resources/views/layout.blade.php
```

### Step 2: No Secrets Exposed
```bash
# Verify no API keys in code
grep -r "secret\|password\|token" resources/views/

# Should return nothing
```

### Step 3: CDN Security
```
# Splide.js is from reputable CDN
# jsDelivr - trusted worldwide CDN
# No additional security needed
```

---

## 📈 Expected Results After Deployment

### Homepage
- ✅ 3-column grid (desktop)
- ✅ Auto-rotating carousels
- ✅ 4-second interval
- ✅ Responsive on mobile

### Category Page
- ✅ Mini carousels per item
- ✅ 3-second auto-play
- ✅ Photo counters visible
- ✅ Hover effects working

### Detail Page
- ✅ Full-width carousel
- ✅ Manual navigation arrows
- ✅ Photo counter updates
- ✅ Smooth transitions

---

## 🎓 Deployment Best Practices

### Before Deployment
✅ Test locally first  
✅ Review all changes  
✅ Check for syntax errors  
✅ Backup current code  
✅ Schedule off-peak deployment  

### During Deployment
✅ Use version control (Git)  
✅ Deploy during low traffic  
✅ Have rollback plan ready  
✅ Monitor logs during deployment  

### After Deployment
✅ Test all functionality  
✅ Monitor error logs  
✅ Check performance metrics  
✅ Gather user feedback  
✅ Document any issues  

---

## 🆘 Support During Deployment

### Common Issues & Fixes

| Issue | Fix |
|-------|-----|
| Carousel blank | Clear cache, verify photos uploaded |
| Images not showing | Run `php artisan storage:link` |
| Arrows not visible | Check CSS loaded, hard refresh |
| Slow loading | Optimize images, enable gzip |
| Console errors | Check browser console, review code |

### Getting Help

1. **Check Documentation**
   - CAROUSEL_FEATURES.md (technical)
   - ADMIN_GUIDE_CAROUSEL.md (usage)
   - TROUBLESHOOTING.md (issues)

2. **Check Logs**
   - `storage/logs/laravel.log`
   - Browser console (F12)
   - Server error logs

3. **Contact Support**
   - Your hosting provider
   - Laravel community
   - Splide.js documentation

---

## 📋 Final Deployment Checklist

```
Pre-Deployment:
☐ All local testing complete
☐ Code reviewed and approved
☐ Backup created
☐ Deployment window scheduled
☐ Team notified

Deployment:
☐ Files uploaded/pushed
☐ Cache cleared
☐ Database verified
☐ No errors in logs

Post-Deployment:
☐ Functionality tested
☐ Performance verified
☐ Mobile testing passed
☐ Error logs clear
☐ Analytics tracking

Success:
☐ Feature live and working
☐ Users can upload photos
☐ Carousels displaying
☐ Performance acceptable
☐ No issues reported
```

---

## 🎉 Deployment Complete!

Once all steps verified, your carousel feature is officially live! 🚀

Users can now:
- 📸 Upload multiple photos per project
- 🔄 See beautiful carousels on website
- 📱 Enjoy smooth experience on all devices
- 🎬 Browse portfolio like Instagram

---

## 📞 Post-Deployment Support

### Monitor These Metrics:
1. Page load time
2. Error rates
3. User feedback
4. Device compatibility
5. Photo upload success rate

### Regular Maintenance:
- Check logs weekly
- Monitor performance monthly
- Gather user feedback quarterly
- Plan enhancements annually

---

## 🔄 Future Enhancements (Optional)

Once base feature is stable, consider:
- Add more carousel styles
- Custom transition animations
- Photo lazy-loading
- Advanced image filters
- Social media sharing per photo

---

**Deployment Guide Version:** 1.0  
**Last Updated:** January 29, 2026  
**Status:** Ready to Deploy ✅
