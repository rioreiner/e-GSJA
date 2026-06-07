# e-GSJA

## Deskripsi

e-GSJA merupakan aplikasi berbasis web yang dirancang untuk membantu pengelolaan administrasi dan pelayanan gereja secara terintegrasi. Sistem ini dibangun menggunakan Laravel 12 dan MySQL untuk mempermudah pengelolaan data jemaat, jadwal ibadah, pelayanan, keuangan, berita, event, dan galeri gereja.

Aplikasi ini menyediakan halaman publik yang dapat diakses oleh jemaat serta halaman administrator untuk mengelola seluruh data dan informasi gereja.

---

## Fitur Utama

### Halaman Publik

* Beranda gereja
* Profil gereja
* Informasi jadwal ibadah
* Daftar pelayanan gereja
* Informasi keuangan gereja
* Berita dan artikel gereja
* Event dan kegiatan gereja
* Galeri foto kegiatan gereja
* Detail berita
* Detail event
* Detail jadwal pelayanan

### Halaman Admin

#### Dashboard

* Statistik jemaat
* Statistik keuangan
* Ringkasan data gereja

#### Manajemen Jemaat

* Tambah data jemaat
* Edit data jemaat
* Hapus data jemaat
* Restore data jemaat
* Upload foto jemaat
* Export PDF
* Export Excel

#### Manajemen Jadwal Ibadah

* Tambah jadwal
* Edit jadwal
* Hapus jadwal
* Detail jadwal

#### Manajemen Pelayanan

* Tambah data pelayanan
* Edit pelayanan
* Hapus pelayanan
* Export PDF

#### Manajemen Keuangan

* Pencatatan pemasukan
* Pencatatan pengeluaran
* Laporan keuangan
* Dashboard keuangan
* Export PDF laporan

#### Manajemen Berita

* CRUD berita
* Upload thumbnail berita
* SEO slug otomatis

#### Manajemen Event

* CRUD event
* Upload banner event
* Detail event publik

#### Manajemen Galeri

* Upload foto galeri
* Hapus foto galeri
* Tampilan galeri publik

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

* Spatie Laravel Permission
* Laravel DomPDF
* Laravel Excel
* Carbon

---

## Struktur Modul

### Public Module

* Home
* Berita
* Event
* Jadwal Ibadah
* Keuangan
* Galeri

### Admin Module

* Dashboard
* Jemaat
* Jadwal Ibadah
* Pelayanan
* Keuangan
* Berita
* Event
* Galeri

---

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

## Hak Akses

Saat ini sistem menggunakan satu role utama:

### Admin

Admin memiliki akses penuh untuk:

* Mengelola jemaat
* Mengelola jadwal ibadah
* Mengelola pelayanan
* Mengelola keuangan
* Mengelola berita
* Mengelola event
* Mengelola galeri
* Mengakses dashboard administrasi

---

## Pengujian Sistem

Metode pengujian yang digunakan adalah Black Box Testing.

Modul yang diuji:

* Login
* Dashboard
* Jemaat
* Jadwal Ibadah
* Pelayanan
* Keuangan
* Berita
* Event
* Galeri

Hasil pengujian menunjukkan seluruh fungsi utama berjalan sesuai kebutuhan pengguna.

---

## Tujuan Pengembangan

Sistem ini dikembangkan untuk:

1. Mempermudah pengelolaan data jemaat.
2. Mempermudah pengelolaan jadwal ibadah dan pelayanan.
3. Mempermudah pencatatan keuangan gereja.
4. Menjadi pusat informasi gereja yang terintegrasi.
5. Meningkatkan efisiensi administrasi gereja.

---

## Pengembang

Proyek Akhir ITB STIKOM AMBON

Program Studi Sistem Informasi

Tahun 2026

---

## Lisensi

Aplikasi ini dibuat untuk kebutuhan akademik dan pengembangan Sistem Informasi Manajemen Gereja.
