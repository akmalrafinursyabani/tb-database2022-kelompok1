<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cashier;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends BaseController
{
    public function index()
    {
        $model = model(Transaction::class);

        $data = [
            'items' => $model->getTransaction(),
            // 'testrandom' => "INV" . substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15 / strlen($x)))), 1, 15)
        ];


        // $model = model(TransactionDetails::class);

        // $data = [
        //     'items' => $model->getTransactionDetail(),
        // 'testrandom' => substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(12/strlen($x)) )),1,12)
        // ];


        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('transaction/list', $data) . view('template/footer');
    }

    public function create()
    {

        $customers = model(Customer::class);
        $items = model(Item::class);
        $cashiers = model(Cashier::class);


        $getInvoice = "";

        $data = [
            'customers' => $customers->getCustomer(),
            'items' => $items->getItem(),
            'cashiers' => $cashiers->getCashier(),
        ];

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Transaction::class);

        if ($this->request->getMethod() === 'post') {
            $generateInvoice = "INV" . substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15 / strlen($x)))), 1, 15);
            $getInvoice = $generateInvoice;
            $model->save([
                'invoice' => $getInvoice,
                'customer_id' => $this->request->getPost('customer'),
                'cashier_id' => $this->request->getPost('cashier'),
            ]);

            return redirect()->to(base_url('/transaction'));
        }

        return view('template/header') . view('template/sidebar') . view('transaction/add', $data) . view('template/footer');
    }

    public function currentTransaction()
    {

        $customers = model(Customer::class);
        $items = model(Item::class);
        $cashiers = model(Cashier::class);

        $getInvoice = "";
        
        $db = db_connect();
        $db->query("SELECT *, transaction_details.id AS td_id FROM transaction_details  INNER JOIN transactions on transaction_details.invoice_number = transactions.invoice");

        $data = [
            'customers' => $customers->getCustomer(),
            'items' => $items->getItem(),
            'cashiers' => $cashiers->getCashier(),
            'db' => $db,
        ];

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Transaction::class);

        if ($this->request->getMethod() === 'post') {
            $generateInvoice = "INV" . substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15 / strlen($x)))), 1, 15);
            $getInvoice = $generateInvoice;
            $model->save([
                'invoice' => $getInvoice,
                'customer_id' => $this->request->getPost('customer'),
                'cashier_id' => $this->request->getPost('cashier'),
            ]);

            return redirect()->to(base_url('/transaction'));
        }

        return view('template/header') . view('template/sidebar') . view('transaction/add', $data) . view('template/footer');
    }

    public function delete($id = null)
    {
        $model = model(Transaction::class);
        $model->where('id', $id)->delete();
        return redirect()->to(base_url('/transaction'));
    }
}
