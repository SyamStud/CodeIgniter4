<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Labs extends BaseController
{
    public function index()
    {
        return view('Labs/view');
    }
}
