<?php

namespace App\Controllers;

class Departments extends BaseController
{
   public function index()
   {
      return view(
         'pages/department/index',
         [
            'departments' => $this->departmentmodel->findAll(),
            'users' => $this->usermodel->getUsers(),
         ]
      );
   }
   public function save_department()
   {
      if ($this->request->getMethod() != 'post') {
         return redirect()->to('/');
      }

      $data = $this->request->getPost();
      $data['user'] = session('userData')->iduser;
      $status = $this->departmentmodel->save($data);

      if ($status) {
         return redirect()->back()->with('success', 'Sucesso!');
      }
      return redirect()->back()->with('danger', 'Falha!');
   }
}
