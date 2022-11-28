<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CashierController extends BaseController
{
    public function index()
    {

        $model = model(Cashier::class);

        $data = [
            'items' => $model->getCashier(),
        ];

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('cashier/list', $data) . view('template/footer');
    }

    public function create()
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Cashier::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name'  => 'required|min_length[3]|max_length[255]',
            'phone_number'  => 'required|min_length[8]',
        ])) {
            $model->save([
                'name' => $this->request->getPost('name'),
                'phone_number' => $this->request->getPost('phone_number'),
            ]);

            return redirect()->to(base_url('/cashier'));
        }

        return view('template/header') . view('template/sidebar') . view('cashier/add') . view('template/footer');
    }

    public function update($id = null)
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Cashier::class);

        $data['item'] = $model->getCashier($id);

        
        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $id);
        }

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name'  => 'required|min_length[3]|max_length[255]',
            'phone_number'  => 'required|min_length[8]',
        ])) {
            $model->save([
                'id' => $this->request->getPost('id'),
                'name' => $this->request->getPost('name'),
                'phone_number' => $this->request->getPost('phone_number'),
            ]);
            return redirect()->to(base_url('/cashier'));
        }

        return view('template/header') . view('template/sidebar') . view('cashier/edit', $data) . view('template/footer');
    }

    public function delete($id = null)
    {
        $model = model(Cashier::class);
        $model->where('id', $id)->delete();
        return redirect()->to(base_url('/cashier'));
    }
}
