<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TransactionController extends BaseController
{
    public function index()
    {
        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('transaction/list') . view('template/footer');
    }
}
