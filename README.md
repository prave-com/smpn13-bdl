# SMPN 13 Bandar Lampung

[![License](https://img.shields.io/github/license/kiraware/smpn13-bdl)](LICENSE)
[![Issues](https://img.shields.io/github/issues/kiraware/smpn13-bdl)](https://github.com/kiraware/smpn13-bdl/issues)
[![Pull Requests](https://img.shields.io/github/issues-pr/kiraware/smpn13-bdl)](https://github.com/kiraware/smpn13-bdl/pulls)

---

<p align="center">
  <img src="public/images/logo.png" alt="SMPN 13 Bandar Lampung Logo" width="120">
</p>

Aplikasi web Profil Sekolah SMPN 13 Bandar Lampung dibuat menggunakan Laravel untuk memberikan informasi lengkap mengenai sejarah, visi dan misi, fasilitas, kegiatan, serta prestasi yang dimiliki oleh SMPN 13 Bandar Lampung. Web ini bertujuan untuk memperkenalkan sekolah kepada masyarakat umum, orang tua siswa, dan calon siswa yang ingin mengetahui lebih banyak tentang sekolah ini.

## ✨ Features

- **Halaman Profil Sekolah**: Menampilkan informasi lengkap tentang sejarah, struktur organisasi, visi, dan misi sekolah.

- **Daftar Fasilitas**: Menginformasikan fasilitas yang tersedia di sekolah, seperti ruang kelas, laboratorium, dan area olahraga.

- **Berita Sekolah**: Menampilkan berita terkini terkait dengan kegiatan, acara, dan informasi penting lainnya seputar SMPN 13 Bandar Lampung. Pengguna dapat membaca artikel, melihat gambar terkait, dan mengetahui perkembangan terbaru di sekolah.

- **Kegiatan Sekolah**: Menyediakan informasi tentang berbagai kegiatan yang diadakan di sekolah, baik itu kegiatan akademik maupun ekstrakurikuler.

- **Prestasi Sekolah**: Menampilkan daftar prestasi yang telah diraih oleh siswa dan sekolah di berbagai bidang.

- **Kontak dan Lokasi**: Memberikan informasi kontak dan lokasi sekolah untuk memudahkan pengunjung yang ingin berkunjung atau berkomunikasi.

## 🚀 Demo

[SMPN 13 Bandar Lampung](https://smpn13-bdl.sch.id)

## 🛠️ Getting Started

### Prerequisites

- [PHP](https://www.php.net/) (v8.4+ recommended)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (v22+ recommended)
- [npm](https://npmjs.com/)

### Backend Setup (Laravel)

1. **Install Composer dependencies:**

    ```bash
    composer install
    ```

2. **Copy and configure environment variables:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

3. **Run migrations:**

    ```bash
    php artisan migrate
    ```

4. **Start the Laravel development server:**

    ```bash
    php artisan serve
    ```

### Frontend Setup

1. **Install npm dependencies:**

    ```bash
    npm install
    ```

2. **Build assets:**

    ```bash
    npm run dev
    ```

3. **Open in browser:**

    ```
    http://localhost:8000
    ```

## 🚀 Deploy

Untuk melakukan deploy aplikasi ini ke server hosting (misalnya shared hosting), ikuti langkah-langkah berikut:

1. **Struktur Folder**

    Tempatkan folder project hasil clone dari repository ke dalam direktori `public_html`. Lalu salin semua isi dari folder `public` yang ada di dalam project Laravel ke direktori `public_html`. Ini termasuk file `index.php`, `.htaccess`, dan semua file aset frontend.

    Struktur folder menjadi seperti berikut:

    ```
    public_html/
    ├── folder-project/
    └── (isi folder public dari Laravel project)
    ```

2. **Edit File `index.php`**

    Setelah file `index.php` disalin ke `public_html`, buka dan ubah semua path relatif `(__DIR__.'/../')` menjadi menunjuk ke `folder-project`. Contoh sebelum dan sesudah:

    **Sebelum**:

    ```php
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
    ```

    **Sesudah**:

    ```php
    require __DIR__.'/folder-project/vendor/autoload.php';
    $app = require_once __DIR__.'/folder-project/bootstrap/app.php';
    ```

    Pastikan semua path mengarah ke folder project Laravel yang sesuai.

3. **Build Aset Frontend**

    Di komputer lokal, jalankan:

    ```bash
    npm run build
    ```

    Setelah proses build selesai, upload hasilnya (biasanya dalam folder `public/build`) ke dalam `public_html`.

4. **Upload Folder vendor**

    Karena server hosting umumnya tidak mengizinkan menjalankan atau mendukung `composer install`, kamu harus mengupload folder `vendor` dari lokal ke `public_html/folder-project`. Pastikan juga folder `vendor` yang diupload sudah dioptimasi untuk production dengan perintah berikut:

    ```bash
    composer install --optimize-autoloader --no-dev
    ```

5. **Konfigurasi `.env`**

    Ubah file `.env` di folder project:

    ```env
    APP_ENV=local
    APP_DEBUG=false
    ```

    Kemudian sesuaikan konfigurasi lain seperti:

    - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (akses database hosting)
    - `CACHE_DRIVER`, `QUEUE_CONNECTION`, dan lainnya untuk environment production.

    **Catatan**: APP_ENV bisa tetap `local`, tetapi `APP_DEBUG` harus `false` agar tidak menampilkan error sensitive di production.

6. **Optimize Laravel**

    Untuk meningkatkan performa aplikasi di production, jalankan perintah berikut dengan ssh:

    ```bash
    php artisan optimize
    ```

    Ini akan meng-cache konfigurasi dan routes untuk mempercepat aplikasi.

7. **Buat Symbolic Link ke Storage**

    Karena server hosting membatasi penggunaan fungsi `exec()` sehingga `php artisan storage:link` tidak berjalan dengan semestinya. Untuk membuat file di `storage/app/public` dapat diakses secara publik, buat symbolic link secara manual dengan ssh menggunakan perintah:

    ```bash
    ln -s folder-project/storage/app/public storage
    ```

## 🧑‍💻 Contributing

We welcome contributions!

1. Fork the repo
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a pull request

## 🗣️ Community & Support

- [Issues](https://github.com/kiraware/smpn13-bdl/issues) — for bug reports and feature requests

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

## 🙌 Built By

<a href="https://github.com/kiraware">
  <img src="https://avatars.githubusercontent.com/u/117554978?v=4" width="40" alt="kiraware" />
</a>
<a href="https://github.com/vexra">
  <img src="https://avatars.githubusercontent.com/u/112993677?v=4" width="40" alt="vexra" />
</a>
<a href="https://github.com/rafidharyu">
  <img src="https://avatars.githubusercontent.com/u/108383612?v=4" width="40" alt="rafidharyu" />
</a>

> Inspired by community creativity. Built with ❤️ by our contributors.
