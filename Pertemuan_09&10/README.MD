# Tugas Praktikum: To-Do List App with Provider & Firebase Cloud Messaging (FCM)

Aplikasi ini mengintegrasikan **Provider** sebagai *state management* lokal untuk mengelola daftar tugas (*To-Do List*) dan **Firebase Cloud Messaging (FCM)** untuk menerima notifikasi *push* secara *realtime* dari Firebase Console.

## 1. Fitur Aplikasi
- **Manajemen Tugas Lokal (State Management Provider):**
  - Menampilkan daftar tugas secara dinamis.
  - Menambahkan tugas baru melalui dialog interaktif.
  - Menghapus semua tugas secara massal dengan satu tombol.
- **Integrasi Firebase Cloud Messaging (FCM):**
  - Registrasi perangkat secara otomatis untuk mendapatkan token unik perangkat (*FCM Registration Token*).
  - Menangkap pesan notifikasi dari Firebase Console saat aplikasi berada di latar depan (*foreground*) dan menampilkannya dalam bentuk komponen *SnackBar* hijau secara instan.

## 2. Tech Stack & Dependensi
- **Framework:** Flutter (Dart)
- **State Management:** `provider`
- **Backend Service:** Firebase (Firebase Core & Firebase Messaging)
- **Konfigurasi Alat:** FlutterFire CLI

## 3. Struktur Direktori `lib/`
Struktur kode di dalam proyek ini diatur secara modular agar mudah dipelihara (*clean architecture*):
```text
lib/
 ├── firebase_options.dart   # Konfigurasi otomatis dari FlutterFire CLI
 ├── main.dart               # Titik masuk utama aplikasi & inisialisasi FCM
 ├── providers/
 │    └── todo_provider.dart # Logika bisnis dan status data To-Do List
 └── screens/
      └── home_screen.dart   # Antarmuka Pengguna (UI) utama aplikasi
