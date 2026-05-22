# Tugas Praktikum: Notifikasi & API Perangkat Keras

* **Nama:** Tsaqif Kanz Ahmad
* **Program Studi:** Teknik Informatika
* **Kelas:** IF-11-02

---

## Deskripsi Aplikasi
Aplikasi ini adalah aplikasi Flutter sederhana yang mengintegrasikan API Perangkat Keras (Kamera dan Galeri) menggunakan package `image_picker`, serta sistem notifikasi lokal menggunakan package `flutter_local_notifications`. Ketika pengguna berhasil mengambil foto dari kamera atau memilih gambar dari galeri, foto tersebut akan langsung ditampilkan di layar utama dan aplikasi akan memicu sebuah notifikasi lokal secara real-time.

---

## Penjelasan Singkat Tiap Widget

* **Scaffold:** Widget utama yang berfungsi sebagai kerangka dasar halaman, menyediakan struktur visual untuk meletakkan `AppBar` dan `body` aplikasi.
* **AppBar:** Menampilkan bilah aplikasi di bagian paling atas layar yang memuat judul utama proyek ("Notifikasi & Hardware API").
* **Center:** Widget dekoratif yang berfungsi untuk memastikan seluruh komponen di dalamnya (Layout Column) berada tepat di tengah-tengah layar.
* **Column:** Widget layout vertikal yang menyusun elemen-elemen (area gambar dan barisan tombol) dari atas ke bawah.
* **Image.file:** Widget yang digunakan untuk merender dan menampilkan file gambar secara dinamis dari penyimpanan lokal perangkat (hasil jepretan kamera atau pilihan galeri).
* **Text:** Menampilkan string teks statis, digunakan untuk label tombol serta teks *placeholder* saat foto belum dipilih.
* **SizedBox:** Berfungsi memberikan jarak atau ruang kosong dengan ukuran yang spesifik (tinggi 40 pixel) antara komponen gambar dan tombol di bawahnya.
* **Row:** Widget layout horizontal yang menyusun tombol "Kamera" dan tombol "Galeri" agar posisinya sejajar berdampingan ke samping.
* **ElevatedButton.icon:** Tombol Material Design dengan efek bayangan (elevasi) yang memuat kombinasi ikon dan teks label di dalamnya.
* **Icon:** Menampilkan grafik ikon bawaan dari Material lcons (seperti ikon kamera dan galeri) untuk memperjelas fungsi tombol.

---

## Konfigurasi & Penyelesaian Masalah (Troubleshooting)

Aplikasi ini telah disesuaikan dengan standar perangkat Android modern melalui beberapa konfigurasi tambahan berikut:

1. **Runtime Permission (Android 13+ / API 33):**
   Menambahkan fungsi `requestNotificationsPermission()` pada inisialisasi awal di `main.dart` agar aplikasi memunculkan dialog permintaan izin secara eksplisit kepada pengguna saat pertama kali dijalankan.

2. **Core Library Desugaring (Kotlin DSL):**
   Mengaktifkan `isCoreLibraryDesugaringEnabled = true` dan menambahkan dependensi `coreLibraryDesugaring` pada file `build.gradle.kts` (app) untuk mendukung fitur Java 8 modern yang dibutuhkan oleh plugin notifikasi lokal pada Gradle terbaru.
