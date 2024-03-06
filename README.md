<h1 align="center">
<a href="https://github.com/arizkinewbie/aplikasi-sederhana-phiraka" target="_blank">Aplikasi Sederhana Phiraka</a>
  <br>
</h1>

<h4 align="justify">Website yang menawarkan sistem pengelolaan pengguna <i>(User Management System)</i> yang efisien dan aman. Website ini menyediakan fitur-fitur dasar seperti login user, tambah user, serta operasi CRUD (Create, Read, Update, Delete) terhadap data user, dengan tambahan keamanan yang diperkuat melalui implementasi Google reCAPTCHA untuk menghindari bot dan spam. Desainnya yang intuitif dan responsif memastikan pengalaman pengguna yang lancar, menjadikannya solusi ideal untuk manajemen data pengguna dalam lingkup aplikasi yang sederhana namun aman. <a href="https://aplikasi-sederhana-phiraka.arizkinewbie.com/" target="_blank">LIVE DEMO HERE</a></h4>

<p align="center">
  <a href="#key-features">Key Features</a> •
  <a href="#how-to-use">How To Use</a> •
  <a href="#credits">Credits</a> •
  <a href="#license">License</a>
</p>

![screenshot](https://raw.githubusercontent.com/arizkinewbie/aplikasi-sederhana-phiraka/master/public/screenshot.png)

## Key Features

- **Autentikasi Pengguna yang Aman**: Memanfaatkan sistem login dengan validasi input yang kuat dan penggunaan Google reCAPTCHA untuk mencegah akses otomatis oleh bot, meningkatkan keamanan aplikasi.
- **Manajemen Data Pengguna**: Memungkinkan operasi CRUD (Create, Read, Update, Delete) pada data pengguna, dengan antarmuka yang intuitif dan mudah digunakan, memastikan pengelolaan data yang efisien.
- **Validasi Form yang Dinamis**: Memastikan semua input dari pengguna divalidasi secara real-time, mengurangi risiko kesalahan pengguna dan memastikan data yang masuk ke database bersih dan valid.
- **Tampilan Responsif**: Desain responsif yang memastikan aplikasi dapat diakses dengan nyaman di berbagai perangkat, dari desktop hingga perangkat mobile.
- **Feedback Instan**: Menggunakan AJAX untuk operasi form, memungkinkan pengguna menerima umpan balik langsung tanpa perlu memuat ulang halaman, seperti pada proses login.
- **Keamanan Data Tingkat Lanjut**: Enkripsi password menggunakan teknik hashing modern dan penerapan kebijakan keamanan yang ketat untuk melindungi data pengguna dari akses tidak sah.
- **Interaktivitas Tinggi**: Penggunaan JavaScript dan Bootstrap untuk memperkaya interaksi pengguna dengan aplikasi, membuat pengalaman pengguna menjadi lebih lancar dan interaktif.

Aplikasi ini dirancang dengan fokus pada keamanan, kemudahan dan efisien dalam manajemen data pengguna, menjadikannya solusi ideal untuk proyek yang membutuhkan sistem manajemen pengguna yang terintegrasi dengan fitur keamanan modern.

## How To Use

Untuk menggunakan aplikasi ini di lingkungan [local](localhost:8080), ikuti langkah-langkah berikut:

1. Clone the repository

   ```bash
   git clone https://github.com/arizkinewbie/aplikasi-sederhana-phiraka
   ```

2. Go into the repository

   ```bash
   cd aplikasi-sederhana-phiraka
   ```

3. Install dependencies

   ```bash
   composer install
   ```

4. Migrate database

   ```bash
   php spark migrate
   ```

5. Seed database

   ```bash
   php spark db:seed UserSeeder
   ```

6. Run the app

   ```bash
   php spark serve
   ```

7. Buka [http://localhost:8080](http://localhost:8080) di browser dan jangan lupa atur file `.env.example` ke `.env` beserta isi file tersebut

## Credits

Website ini menggunakan beberapa sumber daya berikut:

- [CodeIgniter 4](https://codeigniter.com/)
- [MySQL](https://www.mysql.com/)
- [Bootstrap 5](https://getbootstrap.com/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [DataTables](https://datatables.net/)
- [SweetAlert2](https://sweetalert2.github.io/)
- [reCAPTCHA](https://www.google.com/recaptcha)

## You may also like

- [Fibonacci Phiraka](https://github.com/arizkinewbie/fibonacci-phiraka) - Simple Fibonacci View Website

## License

Proyek ini dilisensikan di bawah [Lisensi MIT](LICENSE).

> [arizkinewbie.com](https://www.arizkinewbie.com) &nbsp;&middot;&nbsp;
> GitHub [@arizkinewbie](https://github.com/amitmerchant1990)
