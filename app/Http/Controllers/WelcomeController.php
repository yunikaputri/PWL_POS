<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Selamat Datang',
            'list' => [
                ['name' => 'Home', 'url' => url('/')],
                ['name' => 'Welcome', 'url' => url('/welcome')]
            ]
        ];
        $activeMenu = 'Dashboard';

        return view('welcome', ['breadcrumb'=> $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}