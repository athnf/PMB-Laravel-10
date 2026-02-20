<p align="center">
  <img src="public/logo65.png" alt="Logo Instansi" width="120" />
</p>

<h1 align="center">Sistem Penerimaan Mahasiswa Baru Berbasis Web</h1>

<p align="center">
  <strong>Sistem Informasi Manajemen Seleksi Akademik dan Ujian Online Terintegrasi</strong><br>
  <em>Solusi digital untuk modernisasi proses pendaftaran, pelaksanaan tes masuk (CBT), dan pendaftaran ulang dengan standar keamanan tinggi.</em>
</p>

<p align="center">
  <a href="#deskripsi-proyek">Deskripsi Proyek</a> •
  <a href="#tinjauan-sistem">Tinjauan Sistem</a> •
  <a href="#fitur-utama">Fitur Utama</a> •
  <a href="#teknologi-yang-digunakan">Teknologi</a> •
  <a href="#panduan-instalasi">Panduan Instalasi</a> •
  <a href="#troubleshooting--faq">Troubleshooting</a> •
  <a href="#kredit-dan-lisensi">Kredit</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Framework-Laravel_10-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Language-PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Database-MySQL_8-00000F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Styling-Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
</p>

---

## 📝 Deskripsi Proyek

Aplikasi **Sistem Penerimaan Mahasiswa Baru Berbasis Web** ini adalah platform digital *End-to-End* yang dirancang khusus untuk memfasilitasi seluruh alur penerimaan pendaftar baru. Mulai dari proses pembuatan akun, pelaksanaan ujian seleksi (Computer-Based Test / CBT) jarak jauh, penilaian otomatis, hingga proses administrasi pendaftaran ulang dan penerbitan Nomor Induk Mahasiswa (NIM).

Proses riset dan tahapan *development* proyek ini memakan waktu **kurang lebih 1 bulan**. Menjalani beberapa fase kritis yang dimulai dari:
1. **Brainstorming & Riset Konsep:** Mengurutkan alur pendaftaran logis dan mengambil referensi desain serta ketegasan sistem ujian langsung dari platform seleksi akademik berskala nasional (seperti portal SNBT/UTBK).
2. **UI/UX & Frontend Development:** Merancang antarmuka yang bersih, profesional, dan responsif untuk berbagai ukuran layar menggunakan Tailwind CSS.
3. **Logika Ujian & Anti-Cheat:** Menulis algoritma perlindungan ujian *real-time* untuk mencegah kecurangan, mengamankan sesi ujian, serta memastikan jawaban peserta tersimpan otomatis (*Autosave*).
4. **Debugging & Testing:** Proses panjang dalam mengeliminasi *bug*, memperbaiki integrasi aliran data AJAX, dan menyempurnakan performa server untuk memastikan aplikasi layak tayang (*Production Ready*).

Aplikasi web ini sangat cocok dijadikan referensi portofolio profesional atau dokumentasi arsitektur sistem akademik modern.

---

## 📸 Tinjauan Sistem

Sistem ini memiliki *User Interface* yang disesuaikan untuk setiap jenis pengguna (*Multi-Role*), dengan mengedepankan pengalaman visual yang estetik namun tetap formal.

| Halaman Utama (Landing Page) |
| :---: |
| <img src="docs/images/Landing%20Page.jpeg" alt="Landing Page Preview" width="100%"> |
| *Halaman portal terdepan yang berisi informasi akses, pendaftaran, dan rincian teknologi.* |

| Portal Mahasiswa (Student Dashboard) | Panel Admin (Panitia Seleksi) |
| :---: | :---: |
| <img src="docs/images/Portal%20Mahasiswa.jpg" alt="Portal Mahasiswa Preview" width="100%"> | <img src="docs/images/Admin%20Dashboard.jpg" alt="Admin Dashboard Preview" width="100%"> |
| *Dashboard untuk kandidat baru melakukan ujian, cek status kelulusan, dan proses daftar ulang.* | *Panel utama panitia guna memantau pelamar, mengelola soal ujian, validasi berkas, dan menerbitkan NIM.* |

---

## 🚀 Fitur Utama

Arsitektur aplikasi ini menggunakan konsep *Role-Based Access Control* (RBAC), yang dengan tegas memisahkan fungsionalitas antara Pendaftar dan Administrator.

### Modul Pendaftar (Student)
- **Registrasi & Manajemen Profil:** Pendaftaran mandiri dengan pencatatan kelengkapan data diri dan nomor urut tes (Test Number).
- **Computer-Based Test (CBT):** Sistem ujian pilihan ganda dengan fitur pelacakan progres, disajikan bersama antarmuka mode fokus dan *countdown timer* langsung dari sisi server.
- **Sistem Keamanan Anti-Cheat:** Fitur pemantauan aktivitas *browser* kandidat. Sistem mampu mendeteksi pergantian tab (*Tab Change*) atau saat layar ujian diminimize (*Window Blur*). Jika batas pelanggaran terlampaui, ujian akan otomatis dikunci dan dibatalkan.
- **Autosave Jawaban (AJAX):** Jawaban akan langsung direkam ke database secara spesifik tiap kali opsi diklik, meminimalisir kehilangan progres akibat putus koneksi tanpa adanya gangguan *loading* halaman.
- **Notifikasi Kelulusan:** Setelah ujian terkirim, sistem akan memberikan visualisasi status skor sementara hingga validasi evaluasi akhir dari panitia masuk.
- **Modul Pemberkasan (Daftar Ulang):** Fasilitas bagi kandidat yang LULUS untuk mengunggah dokumen bukti pembayaran dan formulir persetujuan akademik sebelum akhirnya menerima peresmian NIM.

### Modul Pengelola (Administrator)
- **Dashboard Statistik:** Diagram infografis ringan yang menampilkan secara langsung jumlah akumulasi pengguna, peserta yang telah ujian, dan rasio kandidat yang LULUS / TIDAK LULUS.
- **Manajemen Bank Soal (CRUD):** Modul spesifik untuk merancang daftar pertanyaan, mendata empat opsi *multiple choice*, pengaturan kunci jawaban, dan nilai beban (*weight*).
- **Otoritas Kelulusan:** Peninjauan rinci terhadap seluruh skor akhir per pengguna, dilengkapi akses memberikan keputusan mutlak (Passed/Failed) beserta sisipan catatan admin (*Admin Notes*).
- **Verifikasi Bukti Administrasi:** Hak prerogatif admin untuk menerima atau menolak file bukti gambar pendaftaran ulang dari peserta.
- **Sistem Generator NIM:** Fitur pengeluaran status resmi berisikan Nomor Induk Mahasiswa valid dan berurutan untuk pendaftar yang sepenuhnya tervalidasi.

---

## ⚙️ Teknologi yang Digunakan

Perancangan ekosistem kode sumber (Source Code) dikerjakan menggunakan tumpukan teknologi populer standar perangkat lunak industri:

* **Framework Backend:** Laravel 10.x
* **Bahasa Pemrograman:** PHP 8.2+
* **Database Engine:** MySQL 8.x / MariaDB
* **Rendering Template:** Laravel Blade
* **Styling Framework:** Tailwind CSS v3.x (*Utility-First Framework*)
* **Interaktivitas Frontend:** Vanilla JavaScript, Alpine.js (Dropdown/Modals State), jQuery (AJAX Handling)
* **Alert & Notifikasi:** SweetAlert2

---

## 🛠️ Panduan Instalasi (Development Setup)

Bagi pengembang (Developer) atau peninjau yang ingin mencoba menjalankan proyek ini di *Local Development*, pastikan instalasi prasyarat perangkat lunak seperti instalasi PHP, Composer, serta XAMPP/Laragon (untuk server database) telah siap di komputer.

### 1. Download / Clone Repository
Gunakan Git melalui Terminal/Command Prompt untuk mengunduh seluruh fail proyek:
```bash
git clone https://github.com/athnf/pmb-system.git
```
Masuk ke dalam folder proyek:
```bash
cd pmb-system
```

### 2. Install Dependensi (Composer)
Unduh seluruh library dan paket pihak ketiga yang berkaitan dengan framework Laravel:
```bash
composer install
```

### 3. Konfigurasi Environment (.env)
Buat salinan fail environment dengan perintah:
```bash
cp .env.example .env
```
*(Bagi pengguna Windows CMD biasa selain GitBash, gunakan: `copy .env.example .env`)*.

Buka file `.env` di Code Editor Anda (seperti VSCode), dan ubah bagian kredensial *Database* agar sesuai dengan pengaturan MySQL komputer Anda (Misal XAMPP default):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_system   # (Pastikan Anda sudah membuat database bernama pmb_system di phpMyAdmin terlebih dahulu!)
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
Aktifkan perlindungan enkripsi kunci (*App Key*) untuk mengamankan manajemen *session* pengguna:
```bash
php artisan key:generate
```

### 5. Eksekusi Tabel Database & Seeder
Perintah gabungan di bawah ini akan secara otomatis merancang skema *tabel database* sekaligus menyisipkan data *default*, seperti akun Admin dan 10 Data Soal Ujian awal:
```bash
php artisan migrate:fresh --seed
```

### 6. Aktivasi Akses File (Storage Link)
*Langkah ini berstatus sangat wajib*. Tautkan penyimpanan internal peladen dengan jalur folder publik agar file-file (*Images* pendaftaran ulang) bisa diakses atau dirender di browser:
```bash
php artisan storage:link
```

### 7. Jalankan Local Server
Nyalakan sistem dan mari lihat hasilnya:
```bash
php artisan serve
```
Proyek berhasil terpanggil. Buka Browser (Chrome, Firefox, dsb.) dan akses URL: **`http://localhost:8000`**

---

## 🔐 Mode Pengujian User (Login Akses)

Proyek ini telah dibekali dua peran demonstrasi, apabila perintah `Seed` di langkah ke-5 telah berhasil berjalan sukses:

**Untuk Menguji Sisi Panitia (Admin):**
* URL Login: **`http://localhost:8000/login`**
* Email: **`admin@admin.com`**
* Password: **`password`**

**Untuk Menguji Sisi Pelamar Baru:**
Buka halaman utama web (`http://localhost:8000`), dan langsung cobalah fitur kelancaran *User Experience* dengan menekan tombol **DAFTAR AKUN BARU**. Simulasikan alurnya secara penuh hingga melewati tes CBT.

---

## 📖 Troubleshooting & FAQ

Berikut adalah masalah umum (*Errors*) teknis yang paling sering membuat pengembangan web tersendat saat pemasangan kali pertama beserta solusi pastinya (*Quick Fix*):

**Q: Terminal mengeluarkan tulisan error `"Connection Refused"` saat saya mengetik perintah `php artisan migrate`.**  
A: Server MySQL Anda di perangkat lunak (XAMPP/Laragon) sangat mungkin belum diklik *Start*. Solusi kedua: Pastikan nama basis data yang Anda tulis di `.env` sudah benar terbuat di *phpMyAdmin*.

**Q: Saya coba uji coba form registrasi/ujian, layarnya malah mengembalikan kode `"419 - Page Expired"`.**  
A: Mekanisme perlindungan keamanan CSRF milik Laravel sengaja menggugurkan token pada browser apabila Anda membiarkan laman diam dalam durasi lama. Penyelesaian terbaik adalah me-refresh (*F5*) ulang halaman form web bersangkutan.

**Q: Setelah saya *submit* selesai ujian, tiba-tiba muncul notifikasi bertuliskan `"Sesi Tidak Ditemukan" / "Gagal Validasi"`.**  
A: Middleware Anti-Cheat yang aktif mencegah URL ujian online diakses ulang jika peserta *reload* halaman diam-diam di tengah pengerjaan (*Illegal Refresh*). Ini fitur perlindungan ujian, bukan sistem rusak.

**Q: Bukti gambar pembayaran yang diunggah pelamar saat daftar ulang menjadi logo rusak (*Broken Image*) di mata Admin.**  
A: Terminal Anda terlewat pada langkah penautan folder. *Turn off* server sejenak (`Ctrl + C`), lalu kembalikan tautan tersebut dengan mengetik `php artisan storage:link`, barulah *start server* lagi.

**Q: Layar browser memutih dengan log tulisan `"No application encryption key has been specified"`.**  
A: Hal paling klasik bagi developer Laravel yang baru mengkloning project. Kempeskan saja kegelisahan tersebut cukup dengan mengeksekusi `php artisan key:generate` dan web otomatis menyala kembali.

---

## 📜 Kredit dan Dedikasi Proyek

Pengembangan ekosistem sistem informasi akademik modern ini merupakan wujud dedikasi, serta bentuk hibah struktural teknikal murni (*Technical Engineering Contribution*) yang dipersembahkan demi kelancaran prasyarat kelulusan pada **Ujian Sertifikasi Kompetensi (USK)** siswa.

🎓 **TRISTAN FAIZ A.**  
(Siswa Praktikan Tingkat Akhir / *Ade Kelas*)  
🏫 **Kelas XII PPLG** (Pengembangan Perangkat Lunak dan Gim)  
🏢 **SMK Negeri 65 Jakarta**  

**Konsultan & Pemrogram Full-Stack Engineer:**  
Dengan komitmen untuk mematuhi standar *Clean Architecture*, *design pattern* logika ujian, fitur UI lanjutan, dukungan riset penyelesaian, dan validasi fungsional di balik layar secara total didukung penuh oleh:  
💻 **[@athnf](https://github.com/athnf)** di platform GitHub.

***
*Struktur *source code* dirancang melalui dedikasi kuat dengan memprioritaskan arsitektur perangkat lunak yang andal, aman, dan dapat distandardisasi bagi pengelolaan institusi.*
