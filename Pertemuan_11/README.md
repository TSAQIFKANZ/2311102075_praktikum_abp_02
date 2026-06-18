# Tugas Praktikum Modul 15 - Aplikasi Berbasis Platform (Flutter Cubit)

Aplikasi ini adalah simulasi daftar produk dan keranjang belanja interaktif yang mengimplementasikan **State Management** menggunakan pendekatan **Cubit** (dari *package* `flutter_bloc`).

## 1. My Profile
- **Nama:** Tsaqif Kanz Ahmad
- **NIM:** 2311102075
- **Program Studi:** Teknik Informatika

## 2. Fitur Aplikasi
- **Daftar Produk:** Menampilkan 5 pilihan produk statis dengan UI berbasis *Card* bertema oranye.
- **Add to Cart:** Menambahkan produk ke keranjang belanja. Tombol pada daftar produk akan otomatis berubah menjadi "✔️ditambahkan" jika barang sudah ada di keranjang.
- **Manajemen Kuantitas:** Pengguna dapat menambah (+) atau mengurangi (-) jumlah barang secara langsung dari dalam halaman keranjang.
- **Remove from Cart:** Menghapus item dari keranjang menggunakan tombol *delete* (ikon tempat sampah).
- **Real-time Checkout Bar:** Menampilkan ringkasan total jumlah item (*quantity*) dan total harga secara *real-time* di bagian bawah (*bottom navigation bar*).
- **Interactive UI & Empty State:** Menampilkan notifikasi `SnackBar` saat terjadi interaksi, serta memunculkan tampilan khusus (ikon keranjang abu-abu) ketika keranjang dalam keadaan kosong.

## 3. Tech Stack
- **Framework:** Flutter
- **State Management:** `flutter_bloc` (Cubit)
- **UI Component:** Material Design 3
