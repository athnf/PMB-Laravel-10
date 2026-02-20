<p align="center">
  <img src="public/logo65.png" alt="Logo SMKN 65" width="120" />
</p>

<h1 align="center">Sistem Penerimaan Mahasiswa Baru Berbasis Web</h1>

<p align="center">
  <strong>Solusi Modern & Terintegrasi untuk Seleksi Penerimaan Akademik</strong><br>
  <em>Dibuat khusus untuk memenuhi kebutuhan standarisasi ujian masuk dengan keamanan tinggi.</em>
</p>

<p align="center">
  <a href="#fitur-unggulan">Fitur Utama</a> •
  <a href="#cerita-di-balik-layar">Behind The Scenes</a> •
  <a href="#tech-stack">Teknologi</a> •
  <a href="#persiapan--instalasi">Instalasi</a> •
  <a href="#faq--troubleshooting">FAQ</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
</p>

---

## 📸 Tinjauan Sistem (System Preview)

*Inspirasi desain langsung dari Portal SNBT Nasional untuk pengalaman tes yang menegangkan, premium, sekaligus aman! Tertarik mencoba fungsionalitas aslinya? Mari ikuti panduan instalasi di bawah.*

| Halaman Utama (Landing Page) |
| :---: |
| <img src="docs/images/Landing%20Page.jpeg" alt="Landing Page Preview" width="100%"> |
| *Wajah terdepan sistem dengan UI ala Universitas modern dan warna kontras.* |

| Portal Mahasiswa & Ujian Anti-Cheat | Admin Dashboard & Evaluasi |
| :---: | :---: |
| <img src="docs/images/Portal%20Mahasiswa.jpg" alt="Portal Mahasiswa" width="100%"> | <img src="docs/images/Admin%20Dashboard.jpg" alt="Admin Dashboard" width="100%"> |
| *Dashboard khusus kandidat yang responsif untuk seleksi & daftar ulang.* | *Pusat komando komprehensif bagi Panitia untuk memantau data seluruh pendaftar.* |

> ***Catatan:** Ini hanyalah cuplikan visual. Banyak fitur tersembunyi seperti validasi AJAX, Anti-Cheat Timer, & Animasi SweetAlert2 yang hanya bisa diview jika Anda menjalankan sistem ini langsung!*

---

## 🏆 Informasi Lisensi & Kredit Proyek

> **Proyek Ujian Sertifikasi Kompetensi (USK)**
> 
> Mahakarya ini bukan sekadar tugas biasa, melainkan dedikasi akhir untuk syarat kelulusan komprehensif atas nama:
> 
> 🎓 **Nama**: TRISTAN  
> 🏫 **Kelas**: XII PPLG (Pengembangan Perangkat Lunak dan Gim)  
> 🏢 **Asal Instansi**: SMK Negeri 65 Jakarta  
> 
> 💻 **Full-Stack Engineer By**: [@athnf](https://github.com/athnf)

### 🕰 Cerita di Balik Layar (*Behind the Scenes*)
Membangun web kompleks ini setidaknya memakan waktu **1 Bulan lebih!** 
Awalnya banyak *ngaret*, cuma sebatas corat-coret ide dan bayangan (*brainstorming* tiada akhir), bongkar pasang desain berulang kali, *trial-and-error* memikirkan bagaimana caranya mencegah kecurangan (*anti-cheat algorithm*), sampai titik akhirnya tereksekusi mulus dengan arsitektur UI yang **terinspirasi kuat dari *feels* ketegangan Portal Resmi Ujian Kedinasan / UTBK-SNBT Nasional**.

---

## 🚀 Fitur Unggulan

Proyek ini tidak main-main dalam urusan fungsionalitas. Berikut hal gahar yang ditawarkan:

- **🛡️ Sistem Ujian Anti-Cheat (CBT Mode):** 
  Dilengkapi deteksi *Blur / Tab Out / Reload*. Siswa yang tertangkap mengintip Google / berpindah tab akan otomatis dihentikan paksa (Banned & Force Submit).
- **💼 Role-Based Access Tepat Guna:**
  Pembagian dua nyawa, sebagai **Kandidat Baru (User)** yang terjebak di ruang ujian, dan **Panitia PMB (Admin)** si penguasa data (Approval Ulang, Manual Override Nilai, DLL).
- **⚡ Evaluasi & Penilaian Cerdas (Scoring Engine):**
  Pendaftar langsung melihat bobot skor awal setelah menekan tombol *Submit*, lalu menembus fase evaluasi manual di tangan admin. Admin dapat memberikan persetujuan LULUS dan merilis NIM resmi.
- **🎨 UI / UX Kelas Wahid:**
  Desain yang mewah, clean, dengan perpaduan gradasi, transparansi, *Alpine.js* untuk dropdown super halus, *Tailwind CSS* form factor elegan, dan interaktif *SweetAlert2*.
- **☁️ AJAX Autosave:**
  Kandidat Ujian tidak perlu takut mati listrik! Setiap jawaban detik itu juga dikunci ke dalam database (Autosave System) tanpa loading ulang.

---

## ⚙️ Tech Stack (*Under The Hood*)

Arsitektur aplikasi ini didukung barisan teknologi papan atas standar *Enterprise*:
* **Core Framework**: Laravel 10.x (PHP 8.2+)
* **Database Management**: MySQL 8.0 / MariaDB
* **Frontend Logic**: Alpine.js, Vanilla ES6 JavaScript, jQuery (khusus AJAX Handler)
* **Frontend UI Framework**: TailwindCSS v3.x (*Utility First Approach*)
* **Blade Templating**: Sistem modular Layouts komponen
* **Notification / Modals**: SweetAlert2 

---

## 🛠️ Persiapan & Instalasi (Panduan Lengkap pemula)

Bagi Anda (Dosen Penguji, Penilai, atau Klien) yang ingin menjalankan proyek ini secara lokal tanpa kendala, silakan ikuti ritme presisi di bawah ini!

### 1. Kloning Direktori (Clone Repository)
Buka terminal OS Anda, tentukan letak penyimpanan, lalu tempel:
```bash
git clone https://github.com/athnf/pmb-system.git
```
Pindah ke dalam rumah folder yang baru kita unduh:
```bash
cd pmb-system
```

### 2. Download Komponen (Vendor Install)
Karena *framework* sangat bergantung pada paket (libraries) pihak luar, kumpulkan dulu paket-paket tersebut dengan:
```bash
composer install
```

### 3. Setup Lingkungan Operasi (Environment Configuration)
Salin fondasi bawaan dari `.env.example` menjadi `.env` resmi Anda:
```bash
cp .env.example .env
```
*(Bagi pengguna OS Windows Git Bash, dapat perintah `copy .env.example .env`)*. 

**Wajib Periksa File `.env`!**  
Pastikan bagian Database di-isi sesuai XAMPP/Laragon di Komputer Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_system   <--- [PENTING] Buat Dulu Database Kosong ini di MySQL / PhpMyAdmin!
DB_USERNAME=root
DB_PASSWORD=             <--- Biarkan kosong jika tidak ada pasword XAMPP
```

### 4. Aktivasi Nyawa Keamanan (App Key)
Generate Encryption App Key rahasia bawaan framework dengan terminal:
```bash
php artisan key:generate
```

### 5. Membangun Tabel Server & Contoh Data (Migrate & Seed)
Ini bagian seru, biarkan Laravel menyulap tabel struktur PMB secara ghaib sekaligus mengisi akun contoh *"Admin"* dan *"10 Soal Logika Ujian"* otomatis.
```bash
php artisan migrate:fresh --seed
```

### 6. Jembatan Ghaib Foto/File Berkas (Storage Link)
Ini yang bikin file upload (Berkas Daftar Ulang KTP/Pembayaran dkk) bisa nongol di website publik. **JANGAN SKIP STEP INI**:
```bash
php artisan storage:link
```

### 7. Mesin Dinyalakan! (Run Server)
```bash
php artisan serve
```
Buka mata Anda dan saksikan Web ini hidup secara lokal di Browser dengan cara klik/masuk ke URL: **`http://localhost:8000`**

---

## 🔑 Autentikasi Contoh (Mode Testing)

Jika instalasi *seeder* Anda sukses di Tahap 5, gunakan akses "Mahakuasa" (Admin) ini untuk berkeliling memantau data:

**Hak Akses Panitia / Admin Ujian:**
* **Login URL**: `http://localhost:8000/login`
* **Email**: `admin@admin.com`
* **Password**: `password`

Sedangkan untuk simulasi Ujian (*User View*), sangat disarankan Anda meng-klik tombol **DAFTAR AKUN BARU** di layar depan dan bersimulasi *Real-time* menjadi mahasiswa.

---

## 🧩 FAQ - Bingung Kok Gagal?

**1. Kenapa saat jalanin `php artisan migrate`, Terminal nolak warna merah panjang? (Connection Refused/Unknown Database)**  
> **Jawab:** Kamu lupa belum nyalain tombol "START" MySQL di XAMPP Panen kamu, atau... kamu lupa buka web *PhpMyAdmin* dan buat database kosong/baru dengan nama persis seperti di `.env` kamu (contoh: `pmb_system`). 

**2. Kenapa saya gabisa Submit/Lanjut ujian secara normal? Keluar notif error!**  
> **Jawab:** Ada yang aneh di terminal server kamu. Pastikan PHP version kamu sudah v8.2+ dan periksa koneksi internet / matikan AdBlock, karena sistem ujian membutuhkan paket Javascript CDN secara Realtime lewat Internet.

**3. File Foto Bukti TF (Daftar Ulang) dari Mahasiswa kok kalau diklik Broken Image atau ilang?**  
> **Jawab:** Tarik nafas dulu. Kamu kelewatan tahapan instalasi nomer `6`. Matikan server bentar (`Ctrl + C`), jalanin perintah siluman `php artisan storage:link`, lalu nyalain Server Laravel lagi.

---

## 🚑 Troubleshooting Error Langka (Advance)

Berikut skenario mengerikan + Pil ajaibnya untuk menenangankan pikiran:

* 💥 **Error 500 / "No application encryption key has been specified."**  
  👉 *Sembuhkan dengah Terminal:* `php artisan key:generate`

* 💥 **Error "Target class [...] does not exist." saat jalanin sistem.**  
  👉 Sistem Lupa Arah, paksa refresh dengan mengetik ini di Terminal: `composer dump-autoload`

* 💥 **Error "The POST method is not supported for this route. Supported methods: GET, HEAD." / Halaman Expired (419).**  
  👉 Ingat, website ini di *shield* oleh Token CSRF Laravel setiap saat. Cache kamu kedaluwarsa. Silahkan pencet tombol mundur (Back) lalu refresh (*F5*) halaman / Kosongkan Cache Browser kamu lalu coba ulangi lagi form-nya.

---

*Hati-hati, kecanduan memandangi rapinya arsitektur koding web responsif PMB ini dapat menyebabkan Lupa Waktu!* 💻✨
