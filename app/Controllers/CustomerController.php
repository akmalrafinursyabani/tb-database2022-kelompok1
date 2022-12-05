<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;

class CustomerController extends BaseController
{
    public function index()
    {

        $model = model(Customer::class);

        $data = [
            'items' => $model->getCustomer(),
        ];

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('customer/list', $data) . view('template/footer');
    }

    public function create()
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Customer::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name'  => 'required|min_length[3]|max_length[255]',
            'phone_number'  => 'required|min_length[8]',
            'address'  => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'name' => $this->request->getPost('name'),
                'phone_number' => $this->request->getPost('phone_number'),
                'address' => $this->request->getPost('address'),
            ]);

            return redirect()->to(base_url('/customer'));
        }

        return view('template/header') . view('template/sidebar') . view('customer/add') . view('template/footer');
    }

    public function update($id = null)
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Customer::class);

        $data['item'] = $model->getCustomer($id);


        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $id);
        }

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name'  => 'required|min_length[3]|max_length[255]',
            'phone_number'  => 'required|min_length[8]',
            'address'  => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'id' => $this->request->getPost('id'),
                'name' => $this->request->getPost('name'),
                'phone_number' => $this->request->getPost('phone_number'),
                'address' => $this->request->getPost('address'),
            ]);
            return redirect()->to(base_url('/customer'));
        }

        return view('template/header') . view('template/sidebar') . view('customer/edit', $data) . view('template/footer');
    }

    public function delete($id = null)
    {
        $model = model(Customer::class);
        $model->where('id', $id)->delete();
        return redirect()->to(base_url('/customer'));
    }
}
