<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!auth()->user()) {
            return view('\CodeIgniter\Shield\Views\login');
            // return view('errors/html/no_permission');
            // throw new \CodeIgniter\Exceptions\Exception('You don\'t have permission to access this page. Please login first.');
        }
        return view('template/header') . view('template/sidebar') . view('dashboard') . view('template/footer');
    }
}
