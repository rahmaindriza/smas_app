# Sistem Manajemen Aset Sekolah (SMAS)

Project ini merupakan aplikasi **Sistem Manajemen Aset Sekolah (SMAS)** yang dibuat menggunakan framework **Laravel**. Aplikasi ini digunakan untuk mengelola data aset sekolah seperti laptop, proyektor, dan aset lainnya.



# Persyaratan Sistem

Sebelum menjalankan aplikasi, pastikan perangkat Anda sudah memiliki software berikut:

- PHP versi 8.1 atau lebih baru
- Composer
- Node.js dan npm
- MySQL / PostgreSQL
- Git
- Laragon



# Langkah Instalasi Project

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal.

## 1. Clone Repository

Clone repository GitHub terlebih dahulu:

```bash
git clone <link-repository-github>
git clone https://github.com/rahmaindriza/smas_app.git
```

Masuk ke folder project:

```bash
cd smas-app
```


## 2. Install Dependency Laravel

Install seluruh dependency backend Laravel dengan perintah berikut:

```bash
composer install
```


## 3. Install Dependency Frontend

Install dependency frontend yang digunakan oleh Vite:

```bash
npm install
```


## 4. Membuat File Environment

Salin file `.env.example` menjadi `.env`.

### Windows

```bash
copy .env.example .env
```

### Linux / Mac / Git Bash

```bash
cp .env.example .env
```


## 5. Generate APP_KEY

Jalankan perintah berikut untuk membuat application key Laravel:

```bash
php artisan key:generate
```


## 6. Konfigurasi Database

Buka file `.env`, lalu sesuaikan konfigurasi database dengan database lokal Anda.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smas_app
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database `smas_app` sudah dibuat terlebih dahulu.


## 7. Konfigurasi Mailer untuk resset pw
```

Rubah pada env bagian mailer dengan env ini
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=labpnp8@gmail.com
MAIL_PASSWORD=pbvxkdohkgrgylgt
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=labpnp8@gmail.com
MAIL_FROM_NAME="SMASApp"

```
## 8. Jalankan Migrasi dan Seeder

Jalankan perintah berikut untuk membuat tabel database dan data awal:

```bash
php artisan migrate
php artisan migrate --seed
```


## 9. Membuat Storage Link

Agar gambar aset yang diupload dapat tampil di browser, jalankan:

```bash
php artisan storage:link
```


# 10. Menjalankan Aplikasi

Buka 2 terminal berbeda untuk menjalankan aplikasi.

## Terminal 1 — Menjalankan Laravel Server

```bash
npm run dev
```

Perintah ini digunakan untuk menjalankan asset frontend seperti CSS dan JavaScript.


## Terminal 2 — Menjalankan Vite


```bash
php artisan serve
```

Setelah server berhasil dijalankan, aplikasi dapat diakses melalui browser menggunakan link berikut:

```bash
http://127.0.0.1:8000/
```

Salin link tersebut lalu buka di browser seperti Google Chrome, Microsoft Edge, atau Firefox.


# 11. Aplikasi Berhasil Dijalankan

Jika semua langkah sudah dilakukan dengan benar, maka aplikasi **Sistem Manajemen Aset Sekolah (SMAS)** sudah siap digunakan melalui browser pada alamat:

```bash
http://127.0.0.1:8000/
```
