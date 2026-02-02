# 📸 Photography Portfolio Website

A professional, high-end photography portfolio website built with **Laravel 11**, **FilamentPHP v3**, and **Tailwind CSS**. Designed with a minimalist aesthetic inspired by 'Tilly Rose Creative'.

## 🚀 Tech Stack

- **Framework:** Laravel 11
- **Admin Panel:** FilamentPHP v3
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** MySQL
- **Media Management:** Spatie Media Library
- **Icons:** Heroicons

## ✨ Key Features

- **Masonry Gallery Layout:** Elegant, responsive grid layout for portfolio showcases.
- **Admin Dashboard:** Full control over content via Filament Admin Panel.
- **Video Integration:** Support for embedding **YouTube**, **Vimeo**, and **Instagram Reels**.
- **Location Mapping:** Google Maps Embed support for project locations.
- **Automatic Image Optimization:** Handles image resizing and thumbnail generation automatically.
- **Dynamic Settings:** Change site name, social media links, and contact info directly from the dashboard.

## 🖼️ Screenshots

*(Silakan ganti bagian ini nanti dengan link gambar screenshot asli website Anda)*
- **Home Page:** ![Home](https://via.placeholder.com/800x400?text=Home+Page+Screenshot)
- **Project Detail:** ![Detail](https://via.placeholder.com/800x400?text=Project+Detail+Screenshot)
- **Admin Panel:** ![Admin](https://via.placeholder.com/800x400?text=Admin+Panel+Screenshot)

---

## 🛠️ Installation Guide (Step-by-Step)

Follow these instructions to set up the project on your local machine.

### 1. Clone the Repository
```bash
git clone [https://github.com/geardosimamora/laravel-photography-portfolio.git](https://github.com/geardosimamora/laravel-photography-portfolio.git)
cd laravel-photography-portfolio

2. Install Dependencies
Install PHP and Node.js dependencies:

Bash
composer install
npm install && npm run build
3. Environment Setup (⚠️ CRITICAL STEP)
Create your environment file:

Bash
cp .env.example .env
Generate the application encryption key:

Bash
php artisan key:generate
🔴 IMPORTANT CONFIGURATION: Open the .env file in your text editor and update these settings:

Database: Create a new database (e.g., photography_db) and update the DB settings.

App URL: You MUST change APP_URL to match your local server address exactly. If you use php artisan serve, it is usually http://127.0.0.1:8000.

Cuplikan kode
APP_NAME="Furqon Harkesa Photography"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=[http://127.0.0.1:8000](http://127.0.0.1:8000)  <-- CHANGE THIS from localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=photography_db     <-- CHANGE THIS
DB_USERNAME=root
DB_PASSWORD=
4. Database Migration
Create the tables in your database:

Bash
php artisan migrate
5. Create Storage Link (Required for Images)
This connects your public folder to the storage folder. Without this, images will be broken.

Bash
php artisan storage:link
6. Create Admin User
Create a login for the Filament Admin Panel:

Bash
php artisan make:filament-user
(Follow the prompts to enter Name, Email, and Password)

7. Run the Application
Start the local development server:

Bash
php artisan serve
Frontend: Visit http://127.0.0.1:8000

Admin Panel: Visit http://127.0.0.1:8000/admin

❓ Troubleshooting
Issue: Images are broken / not showing
If your uploaded images appear as broken icons:

Check APP_URL: Open .env and ensure APP_URL is set to http://127.0.0.1:8000.

Clear Config: Run php artisan config:clear.

Check Symlink: Run php artisan storage:link. If it says it exists, try deleting the public/storage folder manually and running the command again.

Issue: "Vite manifest not found"
Run the build command to generate assets:

Bash
npm run build
📄 License
The MIT License (MIT).


### Cara Update ke GitHub:

Setelah Anda menyimpan file di atas di folder project asli (`D:\laragon\www\photography-website`), jalankan perintah ini di terminal VS Code:

```bash
git add README.md
git commit -m "Update README with complete installation guide"
git push