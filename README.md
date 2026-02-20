# Lulusan Terbaik - Sistem Penerimaan Mahasiswa Baru Berbasis Web 🎓

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20.svg?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4.svg?logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4.svg?logo=tailwind-css)

Sistem Penerimaan Mahasiswa Baru Berbasis Web adalah sebuah aplikasi akademik komprehensif yang dirancang untuk mengelola alur pendaftaran, pelaksanaan ujian seleksi (CBT/Computer Based Test) secara online, evaluasi kelulusan otomatis, hingga proses daftar ulang calon mahasiswa baru.

Sistem ini difokuskan pada keamanan pelaksanaan ujian (*Anti-Cheat*) dan kemudahan pengelolaan data (*Role-Based Access Control*), dengan antarmuka yang modern, responsif, dan profesional.

---

## 🖼️ Tinjauan & Tangkapan Layar (Preview)

> *Tambahkan screenshot antarmuka (Landing Page, Admin Dashboard, Ujian Online) di sini untuk melengkapi portofolio.*

- `[Screenshot Landing Page]`
- `[Screenshot Portal Mahasiswa]`
- `[Screenshot Ruang Ujian Anti-Cheat]`
- `[Screenshot Admin Dashboard]`

---

## ✨ Fitur Utama Sistem

Sistem ini dilengkapi dengan berbagai fitur esensial yang menunjang operasional panitia PMB dan kemudahan calon mahasiswa:

### Untuk Calon Mahasiswa (Pendaftar)
- **Registrasi & Portal Akun:** Pendaftaran akun dan manajemen profil berbasis NIK/Email secara terpusat.
- **Ujian Online CBT Instan:** Mengerjakan soal pilihan ganda dengan *real-time countdown timer*.
- **Keamanan Ujian Berbasis Sesi (Anti-Cheat):** Mendeteksi perpindahan *tab/window* browser dan mencegah kecurangan reload paksa. Ujian akan dihentikan otomatis apabila melanggar batas peringatan.
- **Pengecekan Status Kelulusan:** Hasil langsung dievaluasi dan status kelulusan dikelola oleh panitia.
- **Daftar Ulang & Generate NIM:** Proses unggah bukti pembayaran kelulusan dan sinkronisasi pembentukan Nomor Induk Mahasiswa (NIM).

### Untuk Administrator (Panitia PMB)
- **Statistik Dashboard Cerdas:** Laporan akumulatif jumlah pendaftar, peserta ujian, lulus/gagal, dan mahasiswa terdaftar.
- **Manajemen Bank Soal:** *Create, Read, Update, Delete* (CRUD) soal ujian beserta kunci jawaban dan penentuan bobot nilai.
- **Review Hasil & Evaluasi Manual:** Hak penuh untuk memvalidasi nilai ujian dan menentukan kelulusan (*Passed / Failed*) berdasarkan performa kandidat.
- **Verifikasi Berkas Daftar Ulang:** Menerima atau menolak bukti registrasi ulang pendaftar yang lulus.
- **Penerbitan NIM Otomatis (Generator):** Sistem pencetakan Nomor Induk Mahasiswa berurutan untuk kandidat yang tervalidasi.

---

## 🛠️ Tech Stack yang Digunakan

Aplikasi ini dibangun menggunakan arsitektur full-stack modern dengan spesifikasi standar industri perangkat lunak:

* **Framework Inti:** Laravel 10.x
* **Bahasa Pemrograman:** PHP 8.2+
* **Basis Data:** MySQL 8+
* **Templating Engine:** Laravel Blade
* **Styling & UI:** TailwindCSS Utility-First
* **Interaktivitas (JS):** Alpine.js, jQuery, dan SweetAlert2 Interactive Modals
* **Keamanan:** Laravel Middleware (RBAC & State Examination Check)

---

## 🏗️ Arsitektur Sistem Singkat

* **MVC Pattern:** Pendekatan arsitektur Model-View-Controller bawaan Laravel untuk efisiensi kode.
* **Role Based Access Control (RBAC):** Pemisahan rute (*routing*) antara hak akses `admin` (Panitia) dan `user` (Calon Mahasiswa).
* **Stateful Sessions:** Mengandalkan *Token Validation* dan rekam *Session ID* di server untuk melindungi integritas nilai ujian (*Exam Controller*).
* **Asynchronous Save (AJAX):** Sistem *Autosave* jawaban di balik layar setiap kandidat berpindah soal guna menghindari *data-loss* akibat putus koneksi.

---

## 🚀 Cara Instalasi Lengkap (Step-by-Step)

Untuk menjalankan proyek ini di mesin lokal, pastikan **PHP**, **Composer**, dan **MySQL Server** (XAMPP/Laragon) sudah terinstal.

1. **Clone Repository ini**
   ```bash
   git clone https://github.com/athnf/pmb-system.git
   ```

2. **Masuk ke direktori proyek**
   ```bash
   cd pmb-system
   ```

3. **Install *Dependencies* PHP via Composer**
   ```bash
   composer install
   ```

4. **Konfigurasi Environment Database**
   Salin file konfigurasi bawaan Laravel:
   ```bash
   cp .env.example .env
   ```
   *Buka file `.env` dan atur konfigurasi database sesuai mesin Anda (misal XAMPP -> username: root, password kosong):*
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=pmb_system  # pastikan database ini telah Anda create di MySQL/PhpMyAdmin
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Kunci Aplikasi (App Key)**
   ```bash
   php artisan key:generate
   ```

6. **Lakukan Migrasi & Sinkronisasi Folder Storage**
   Perintah ini akan menyusun tabel *database* sesuai skema secara otomatis.
   ```bash
   php artisan migrate:fresh
   ```
   *Wajib:* Buka *bridge* folder untuk menangani bukti *upload* file pendaftar:
   ```bash
   php artisan storage:link
   ```

7. **Isi Contoh Data (Database Seeding)**
   *Menginject Admin Default, Soal Ujian (Question Seeder), dan Konfigurasi Roles:*
   ```bash
   php artisan db:seed
   ```

---

## 🏃‍♂️ Cara Menjalankan Server

Setelah instalasi selesai, luncurkan *Local Development Server* Laravel:

```bash
php artisan serve
```

Akses website melalui *browser* pada: **`http://localhost:8000`** atau **`http://127.0.0.1:8000`**

---

## 🔑 Akun Demo / Seeder Login

Gunakan akun berikut untuk melihat interaksi dan sistem panel *(jika Anda menjalankan proses Seed pada langkah instalasi)*:

**Akun Administrator:**
* URL Akses: `http://localhost:8000/login`
* **Email:** `admin@admin.com`
* **Password:** `password`

**Akun Pendaftar (Student) Baru:**
Anda bisa membuat akun baru langsung melalui halaman registrasi web landing page `/register`.

---

## 🔄 Alur Penggunaan Sistem Secara Umum

1. **Admin** membuat Bank Soal beserta pembobotan nilai di panel Admin.
2. **Kandidat** melakukan "Daftar Akun Baru".
3. **Kandidat** memasuki Ruang Ujian, menyetujui persyaratan, dan melaksanakan *Test Kompetensi / Masuk*.
4. **Kandidat** wajib *Submit* jika waktu habis atau setelah menjawab seluruh soal sebelum sesi dihapus server.
5. **Admin** melihat rangkuman perolehan nilai kandidat di menu "Data Pendaftar" dan menyatakan "LULUS/TIDAK LULUS".
6. **Kandidat (Jika LULUS)** masuk menu "Daftar Ulang", *upload* berkas bukti pembayaran (*opsional*).
7. **Admin** "Verifikasi Berkas Daftar Ulang" dan "Buatkan NIM (Generate)".
8. Selesai, kandidat berstatus mahasiswa tercatat dengan NIM Resmi.

---

## ❓ FAQ Singkat (Pertanyaan yang Sering Diajukan)

* **Q: Kenapa saat `php artisan migrate` gagal berjalan (Connection Refused)?**  
  A: Pastikan MySQL Service/XAMPP sudah dalam kondisi `START`. Dan pastikan nama database di `.env` sudah benar terbuat.

* **Q: Kok siswa nyoba Ujian Online tapi dibilang Sesi / Token TIdak Valid?**  
  A: Ujian dilarang di-buka ulang saat waktu telah habis atau telah menekan tombol *refresh* paksa di tengah ujian. Panitia harus *reset* sesi untuk mengulangnya.

* **Q: Kenapa gambar/logo resminya (*logo65.png*) tidak tampil (Broken Link)?**  
  A: Pastikan Anda telah meletakkan *file assets* gambar logo ke dalam folder bernama `public/logo65.png`.

* **Q: Kenapa Foto Bukti Daftar Ulang tidak muncul di halaman admin?**  
  A: Anda melupakan langkah `php artisan storage:link`. Silakan *run terminal command* tersebut agar folder penyimpanan dapat dibaca *public*.

---

## 🔧 Troubleshooting Error Umum

Berikut adalah langkah praktis perbaikan apabila sistem terkendala pada server target/klien:

**1. "No Application Encryption Key Has Been Specified."**  
*Solusi:* Sistem di-*protect*. Buka proyek di CLI/Terminal, dan jalankan perintah: `php artisan key:generate`, lalu refresh website.

**2. "SQLSTATE[HY000] [1049] Unknown database 'pmb_system'."**  
*Solusi:* Laravel tidak dapat menemukan ruang data bernama `pmb_system`. Silakan masuk ke aplikasi (Xampp/PhpMyAdmin) dan buat sebuah nama `Database` baru menggunakan nama tersebut, barulah jalankan kembali `php artisan migrate`.

**3. "Vite manifest not found / Error Build" (Jika Frontend Acak-acakan)**  
*Solusi:* Sistem ini bergantung pada arsitektur Taildwind *CDN rendering*, bukan Vite Compilation. Pastikan terhubung koneksi internet dengan stabil karena `TailwindCSS` dimuat melalui *link CDN* pada `<head>` setiap file *layouts*.

---

## 📜 Credit & Hak Cipta

Proyek akademik ini didedikasikan atas Ujian Praktik Sekolah:

> **Proyek ini dibuat sebagai bagian dari Ujian Sertifikasi Kompetensi atas nama:**
>
> 👤 **TRISTAN**  
> 🏷 **Kelas XII PPLG**  
> 🏫 **SMK Negeri 65 Jakarta**  

*Pengembangan sistem berlangsung secara intensif selama ±1 Bulan (meliputi riset logika Ujian Anti-Cheat, penyesuaian rancangan database, tahap desain UI, revisi kode, debugging keamanan, dan finalisasi fungsionalitas).*

**Development Engineering Stack by:**
💻 [**@athnf**](https://github.com/athnf) di GitHub.

***
*“Code is poetic structure. Architecture is silent logic. Great software solves both design and functionality.”*
