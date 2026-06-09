# e-GSJA

## Deskripsi

e-GSJA merupakan aplikasi berbasis web yang dirancang untuk membantu pengelolaan administrasi dan pelayanan gereja secara terintegrasi. Sistem ini dibangun menggunakan Laravel 12 dan MySQL untuk mempermudah pengelolaan data jemaat, jadwal ibadah, pelayanan, keuangan, berita, event, dan galeri gereja.


---

## Teknologi yang Digunakan

### Backend

* PHP 8.2+
* Laravel 12

### Frontend

* Blade Template
* Tailwind CSS
* Alpine.js
* Chart.js

### Database

* MySQL

### Library Tambahan

## Instalasi

### Clone Repository

```bash
git clone https://github.com/username/sistem-gereja.git
cd sistem-gereja
```

### Install Dependency

```bash
composer install
npm install
```

### Salin File Environment

```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Konfigurasi Database

Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_gereja
DB_USERNAME=root
DB_PASSWORD=
```

### Jalankan Migration

```bash
php artisan migrate
```

### Jalankan Seeder (Jika Ada)

```bash
php artisan db:seed
```

### Jalankan Storage Link

```bash
php artisan storage:link
```

### Build Asset Frontend

```bash
npm run build
```

atau

```bash
npm run dev
```

### Jalankan Server

```bash
php artisan serve
```

## Pengembang

Proyek Akhir ITB STIKOM AMBON

Program Studi Sistem Informasi

Tahun 2026

---

## Lisensi

Aplikasi ini dibuat untuk kebutuhan akademik dan pengembangan Sistem Informasi Manajemen Gereja.
