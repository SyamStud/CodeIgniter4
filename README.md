# CodeIgniter4
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

1. Tambahkan 2 buah routes berikut ini setelah default root dan tambahkan tambahkan `use App\Controllers\Pages;` sehingga menjadi
   
```PHP
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```
Sehingga menjadi 
```PHP
<?php

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
