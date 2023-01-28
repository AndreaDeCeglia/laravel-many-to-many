<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}

//questo HomeController è stato generato dopo col comando "php artisan make: controller Admin/HomeController" per portarlo nel dom Admin, presa la funzione dall'altro HomeController, si cancella quest'ultimo!!