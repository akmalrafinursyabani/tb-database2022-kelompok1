<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;

class TransactionController extends BaseController
{
    public function index()
    {
        $model = model(Transaction::class);

        $data = [
            'items' => $model->getTransaction(),
        ];

        
        $model = model(TransactionDetails::class);

        $data = [
            'items' => $model->getTransactionDetail(),
        ];


        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('transaction/list', $data) . view('template/footer');
    }
}
