<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
       
        return view('pages/category/index', ['categories' => $this->categorymodel->findAll()]);
     
    }

    public function save_category()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();

        $status = $this->categorymodel->save($data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            return redirect()->back()->with('danger', 'Falha!');
        }
    }


    public function delete_category()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $status = $this->categorymodel->where('id', $data['id'])->delete();

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            return redirect()->back()->with('danger', 'Falha!');
        }
    }

    public function update_category()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        // var_dump($data);
        // die();
        $status = $this->categorymodel
            ->update(
                $data['id'],
                [
                    'name' => $data['name'],
                    'description' => $data['description']
                ],

            );

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            return redirect()->back()->with('danger', 'Falha!');
        }
    }
}
