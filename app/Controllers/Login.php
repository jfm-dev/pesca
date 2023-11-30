<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
        // echo password_hash('admin',PASSWORD_DEFAULT);
    }

    public function login()
    {
        if (!$this->request->getMethod()) {
            return redirect()->to('/');
        }

        $data =  $this->request->getpost();

        $userData = $this->usermodel
            ->where('username', $data['user'])
            ->where('status', 1)
            ->first();
        if (empty($userData)) {
            $this->session->setFlashdata('danger', 'Dados incorretos, tente novamente!');
            return redirect()->back()->withInput();
        };

        if (!password_verify($data['password'], $userData->password)) {

            $this->session->setFlashdata('danger', 'Dados incorretos, tente novamente!');
            return redirect()->back()->withInput();
        }
        
        $this->session->set('userData', $this->usermodel->getUser($userData->id));
        return redirect()->route('start');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->route('/');
    }
}
