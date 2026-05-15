# Tugas Praktikum Flutter - Widget UI

* **Nama:** Tsaqif Kanz Ahmad
* **NIM:** 2311102075
* **Kelas:** IF-11-02

## Penjelasan Singkat Widget
Berikut adalah penjelasan dari masing-masing widget yang digunakan:

1. **Container:** Berfungsi sebagai wadah serbaguna untuk mengatur tata letak, ukuran, warna, dan dekorasi (seperti border radius). Pada kode ini, Container digunakan untuk membuat "Container box" oranye, serta menjadi dasar pembuatan custom function `demoCard` berbayang yang membungkus setiap tugas.
2. **GridView:** Menggunakan `GridView.builder` untuk menampilkan deretan kotak dalam bentuk grid dua dimensi. Pada tugas ini, diatur menjadi 3 kolom fix (`crossAxisCount: 3`) yang me-render 6 item biru secara dinamis dan efisien.
3. **ListView (Statis):** Menampilkan daftar berurut ke bawah dengan data yang ditulis langsung di dalam kodingan (hardcoded). Digunakan untuk menampilkan 3 item (A, B, C) menggunakan `ListTile` yang dilengkapi ikon profil biru.
4. **ListView.builder:** Membangun daftar item secara dinamis yang datanya diambil dari sebuah array/list (`builderItems`) yang berisi Data 1-3. Metode ini sangat optimal memori karena hanya me-render list yang sedang terlihat di layar HP.
5. **ListView.separated:** Memiliki fungsi dan efisiensi yang sama dengan `builder`, namun dilengkapi dengan fitur pemisah bawaan. Pada tugas ini, pemisahnya menggunakan widget `Divider` (garis batas tipis) yang otomatis muncul di antara item data Satu hingga Empat.
6. **Stack:** Digunakan untuk menempatkan beberapa widget secara bertumpuk di satu koordinat yang sama (seperti lapisan kue). Pada tugas ini, Stack diatur rata tengah (`Alignment.center`) untuk menumpuk 3 Container berbeda ukuran dan warna (BlueGrey, Amber, dan RedAccent) dengan kotak terbesar berada di paling bawah.
