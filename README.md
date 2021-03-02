# SiBuKer TOPSIS
<p align=justify>Projek ini adalah hasil dari skripsi saya yaitu Sistem Informasi Bursa Kerja dengan Sistem Pendukung Keputusan Menggunakan TOPSIS. Terdapat beberapa fitur yaitu: daftar harus aktivasi dengan email, mencari rekomendasi lowongan yang sesuai dengan kriteria yang diinginkan oleh alumni, bisa menjembatani antara pihak perusahaan dengan alumni dalam masalah lamar pekerjaan dan notifikasi email saat ada review dari perusahaan yang dilamar lowongannya oleh alumni serta notifikasi dari alumni saat melamar lowongan dari pihak perusahaan. Projek ini dibuat menggunakan Template(Frontend dan Backend), Bootstrap 4, Javascript, Codeigniter 4.</p>

# Server Requirements
PHP version 7.3 atau direkomendasikan menggunakan yang paling terbaru. Server disesuaikan dengan spesifikasi codeigniter untuk bisa berjalan dengan baik.

# Instalasi
Silahkan ikuti langkah-langkah di bawah ini untuk menjalan projek.
1. Pastikan sudah terinstall composer di device yang dipakai. Jika belum terinstall, bisa ke [sini](https://getcomposer.org/) untuk menginstall composer.
2. Uncomment # sebelum ```;extension=intl``` menjadi ```extension=intl```.
3. masuk ke directory project, kemudian buka terminal/cmd ketik ```composer update```.
4. Import db file nya terletak di folder DB.
5. Edit config menggunakan file env rubah file env ganti nama menjadi .env Kemudian sesuaikan : 
  * Masukkan base_url yang sesuai -> ```app.baseURL = ''``` 
  * Masukkan hostname DBMS yang sesuai -> ```database.default.hostname = ''``` .
  * Masukkan nama DBMS yang sesuai -> ```database.default.hostname = ''``` .
  * Masukkan username DBMS yang sesuai -> ```database.default.username = ''``` .
  * Masukkan password DBMS yang sesuai -> ```database.default.password = ''``` .
6. Untuk masuk ke halaman backend terdapat 3 hak akses yaitu
  * Perusahaan  : (username : tirta) (password : 1)
  * Admin       : (username : admin) (password : admin)
  * Alumni      : (username : 1718006) (password : 1)
7. Terakhir ketik ```php spark serve``` untuk menjalankan programnya dan program siap digunakan.

# Demo
Link demo app : https://1718006.000webhostapp.com/
<br>Video about the app : https://www.youtube.com/watch?v=O3QvmxBDD9E&t=16s


