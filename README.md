<p align="center">
  <img src="public/logo65.png" alt="Logo Instansi" width="120" />
</p>

<h1 align="center">Sistem Penerimaan Mahasiswa Baru (PMB) Berbasis Web</h1>

<p align="center">
  <strong>Platform Manajemen Seleksi Akademik Terintegrasi dan Pelaksanaan Ujian Daring Terpusat</strong><br>
  <em>Dikembangkan sebagai solusi digitalisasi administrasi penerimaan kandidat mahasiswa baru dengan standar keamanan tingkat tinggi.</em>
</p>

<p align="center">
  <a href="#tinjauan-sistem">Tinjauan Sistem</a> •
  <a href="#deskripsi-proyek">Deskripsi Proyek</a> •
  <a href="#fitur-utama">Fitur Utama</a> •
  <a href="#arsitektur-dan-teknologi">Teknologi</a> •
  <a href="#panduan-instalasi">Instalasi</a> •
  <a href="#troubleshooting-dan-faq">Troubleshooting</a> •
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

Aplikasi **Sistem Penerimaan Mahasiswa Baru Berbasis Web** ini merupakan sebuah platform sistem informasi yang dirancang untuk menangani seluruh rangkaian operasional penerimaan kandidat mahasiswa secara digital (End-to-End). Sistem ini mengakomodasi proses pendaftaran akun, pelaksanaan ujian seleksi berbasis komputer (Computer-Based Test/CBT), penilaian akhir oleh administrator, hingga tahap pendaftaran ulang dan penciptaan Nomor Induk Mahasiswa (NIM).

Proses perancangan dan pengembangan (Development Lifecycle) platform ini berlangsung selama kurang lebih **satu bulan**. Tahapan pengembangan mencakup:
1. **Perencanaan dan Abstraksi (*Brainstorming*):** Menentukan ruang lingkup aplikasi, alur basis data, dan entitas pengguna. Mengambil studi preseden dari platform ujian nasional berskala besar seperti UTBK-SNBT untuk memastikan pengalaman ujian yang tegas dan presisi.
2. **Perancangan Antarmuka (*UI/UX Design*):** Penyusunan antarmuka yang formal, modern, dan berfokus pada pengalaman pengguna yang responsif menggunakan *Tailwind CSS*.
3. **Pengembangan Backend dan Logika Ujian:** Pembuatan arsitektur sistem menggunakan *Laravel* dan integrasi algoritma pengawasan ujian daring (*Anti-Cheat Middleware*).
4. **Tahap Pengujian dan *Debugging*:** Penelusuran celah keamanan, penyempurnaan skrip pemrosesan asinkron (*AJAX*), dan penyelesaian *bug* pada antarmuka.

Platform ini sangat ideal digunakan untuk mendemonstrasikan kapabilitas pembangunan aplikasi berskala *Full-Stack* (Backend dan Frontend), serta layak menjadi referensi dokumentasi portofolio profesional.

---

## 📸 Tinjauan Sistem

Sistem ini memiliki berbagai antarmuka yang difokuskan pada pengguna masing-masing, meliputi kapabilitas pendaftar dan administrator.

| Halaman Utama (Landing Page) |
| :---: |
| <img src="docs/images/Landing%20Page.jpeg" alt="Landing Page Preview" width="100%"> |
| *Halaman depan konseptual dengan informasi dasar instansi, akses pendaftaran, serta panel masuk (Login).* |

| Modul Kandidat (Portal Calon Mahasiswa) | Modul Pengelola (Admin Dashboard) |
| :---: | :---: |
| <img src="docs/images/Portal%20Mahasiswa.jpg" alt="Portal Mahasiswa Preview" width="100%"> | <img src="docs/images/Admin%20Dashboard.jpg" alt="Admin Dashboard Preview" width="100%"> |
| *Antarmuka privat kandidat untuk mengikuti sesi ujian CBT, memantau pengumuman nilai, serta mengunggah berkas daftar ulang persetujuan.* | *Panel utama panitia seleksi guna meninjau statistik rekursif, kelulusan pendaftar, manajemen soal, dan generator NIM.* |

---

## 🚀 Fitur Utama

Sistem ini menerapkan konsep *Role-Based Access Control* (RBAC) yang memisahkan hak akses fungsionalitas antara kandidat pengguna (User/Student) dan panitia pengelola (Admin).

### Modul Pengguna (Calon Mahasiswa)
- **Registrasi dan Manajemen Profil Terpusat:** Pengguna dapat mendaftarkan diri, mengisi kelengkapan biodata, dan menerima nomor tes pendaftaran.
- **Sistem Ujian CBT (*Computer-Based Test*):** Pelaksanaan uji soal pilihan ganda yang disajikan dengan antarmuka proyektif dan batasan waktu (*countdown timer*) yang tervalidasi di sisi peladen (Server-Side).
- **Protokol Keamanan Ujian (*Anti-Cheat Engine*):** Dilengkapi dengan kemampuan pengawasan aktivitas peramban, mencakup deteksi perpindahan halaman (*Tab Change*) dan penyembunyian layar (*Window Blur*). Ujian akan otomatis dihentikan apabila pelanggaran mencapai ambang batas.
- **Penyimpanan Asinkron (*Autosave*):** Jawaban secara otomatis terkirim dan disimpan di peladen menggunakan integrasi *AJAX* tanpa perlu memuat ulang halaman utama ujian.
- **Peninjauan Hasil Real-Time:** Penampilan nilai evaluasi dasar pasca-ujian beserta pemantauan status persetujuan dari dewan penguji/admin.
- **Fasilitas Daftar Ulang:** Fitur untuk mengunggah manifestasi pembayaran, menyetujui perjanjian akademik, dan memperoleh Nomor Induk Mahasiswa (NIM).

### Modul Pengelola (Administrator)
- **Dasbor Analitik Deskriptif:** Penyajian akumulasi data pengguna, tingkat kelulusan, dan status penyelesaian ujian.
- **Sistem Manajemen Bank Soal (CRUD):** Fungsionalitas utuh untuk merumuskan pertanyaan, menyusun opsi jawaban, menentukan kunci jawaban yang benar, serta pengaturan bobot nilai.
- **Evaluasi dan Penentuan Kelulusan Manual:** Fitur bagi administrator untuk mempertimbangkan hasil tes kandidat dan memberikan penetapan (LULUS/TIDAK LULUS) yang dilengkapi catatan evaluasi.
- **Verifikasi Dokumen Akademik:** Panel kontrol untuk menyetujui atau menolak dokumen administrasi registrasi ulang dari pendaftar.
- **Generator Nomor Induk Mahasiswa (NIM):** Modul eksklusif guna menghasilkan rentang identitas mahasiswa baru yang sah pada akhir alur penerimaan.

---

## ⚙️ Arsitektur dan Teknologi

Proyek ini dibangun menggunakan lini teknologi mutakhir yang relevan dengan standar industri, menjadikan aplikasi berjalan lancar, terjamin privasinya, dan responsif.

* **Teknologi Backend (Sisi Peladen):** Laravel Framework 10.x, PHP 8.2+
* **Sistem Manajemen Basis Data:** MySQL 8.x / MariaDB
* **Desain Antarmuka (CSS Framework):** Tailwind CSS v3.x (*Utility-First Framework*)
* **Mesin Templat HTML:** Laravel Blade Engine
* **Pemrosesan Interaktif (Sisi Klien):** Vanilla ES6 JavaScript, jQuery (khusus permintaan basis AJAX), dan Alpine.js
* **Penanganan Notifikasi Pop-up:** SweetAlert2 Library

---

## 🛠️ Panduan Instalasi (Development Environment)

Untuk mendemonstrasikan proyek ini secara lokal, pastikan kapabilitas lingkungan pengembang Anda telah dilengkapi dengan prasyarat wajib seperti PHP, Composer, serta perangkat lunak agregator peladen (Contoh: XAMPP, ampps, atau Laragon).

### Langkah 1: Penggandaan Repositori Kode
Buka perangkat terminal antarmuka baris perintah (CLI) Anda, arahkan pada lokasi *folder* pilihan, dan eksekusi instruksi:
```bash
git clone https://github.com/athnf/pmb-system.git
```
Masuk ke dalam target peladen repositori:
```bash
cd pmb-system
```

### Langkah 2: Instalasi Ketergantungan Paket (Dependencies)
Laravel menggunakan *Composer* untuk memanajemen kumpulan pustaka PHP pendukung, jalankan kueri berikut:
```bash
composer install
```

### Langkah 3: Modifikasi Parameter Lingkungan (*Environment*)
Gandakan fail contoh `.env` ke bentuk konfigurasi fungsional:
*(Bagi pengguna OS Windows/Command Prompt, gunakan utilitas `copy .env.example .env`)*
```bash
cp .env.example .env
```
Anda diwajibkan menyunting fail `.env` menggunakan penyunting teks dan memperbarui kunci koneksi basis data (Contoh menggunakan XAMPP standar):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_system   # (Pastikan Anda telah membuat basis data kosong bernama pmb_system di sistem Anda)
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 4: Aktivasi Kunci Enkripsi Aplikasi
Berikan algoritma otentikasi sesi kepada arsitektur Laravel Anda:
```bash
php artisan key:generate
```

### Langkah 5: Migrasi Tabel dan Penyuntikan Data Awal (*Seed*)
Kueri ini akan secara utuh memigrasi rancangan skema basis data ke basis data lokal dan memuat data awal seperti konfigurasi akses ganda, soal ujian contoh, dan kredensial uji coba administrator:
```bash
php artisan migrate:fresh --seed
```

### Langkah 6: Pembuatan Tautan Simbolik Direktori Penyimpanan (*Storage Linking*)
Untuk memvalidasi bahwa seluruh *file* berkas unggahan bukti pembayaran pengguna dapat secara sah dan terbuka diamati publik di halaman pengguna admin, eksekusi perintah:
```bash
php artisan storage:link
```

### Langkah 7: Pengaktifan Peladen Virtual Uji Coba
Seluruh ekosistem proyek kini sudah disiapkan. Operasikan peladen tertanam:
```bash
php artisan serve
```
Buka tautan yang muncul (biasanya **`http://localhost:8000`**) melalui perangkat lunak penjelajah situs web (Browser) Anda.

---

## 🔐 Kredensial Pengujian (Seeder Demo)

Jika proses *Seeding* (Langkah 5) sukses diterapkan, Anda dapat mensimulasikan sesi pengguna menggunakan kredensial bawaan:

**Akses Administrator (Panitia)**
* Perutean Login: **`/login`**
* Akun Surel: **`admin@admin.com`**
* Kata Sandi: **`password`**

**Akses Mahasiswa Baru (Kandidat)**
Silakan mengakses tombol Registrasi di bagian atas halaman utama situs, dan daftarkan diri guna menikmati keutuhan simulasi pendaftar mandiri.

---

## 📖 Troubleshooting dan FAQ (Pertanyaan yang Sering Diajukan)

Terdapat berbagai kendala teknis umum (*Errors*) kala pengembang menjalankan aplikasi melalui instalasi awal repositori. Berikut panduan mitigasi permasalahan utamanya:

**1. Isu Migrasi: Timbul keterangan galat jaringan `"Connection Refused"` saat `migrate`**  
Rujukan penyelesaian awal: Pastikan aplikasi pendamping peladen seperti XAMPP sudah dijalankan (Layanan modul MySQL menyala). Di samping itu, validasi bahwa fail `.env` telah terkoneksi tepat pada basis data (`pmb_system`).

**2. Isu Hak Akses Ujian: Setelah memuat ujian timbul notifikasi `"Sesi Ujian Tidak Valid"`**  
Rujukan penyelesaian awal: Modul *Anti-Cheat Middleware* sengaja mencegah peserta untuk memasuki laman ujian apabila nilai token pengerjaan dan basis waktu telah diakhiri paksa / peserta memuat kembali *URL* aktif tanpa validasi alur persiapan ujian.

**3. Isu Visibilitas Berkas: Bukti gambar pembayaran yang diunggah kandidat menjadi `Broken Image` (Logo Rusak) di Dasbor Admin**  
Rujukan penyelesaian awal: Anda melewati prosedur wajib pada `Langkah 6`. Pastikan integrasi berkas ke publik telah ditautkan secara eksplisit melalui perintah konsol `php artisan storage:link`.

**4. Isu Kriptografi: Layar peladen membeku dengan informasi `"No application encryption key has been specified."`**  
Rujukan penyelesaian awal: Framework mendeteksi *ENV* aplikasi hilang dari otentikasi kunci utama. Jalankan ulang kueri terminal Anda `php artisan key:generate`.

**5. Isu Sesi Kadaluarsa: Antarmuka log keluar secara tiba-tiba ditandai galat spesifik `"419 - Page Expired"`**  
Rujukan penyelesaian awal: Proteksi celah peretasan Formulir Lintas Situs *(CSRF/Cross-Site Request Forgery)* sedang diaktifkan Laravel terhadap formulir pengiriman data jika dibiarkan tanpa adanya interaksi pada durasi lama. Muat ulang halaman penjelajah web untuk mencabut perlindungan formulir usang tersebut dan coba ulang.

---

## 📜 Kredit dan Lisensi Proyek

Proyek ini dibangun tidak hanya sebagai sebuah infrastruktur sistem administrasi yang kompleks, melainkan dedikasi komprehensif terkait pemenuhan syarat kelayakan dalam sidang Ujian Sertifikasi Kompetensi (USK).

Seluruh sistem arsitektur pengkodingan pada repositori spesifik ini dihibahkan (*Transfer of Intellectual Property*) secara penuh agar menjadi portfolio unjuk kemampuan atas nama praktikan adik kelas:

💼 **Pemilik Proyek Hak Milik (Kandidat Ujian Kompetensi)**:
* **Nama Akademik**: TRISTAN
* **Kelas dan Jurusan**: XII PPLG (Pengembangan Perangkat Lunak dan Gim)
* **Instansi Pendidikan**: SMK Negeri 65 Jakarta

💻 **Kontributor Teknis dan Konsultan (*Full-Stack Engineer*)**:
* Dikembangkan oleh: [@athnf](https://github.com/athnf) di platform GitHub.

Kami senantiasa memelihara validitas kode pemrograman ini sebagai pilar penunjang portofolio edukasi struktural dan etika pengembangan tingkat profesional korporasi (*Enterprise Standard*).

***
*Penyelarasan arsitektur basis kode dibuat menggunakan panduan struktural rekayasa perangkat lunak modern untuk menciptakan harmoni skalabilitas fungsional.*
