<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    protected $emailconfig;

    public function __construct()
    {
        $this->emailconfig = new EmailConfig;
    }

    public function index()
    {

        return view('pages/users/index', [
            'users' => $this->usermodel->getUsers(),
            'levels' => $this->levelmodel->findAll(),
            'departments' => $this->departmentmodel->findAll()
        ]);
    }

    public function save_user()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();

        $rules = [
            'password' => 'required|min_length[4]',
            'confirmpassword' => 'required_with[password]|matches[password]'
        ];
        $errors = [
            'password' => [
                'required' => 'Porvafor intrduza a sua senha',
                'min_length' => 'Introduza no minimo 4 caracteres',
                'matches' => 'As senhas não são compativeis',
                'required_with' => 'As senhas não são compativeis'
            ],
        ];

        if (!$this->validateData($data, $rules, $errors)) {

            return redirect()->back()->withInput();
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $status = $this->usermodel->save($data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            print_r((object)$this->usermodel->errors());
            $this->session->setFlashdata('danger', (object)$this->usermodel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function update_user()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $id = $data['id'];
        unset($data['id']);
        $status = $this->usermodel->update($id, $data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            print_r((object)$this->usermodel->errors());
            $this->session->setFlashdata('danger', (object)$this->usermodel->errors());
            return redirect()->back()->withInput();
        }
    }

    public function delete_user()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $status = $this->usermodel->where('id', $data['id'])->delete();

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            return redirect()->back()->with('danger', 'Falha!');
        }
    }

    public function update_password()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        if ($data['password'] != $data['passwordconfirm']) {
            return redirect()->back()->with('danger', ['Falha, senhas incopatíveis!']);
        }

        $status = $this->usermodel->update($data['id'], ['password' => password_hash($data['password'], PASSWORD_DEFAULT)]);

        if (!$status) {
            return redirect()->back()->with('danger', 'Falha!');
        }

        return redirect()->back()->with('success', 'Sucesso!');
    }

    public function password_reset()
    {
        return view('pages/users/password_reset');
    }

    public function send_password_reset()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        // $token =  base64_encode(random_bytes(32));
        $token = $token = bin2hex(openssl_random_pseudo_bytes(32));

        $user = $this->usermodel->where('email', $data['email'])->find()[0];
        if (empty($user)) {
            return redirect()->back()->with('danger', 'Falha!');
        }

        $status = $this->usermodel->update($user->id, ['token' => $token]);

        if ($status) {
            $email = ['email' => $user->email, 'subject' => 'Resuperação de senha', 'message' => 'Prezado(a), se recebeste este email por engano porfavor ingonre.
Caso não é porque desejas efectuar a recuperação de senha, porfavor clique no link abaixo:  ' . url_to('password_renew', $token) . '">'];
            $this->emailconfig->simplemail($email);
        }
        return redirect()->route('login')->with('success', 'Sucesso!');
        // dd($email);
    }

    public function password_renew($token)
    {
        // dd($token);
        // echo($token);
        // dd($this->usermodel->where('token', $token)->find());

        if (empty($this->usermodel->where('token', $token)->find())) {
            return view('pages/users/error');
        }
        // session('token', $token);
        $this->session->set('token', $token);

        return view('pages/users/password_renew');
    }

    public function password_update()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $data['token'] = session('token');

        if (empty($data['token'])) {
            return redirect()->back()->with('danger', 'Token inesistente!');
        }

        if ($data['password'] != $data['password1']) {
            return redirect()->back()->with('danger', 'Falha, senhas incopatíveis!');
        }

        $user = $this->usermodel->where('token', $data['token'])->first();

        $status = $this->usermodel->update($user->id, ['password' => password_hash($data['password'], PASSWORD_DEFAULT), 'token' => '']);

        if (!$status) {
            return redirect()->back()->with('danger', 'Falha!');
        }
        session_unset();
        $email = ['email' => $user->email, 'subject' => 'Resuperação de senha', 'message' => 'Prezado(a), se recebeste este email por engano porfavor ingonre e informe ao administrador do sistema.
       Informamos que a sua senha foi actualizada com sucesso. Porfavor conserve bem. Melhores cumprimentos.'];
                    $this->emailconfig->simplemail($email);

        return redirect()->route('login')->with('success', 'Sucesso!');
    }
}
