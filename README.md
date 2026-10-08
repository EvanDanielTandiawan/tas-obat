<div align="center">

# 💊 Tas Obat

**Jadwal minum obat yang dibuka cukup dengan sekali scan barcode**

Dibuat untuk membantu pasien dari segala usia — termasuk lansia — mengingat obat apa, dosis berapa, dan jam berapa harus diminum, tanpa perlu membuka aplikasi atau mengingat jadwal rumit.

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

[Live Demo](https://tasobat.freedev.app/tas/demo) 

</div>

---

## 📖 Latar Belakang

Pasien dengan banyak obat — terutama lansia dengan penyakit kronis seperti diabetes, hipertensi, atau kolesterol — sering kesulitan mengingat kombinasi dosis dan jadwal minum obat yang kompleks. **Tas Obat** menjawab masalah ini dengan pendekatan yang sangat sederhana: tempel satu barcode di tas obat, dan siapa pun yang memindainya langsung melihat jadwal lengkap tanpa instalasi apa pun.

## ✨ Fitur

- 🪪 **Halaman personal** — menyapa sesuai nama, usia, dan jam saat halaman dibuka (pagi/siang/sore/malam)
- 💊 **Kartu obat lengkap** — nama, dosis, frekuensi per hari, aturan minum, dan penjelasan fungsi obat dalam bahasa sederhana
- ✅ **Centang jadwal interaktif** — tombol per waktu minum (pagi/siang/sore/malam) dengan progres visual real-time
- 🔔 **Pengingat waktu aktif** — banner otomatis menyorot dosis yang harus diminum sesuai jam saat ini
- 🎉 **Animasi perayaan** — efek confetti saat semua dosis hari itu selesai dicentang
- 🔠 **Aksesibilitas** — pengaturan ukuran teks (3 tingkat) untuk kenyamanan pengguna lanjut usia
- 📱 **Barcode siap cetak** — generate & unduh QR code langsung dari browser, tanpa dependensi eksternal
- 🗄️ **Tanpa database** — seluruh data obat dikonfigurasi lewat satu file PHP, mudah di-deploy ke hosting mana pun
- ♿ **Mobile-first & reduced-motion aware** — responsif di semua ukuran layar, animasi otomatis nonaktif jika perangkat diatur hemat gerakan

## 🖼️ Pratinjau

| Halaman Utama | Barcode |
|:---:|:---:|
| ![Halaman jadwal obat](docs/screenshot-home.png) | ![Halaman QR code](docs/screenshot-qr.png) |

> *Ganti gambar di atas dengan screenshot Anda sendiri sebelum di-push ke GitHub.*

## 🛠️ Tech Stack

- **Backend:** PHP 8.2, Laravel 11
- **Frontend:** Blade Templates, vanilla JavaScript, CSS murni (tanpa framework CSS)
- **Font:** Atkinson Hyperlegible (keterbacaan tinggi) & Bricolage Grotesque
- **QR Generator:** qrcodejs (client-side, tanpa API eksternal)
- **Penyimpanan progres:** localStorage browser (reset otomatis tiap hari)

## 📂 Struktur Proyek
tas-obat/
├── app/Http/Controllers/
│ └── TasObatController.php # Logika jadwal & pengelompokan waktu minum
├── config/
│ └── tas.php # Data obat & profil pemilik tas (edit di sini)
├── resources/views/
│ ├── tas.blade.php # Halaman jadwal obat
│ └── qr.blade.php # Halaman cetak/unduh barcode
└── routes/
└── web.php
