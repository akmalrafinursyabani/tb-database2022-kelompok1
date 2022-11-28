<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Item;

class ItemController extends BaseController
{
    public function index()
    {

        $model = model(Item::class);

        $data = [
            'items' => $model->getItem(),
        ];

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        return view('template/header') . view('template/sidebar') . view('item/list', $data) . view('template/footer');
    }

    public function create()
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Item::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'code' => 'required|min_length[3]|max_length[255]',
            'name'  => 'required|min_length[3]|max_length[255]',
            'stock'  => 'required|min_length[1]',
            'price'  => 'required',
            'category'  => 'required',
        ])) {
            $model->save([
                'code' => $this->request->getPost('code'),
                'name' => $this->request->getPost('name'),
                'stock' => $this->request->getPost('stock'),
                'price' => $this->request->getPost('price'),
                'category'  => $this->request->getPost('category'),
            ]);

            return redirect()->to(base_url('/items'));
        }

        return view('template/header') . view('template/sidebar') . view('item/add') . view('template/footer');
    }

    public function update($id = null)
    {

        if (!auth()->user()) {
            return view('errors/html/no_permission');
        }

        $model = model(Item::class);

        $data['item'] = $model->getItem($id);

        
        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $id);
        }

        if ($this->request->getMethod() === 'post' && $this->validate([
            'code' => 'required|min_length[3]|max_length[255]',
            'name'  => 'required|min_length[3]|max_length[255]',
            'stock'  => 'required|min_length[1]',
            'price'  => 'required',
            'category'  => 'required',
        ])) {
            $model->save([
                'id' => $this->request->getPost('id'),
                'code' => $this->request->getPost('code'),
                'name' => $this->request->getPost('name'),
                'stock' => $this->request->getPost('stock'),
                'price' => $this->request->getPost('price'),
                'category'  => $this->request->getPost('category'),
            ]);
            return redirect()->to(base_url('/items'));
        }

        return view('template/header') . view('template/sidebar') . view('item/edit', $data) . view('template/footer');
    }

    public function delete($id = null)
    {
        $model = model(Item::class);
        $model->where('id', $id)->delete();
        return redirect()->to(base_url('/items'));
    }
}
