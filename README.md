# Sistem Informasi Arsip Surat - Desa Karangduren

## 🎯 Tujuan
Aplikasi ini dibuat untuk mengelola arsip surat masuk dan keluar di Desa Karangduren secara lebih efisien dan terstruktur.

## ✨ Fitur
- CRUD Kategori Surat
- CRUD Arsip Surat
- Upload file surat (PDF)
- Halaman About (identitas pembuat)
- Tanggal unggah otomatis
- Sidebar navigasi

## 🚀 Cara Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/ereenlourenza/si_arsipsurat.git
2. Masuk folder project:
   cd si_arsipsurat
3. Install dependencies:
   composer install
   npm install && npm run dev
4. Import database dari file database/si_arsipsurat.sql
5. Konfigurasi .env:
   - database name: si_arsipsurat
   - username: root
   - password: 
   - APP_URL=http://localhost:8000
   - jalankan server: php artisan serve

## 📸 Screenshot
![Halaman Arsip](screenshot/arsip-surat.png)
![Unggah Arsip](screenshot/arsip-surat-unggah.png)
![Lihat Arsip](screenshot/arsip-surat-lihat.png)
![Edit Arsip](screenshot/arsip-surat-edit.png)
![Hapus Arsip](screenshot/arsip-surat-hapus.png)
![Halaman Kategori](screenshot/kategori-surat.png)
![Tambah Kategori](screenshot/kategori-surat-tambah.png)
![Edit Kategori](screenshot/kategori-surat-edit.png)
![Hapus Kategori](screenshot/kategori-surat-hapus.png)
![Halaman About](screenshot/about.png)