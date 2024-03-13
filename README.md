# CodeIgniter4
#### Syam Chaidayatullah
#### 220102046
#### TI-2B

`Repository project :` https://github.com/SyamStud/CodeIgniter-Doc

## # Requirements
1. Composer v2.7.2
2. PHP v7.x
3. Visual Studio Code

## # Welcome to Codeigniter
CodeIgniter merupakan sebuah framework untuk pembangunan website berbasis PHP, dirancang untuk mempercepat proses pengembangan proyek dengan menyajikan berbagai perpustakaan untuk kebutuhan umum, ditambah dengan antarmuka yang mudah dan struktur yang logis. Hal ini memudahkan dalam pengembangan, meminimalisir kode yang perlu ditulis untuk berbagai fungsi, sehingga memungkinkan pengembang berfokus pada aspek kreatif proyek mereka.

##  # Installation
### • Instalasi menggunakan Composer
1. Install composer melalui https://getcomposer.org/download/
2. Buka terminal lalu ketikkan perintah berikut:
```sh
composer create-project codeigniter4/appstarter project-name
```

### • Instalasi Manual
1. Buka https://github.com/codeigniter4/framework
2. Click code, lali pilih download ZIP
3. Ekstrak file ZIP yang sudah diunduh

### • Menjalankan Aplikasi
1. Buka folder CodeIgniter4 di Visual Studio Code
2. Buka terminal dengan menekan **CTRL + `**
3. Ketikkan perintah berikut:
```sh
PHP spark serve
```
4. Buka aplikasi di url http://localhost:8080/

## # Build Your First Application
### • Static Website
1. Tambahkan 2 buah routes berikut ini setelah default root dan tambahkan tambahkan `use App\Controllers\Pages;` sehingga menjadi
   
```PHP
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
Sehingga menjadi 
```PHP
<?php
// App/Config/Routes.php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
2. Buat Controller dengan mengetik perintah `PHP spark make:controller Pages`. lalu ketikkan kode berikut:
```PHP
<?php
// App/Controllers/Pages.php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new PageNotFoundException($page);
        }
    
        $data['title'] = ucfirst($page); // Capitalize the first letter
    
        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}
```
3. Buat 2 buah file di App > Views > Templates dengan nama header.php dan footer.php. lalu ketikkan kode berikut:
```PHP
// App/Views/Templates/Header.php

<!doctype html>
<html>
<head>
    <title>CodeIgniter Tutorial</title>
</head>
<body>

    <h1><?= esc($title) ?></h1>
```
```PHP
// App/Views/Templates/Footer.php

    <em>&copy; 2022</em>
</body>
</html>
```
4. Buat 2 file di App > Views > Pages dengan nama home.php dan about.php. lalu ketikkan kode berikut:
```PHP
// App/Views/Pages/Home.php

<!DOCTYPE html>
<html lang="en">
<body>
    <h3>Ini adalah halaman home</h3>
</body>
</html>
```
```PHP
// App/Views/Pages/About.php

<!DOCTYPE html>
<html lang="en">
<body>
    <h3>Ini adalah halaman home</h3>
</body>
</html>
```
5. Jalankan aplikasi dengan mengetikkan perintah berikut di terminal:
```SH
PHP spark serve
```
6. Buka url http://localhost:8080/home dan http://localhost:8080/about sehingga muncul tampilan seperti berikut:
<img width="200" alt="Untitled" src="https://github.com/SyamStud/CodeIgniter4/assets/116321351/e99cebb6-2b0a-4375-a46f-526a687956d7">
<img width="200" alt="Untitled" src="https://github.com/SyamStud/CodeIgniter4/assets/116321351/cfd56844-d092-4cc6-9027-258955258565">

## # CodeIgniter4 Overview
### • Aplication Structure
- **App:**
    - Berisi kode utama aplikasi
    - Sudah memiliki struktur bawaan yang dapat dimodifikasi
    - Subfolder:
        - **Config:** Menyimpan file konfigurasi
        - **Controllers:** Menentukan alur program
        - **Database:** Menyimpan migrasi dan seeder database
        - **Filters:** Menyimpan class filter yang dapat dijalankan sebelum dan sesudah controller
        - **Helpers:** Koleksi fungsi yang dapat digunakan secara mandiri
        - **Language:** Mendukung banyak bahasa, membaca string bahasa dari sini
        - **Libraries:** Kelas yang berguna dan tidak termasuk kategori lainnya
        - **Models:** Bekerja dengan database untuk mewakili entitas bisnis
        - **ThirdParty:** Library pihak ketiga yang dapat digunakan dalam aplikasi
        - **Views:** Menyusun HTML yang ditampilkan kepada pengguna
- **Public:**
    - Folder yang dapat diakses browser, berisi:
        - File `.htaccess` utama
        - File `index.php`
        - Aset aplikasi seperti CSS, Javascript, dan gambar
    - Merupakan "web root" yang diakses oleh web server
- **Writable:**
    - Digunakan untuk direktori yang perlu ditulis selama aplikasi berjalan
    - Biasanya berisi:
        - Direktori untuk menyimpan file cache
        - Direktori log
        - Direktori penyimpanan upload pengguna
- **Tests:**
    - Digunakan untuk menyimpan file pengujian
    - Subfolder `_support` berisi mock class dan utilitas untuk menulis pengujian
    - Tidak perlu dipindahkan ke server produksi
### • Models, Views, Controllers
MVC adalah konsep pemrograman yang memisahkan antara logika, tampilan, dan alur program, sehingga membuat kode lebih mudah dibah dan dipahami.

- **Models:** Berfungsi mengelola data aplikasi dan mengatur aturan bisnis khusus yang mungkin diperlukan. Model ini bisa berupa data pengguna, posting blog, transaksi, dan lain-lain.
- **Views:** Merupakan file sederhana, umumnya berupa HTML dengan sedikit kode PHP. Fungsinya menampilkan informasi kepada pengguna. Data yang ditampilkan berasal dari controller dan diteruskan sebagai variabel. View dapat memuat view lain di dalamnya jika diperlukan.
- **Controllers:** Bertindak sebagai penghubung antara view dan model. Controller menerima input dari pengguna dan menentukan tindakan yang perlu dilakukan. Beberapa tugas controller yaitu meneruskan data ke model untuk disimpan, meminta data dari model untuk ditampilkan ke view, memuat library tambahan untuk menangani tugas khusus, serta menangani hal-hal terkait permintaan HTTP seperti autentikasi.

## # General Topics
### • CodeIgniter URLs
- Base URL yang hanya mengandung hostname
```SH
https://www.example.com/blog/news/2022/10?page=2
```
| Ketentuan | Contoh |
| ------ | ------ |
| Base URL | https://www.example.com/ |
| URI PATH | /blog/news/2022/10 |
| Route PATH | /blog/news/2022/10 |
| QUERY | page=2 |

- BASE URL yang mengandung Sub Folder
```SH
https://www.example.com/ci-blog/blog/news/2022/10?page=2
```
| Ketentuan | Contoh |
| ------ | ------ |
| Base URL | https://www.example.com/ci-blog/ |
| URI PATH | /blog/news/2022/10 |
| Route PATH | /blog/news/2022/10 |
| QUERY | page=2 |

### • Logging Information
Logging information digunakan untuk mencatat informasi penting selama eksekusi aplikasi web. Informasi ini dapat berupa pesan error, peringatan, informasi debug, atau bahkan data kustom yang Anda ingin rekam. Contoh penggunaan:

```PHP
// App/Views/Labs/logging.php

<?php
$info = [
    'id'   => "01",
    'nama' => "budi",
];

log_message('info', 'Pengguna {id} login ke sistem dengan nama {nama}', $info);
```
Buka url yang mengarah pada view tersebut. Misalnya di sini `http://localhost:8080/labs`. Buka debug bar > logs, maka akan tampil sebuah log yang telah dibuat
<br /><br /><img width="960" alt="image" src="https://github.com/SyamStud/CodeIgniter4/assets/116321351/85037923-10b6-4fd4-8001-4ef085889bfe">

**Tingkatan Logging**
| Level     | Description |
|-----------|-------------|
| debug     | Informasi debug terperinci. |
| info      | Peristiwa menarik, seperti pengguna login, logging query SQL, dll. |
| notice    | Peristiwa normal namun signifikan. |
| warning   | Kejadian luar biasa yang bukan kesalahan, seperti penggunaan API yang buruk, dll. |
| error     | Kesalahan runtime yang tidak memerlukan tindakan segera, tetapi harus dicatat dan dipantau. |
| critical  | Kondisi kritis, seperti komponen aplikasi tidak tersedia, atau exception tak terduga. |
| alert     | Tindakan harus segera diambil, seperti website down, database tidak tersedia, dll. |
| emergency | Sistem tidak dapat digunakan. |

## # Building Response
### • HTML Table Class
#### • Static Data
1. Deklarasi Tabel
```PHP
// App/Views/Labs/table.php

<?php

$table = new \CodeIgniter\View\Table();
```
2. Buat sebuah variabel yang berisi data dummy untuk dimasukkan ke dalam tabel. lalu gunakan perintah `$table->generate($data)` untuk mengenerate tabel dengan memasukkan variabel yang sudah dibuat sebagai parameter
```PHP
<?php
// App/Views/Labs/table.php

$table = new \CodeIgniter\View\Table();

$data = [
    ['Name', 'Color', 'Size'],
    ['Fred', 'Blue', 'Small'],
    ['Mary', 'Red', 'Large'],
    ['John', 'Green', 'Medium'],
];

echo $table->generate($data);
```
3. Buka url yang mengarah pada view tersebut. Misalnya di sini `http://localhost:8080/labs`. Maka akan muncul tampilan seperti berikut:
<img width="298" alt="image" src="https://github.com/SyamStud/CodeIgniter4/assets/116321351/ccca79ce-818e-41c0-aac8-0bb5f1034e18">

#### • Dynamic Data
Untuk membuat data dalam tabel dapat berubah-ubah, maka dibutuhkan pengambilan data dari database
```PHP
<?php
// App/Views/Labs/table.php

$table = new \CodeIgniter\View\Table();
$db = new mysqli('localhost', 'root', '', 'pbf-week1');

$query = $db->query('SELECT * FROM categories');

$table->setHeading('ID', 'NAME');

foreach ($query->fetch_all() as $row) {
    $table->addRow($row);
}
echo $table->generate();
```

### • Alternate PHP Syntax for View Files
#### • Alternative Echos
Normal :
```PHP
<?php echo $variable; ?>
```
Alternatif :
```PHP
<?= $variable ?>
```

#### • Alternative Control Structures
Normal :
```PHP
<ul>

<?php foreach ($todo as $item){ ?>

    <li><?= $item ?></li>

<?php } ?>

</ul>
```
Alternatif :
```PHP
<ul>

<?php foreach ($todo as $item): ?>

    <li><?= $item ?></li>

<?php endforeach ?>

</ul>
```

## # Working With Databases
### • Database Configuration
Untuk dapat menggunakan database, perlu melakukan konfigurasi terlebih dahulu. Buka App > Config > Database.php, lalu isikan username, password, dan database yang sesuai.
```PHP
<?php
// App/Config/Database.php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    // ...

    public array $default = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'pbf-week1',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    // ...
}
```
### • Connecting to a Database
Metode pertama :
```PHP
$db = \Config\Database::connect();
```
Metode kedua :
```PHP
$db = db_connect();
```

### • Running Qeries
Reguler Query :
```PHP
<?php
// App/Views/Labs/query.php

$db = db_connect();
$db->query('SELECT * FROM table');
```
```PHP
<?php

$query = $db->query('SELECT * FROM table');
```
Simplified Query :
`simpleQuery()` tidak mengembalikan kumpulan hasil (result set) dari database dan hanya digunakan untuk write queries seperti INSERT, DELETE, atau UPDATE
```PHP
<?php

if ($db->simpleQuery('INSERT INTO table VALUES (values1, values2, values3')) {
    echo 'Success!';
} else {
    echo 'Query failed!';
}
```

## # Helpers
### • Number Helper
Untuk dapat menggunakan helper, perlu untuk menuliskan perintah `helper()` yang berisi parameter untuk helper yang dibutuhkan
```PHP
<?php
// App/Views/Labs/views.php

helper('number');
```
Contoh Number Helper :
```PHP
// number_to_size($num[, $precision = 1[, $locale = null]])
echo number_to_size(456);

// number_to_amount($num[, $precision = 1[, $locale = null])
echo number_to_amount(123456);

// number_to_currency($num, $currency[, $locale = null[, $fraction = 0]])
echo number_to_currency(1234.56, 'USD', 'en_US', 2);

// number_to_roman($num)
echo number_to_roman(23);
```

### • Date Helper
```PHP
<?php

helper('date');
```
Contoh Date Helper :
```PHP
// now([$timezone = null])
echo now();

// timezone_select([$class = '', $default = '', $what = \DateTimeZone::ALL, $country = null])
echo timezone_select('custom-select', 'America/New_York');
```
