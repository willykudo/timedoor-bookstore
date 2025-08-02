<<<<<<< HEAD
# Timedoor Bookstore Backend

Sebuah aplikasi backend sederhana berbasis Laravel untuk manajemen buku, penulis, dan kategori. Cocok untuk pembelajaran atau dasar pengembangan sistem katalog buku.

---

## Fitur

- CRUD lengkap untuk **Book**, **Author**, dan **Category**
- Kemampuan **seeding data massal** (hingga 100.000 records)
- Struktur kode bersih, rapi, dan mudah dikembangkan
- Dibangun menggunakan **Laravel 10+**

---

## Kebutuhan Sistem

- PHP >= 8.1
- Composer
- Database: MySQL / PostgreSQL / SQLite
- Laravel 10.x

---

## Cara Instalasi

```bash
# 1. Clone project
git clone https://github.com/your-username/timedoor-bookstore.git
cd timedoor-bookstore

# 2. Install dependencies Laravel
composer install

# 3. Copy file .env dan generate app key
cp .env.example .env
php artisan key:generate

# 4. Buat database dan sesuaikan konfigurasi .env
# Contoh: DB_DATABASE=timedoor_bookstore

# 5. Jalankan migrasi untuk membuat tabel-tabel
php artisan migrate

# 6. Jalankan seeder untuk menambahkan data awal
# (disarankan mulai dari author & category terlebih dahulu sesuai kemampuan perangkat)
php artisan db:seed

# 7. Jalankan server lokal
php artisan serve

#Struktur Folder Penting
routes/web.php — File routing utama
app/Http/Controllers/ — Berisi controller untuk logic CRUD
app/Models/ — Model data (Book, Author, Category)
database/seeders/ — Seeder untuk pengisian data awal
resources/views/ — (Jika menggunakan Blade untuk tampilan frontend)

#Catatan
Seeder disesuaikan agar tidak membebani perangkat. Uji coba bisa dilakukan dengan skala kecil terlebih dahulu.
=======
# timedoor-bookstore
>>>>>>> cd1983d8ad0bfcd7ec32d3297293d2bd3a9ad988
