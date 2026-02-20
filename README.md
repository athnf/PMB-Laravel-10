<p align="center">
  <img src="public/logo65.png" alt="Logo SMKN 65" width="120" />
</p>

<h1 align="center">Sistem Penerimaan Mahasiswa Baru Berbasis Web</h1>

<p align="center">
  <strong>Sistem Informasi Manajemen Seleksi dan Pendaftaran Akademik</strong><br>
  <em>Dikembangkan menggunakan arsitektur Laravel untuk memenuhi standar keamanan dan efisiensi pelaksanaan ujian daring.</em>
</p>

<p align="center">
  <a href="#tinjauan-sistem">Tinjauan Sistem</a> •
  <a href="#fitur-utama">Fitur Utama</a> •
  <a href="#teknologi-yang-digunakan">Teknologi</a> •
  <a href="#panduan-instalasi">Panduan Instalasi</a> •
  <a href="#faq--troubleshooting">FAQ</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
</p>

---

## 📝 Deskripsi Proyek

Aplikasi **Sistem Penerimaan Mahasiswa Baru Berbasis Web** ini dirancang secara komprehensif guna mendigitalisasi proses administrasi penerimaan kandidat mahasiswa / siswa baru, mulai dari tahap registrasi awal, pelaksanaan seleksi berbasis komputer (CBT), evaluasi penilaian, hingga verifikasi daftar ulang.

Pengembangan antarmuka pada modul ujian secara khusus mengadaptasi format tampilan seleksi akademik berskala nasional (seperti SNBT/UTBK), dengan mengutamakan aspek kejelasan, ketegasan instruksi, serta integrasi sistem pengawasan otomatis (*Anti-Cheat*).

---

## 📸 Tinjauan Sistem (Preview)

Berikut adalah beberapa tampilan utama dari antarmuka sistem:

| Halaman Utama (Landing Page) |
| :---: |
| <img src="docs/images/Landing%20Page.jpeg" alt="Landing Page Preview" width="100%"> |
| *Halaman depan sebagai pusat informasi registrasi dan portal masuk.* |

| Portal Mahasiswa (Student Dashboard) | Panel Administrator (Admin Dashboard) |
| :---: | :---: |
| <img src="docs/images/Portal%20Mahasiswa.jpg" alt="Portal Mahasiswa" width="100%"> | <img src="docs/images/Admin%20Dashboard.jpg" alt="Admin Dashboard" width="100%"> |
| *Antarmuka pendaftar untuk mengakses modul ujian dan memantau status kelulusan secara real-time.* | *Dashboard operasional panitia untuk memvalidasi kelulusan, meninjau statistik, dan mengawasi jalannya ujian.* |

---

## 🚀 Fitur Utama

Sistem ini memiliki dua hak akses utama (*Role-Based Access Control*) dengan pembagian fungsionalitas sebagai berikut:

### Modul Pendaftar (Student)
- **Manajemen Akun Terpusat:** Registrasi dan pengelolaan profil identitas.
- **Ujian Online CBT (*Computer Based Test*):** Pelaksanaan ujian pilihan ganda yang bersifat acak dengan batasan waktu yang disinkronisasi ke server.
- **Sistem *Anti-Cheat* (Keamanan Ujian):** Memiliki mekanisme pendeteksian perpindahan halaman browser (*tab change/window blur*), serta meminimalisir manipulasi sesi dengan penyimpanan jawaban *real-time* berbasis AJAX.
- **Informasi Kelulusan:** Penampilan hasil skor dan pengumuman tahap seleksi.
- **Registrasi Ulang (Pemberkasan):** Proses unggah bukti administrasi keberhasilan uji seleksi dan pencetakan Nomor Induk Mahasiswa (NIM).

### Modul Pengelola (Administrator)
- **Analitik Dashboard:** Ringkasan statistik pendaftar, jumlah peserta seleksi, dan data kelulusan.
- **Manajemen Bank Soal:** Fasilitas *Create, Read, Update, Delete* (CRUD) untuk mengatur ragam soal materi seleksi berserta konfigurasi kunci jawaban.
- **Peninjauan Hasil Seleksi:** Pemantauan nilai ujian aktual dan hak untuk memberikan status akhir kelulusan pendaftar.
- **Validasi Berkas:** Review pengajuan pendaftaran ulang dan verifikasi dokumen pembayaran.
- **Generator NIM Otomatis:** Fasilitas pemberian hak registrasi identitas akademik final.

---

## ⚙️ Teknologi yang Digunakan

Arsitektur aplikasi dibangun dengan memanfaatkan ekosistem modern:

* **Framework Backend:** Laravel 10.x
* **Bahasa Pemrograman:** PHP 8.2+
* **Sistem Basis Data:** MySQL 8.x
* **Framework Frontend / UI:** Tailwind CSS v3.x
* **Interaktivitas:** Vanilla JavaScript, jQuery (untuk penanganan AJAX), Alpine.js, dan SweetAlert2

---

## 🛠️ Panduan Instalasi Konfigurasi (Lokal)

Ikuti instruksi langkah demi langkah di bawah ini untuk memasang dan menjalankan proyek secara mandiri pada komputer Anda (*Local Development Environment*). Pastikan Anda telah menginstal **PHP**, **Composer**, dan perangkat lunak Server Database (XAMPP / Laragon dsb).

### Bước 1: Unduh Repositori
Jalankan perintah ini pada terminal untuk mengkloning repositori:
```bash
git clone https://github.com/athnf/pmb-system.git
```
Pindah ke dalam direktori aplikasi:
```bash
cd pmb-system
```

### Bước 2: Pasang Dependensi Proyek
Unduh pustaka (library) paket *vendor* yang dibutuhkan oleh Laravel:
```bash
composer install
```

### Bước 3: Konfigurasi Lingkungan (*Environment*)
Salin file `.env.example` ke dalam format konfigurasi asli:
```bash
cp .env.example .env
```
Buka file `.env` di teks editor, lalu atur *kredensial* basis data Anda. Pastikan nama database yang tertulis sama persis dengan nama database kosong yang telah Anda buat di MySQL/PhpMyAdmin sebelumnya.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_system   # (Sesuaikan dengan nama basis data yang Anda buat)
DB_USERNAME=root
DB_PASSWORD=
```

### Bước 4: Pembuatan Kunci Enkripsi Aplikasi
Aktivasi algoritma keamanan sesi aplikasi:
```bash
php artisan key:generate
```

### Bước 5: Pemrosesan Basis Data dan Penyemaian Data Awal
Susun kerangka struktur basis data dan suntikkan data *default* seperti Akun Admin dan Data Uji Soal (*Seeder*):
```bash
php artisan migrate:fresh --seed
```

### Bước 6: Hubungkan Tautan Penyimpanan Publik (*Storage Link*)
Langkah ini diwajibkan untuk memastikan seluruh fail *upload* (berupa bukti transfer pendaftar) dapat terakses secara publik di peramban web:
```bash
php artisan storage:link
```

### Bước 7: Jalankan Aplikasi
Instalasi telah selesai. Nyalakan peladen web virtual dengan perintah:
```bash
php artisan serve
```
Aplikasi kini berjalan di: **`http://localhost:8000`** atau **`http://127.0.0.1:8000`**

---

## 🔐 Data Login (*Default Credentials*)

Apabila Anda telah menjalankan perintah *seed* (*Bước 5*), maka hierarki akun demo di bawah siap untuk digunakan.

**Akses Pengelola (Admin)**
* Halaman Pintu Masuk: **`/login`**
* Alamat Surel: **`admin@admin.com`**
* Kata Sandi: **`password`**

**Akses Peserta Ujian (Mahasiswa Baru)**
Gunakan tautan pendaftaran (`/register`) pada halaman utama aplikasi untuk mencoba melakukan pembuatan akun mandiri (Simulasi User).

---

## 📖 FAQ & Panduan Solusi Kesalahan Umum (Troubleshooting)

**Q: Perintah `php artisan migrate` gagal berjalan (Connection Refused).**  
A: Layanan *database/MySQL* pada komputer belum aktif. Buka perangkat lunak XAMPP atau Laragon, lalu pastikan Anda menekan *Start* pada modul MySQL. Pastikan juga Anda sudah membuat database dengan nama yang tertuang pada file `.env`.

**Q: Mengapa pada laman Admin, fitur kelulusan menampilkan pesan galat mengenai file gambar atau *storage*?**  
A: Sangat mungkin Anda melewati langkah menautkan folder publik. Cukup jalankan perintah `php artisan storage:link`.

**Q: Terjadi kegagalan saat Calon Mahasiswa berusaha mengirim soal dengan notifikasi Status / Sesi tidak ditemukan?**  
A: Pelaksanaan ujian dibekali parameter deteksi pembatasan interaksi. Segala aktivitas di luar batas antarmuka ujian—termasuk perpindahan menuju bilik jendela sistem operasi lain (Tab Out)—didokumentasikan. Apabila pelaksana melanggar hingga batasan toleransi, sistem memblokir tindakan *submit*. Hubungi Admin untuk mereset data pada Pangkalan Basis Data (`exam_sessions`).

**Q: Terjadi Error: `No application encryption key has been specified`.**  
A: File `.env` kehilangan kode `APP_KEY`. Atasi dengan menjalankan perintah `php artisan key:generate`.

**Q: Halaman menunjukkan pesan "Expired" (Error 419) pada saat menyerahkan formulir.**  
A: Form *CSRF Token* yang di-*render* oleh Laravel telah usang karena durasi sesi lama dibiarkan tidak aktif. Penyelesaiannya adalah memuat ulang (*refresh/F5*) dan mengisi kembali formulir pada situs bersangkutan.

---

## 📜 Keterangan & Atribusi Pengembangan

Aplikasi perangkat lunak ini diinisiasi dan dikembangkan dalam kurun waktu **± 1 Bulan**, mencakup fase abstraksi pemodelan sistem, penyusunan tata letak rupa antarmuka, penanaman fitur pengamanan algoritma sesi ujian (*Anti-Cheat*), sampai finalisasi *debugging* infrastruktur MVC (*Model-View-Controller*). Proyek ini merupakan wujud dedikasi hibah secara teknikal untuk standar *Ujian Sertifikasi Kompetensi (USK)*.

Terima kasih untuk kelancaran jalannya proyek sertifikasi ini, atas nama:
- 🎓 **Kandidat Praktikan** : TRISTAN
- 🏫 **Kelas & Jurusan** : XII PPLG 
- 🏛️ **Instansi Pendidikan** : SMK Negeri 65 Jakarta

Proyek pengembangan arsitektur basis kode berskala *Full-Stack* ini dilaksanakan dengan arahan langsung dan dihibahkan oleh:  
💻 **Alumnus / Pengembang Profesional**: [@athnf](https://github.com/athnf) di GitHub.

***
*Merupakan komitmen kami untuk menghadirkan kualitas perangkat lunak dengan pedoman standar industri yang valid dan profesional.*
