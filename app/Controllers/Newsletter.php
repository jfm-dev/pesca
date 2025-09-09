<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Newsletter extends BaseController
{
    protected $emailconfig;

    public function __construct()
    {
        $this->emailconfig = new EmailConfig;
    }


    public function list_message()
    {
        return view('pages/newsletter/messages', ['messages' => $this->messagemodel->getMessages()]);
    }
    public function list_contacts()
    {
        return view('pages/newsletter/contacts', ['subscribed' => $this->newslettermodel->findAll()]);
    }

    public function save_message()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $data['user'] = session('userData')->iduser;
        $data['send'] = 0;

        $status = $this->messagemodel->save($data);

        if (!$status) {
            return redirect()->back()->with('danger', 'Falha!');
        }

        return redirect()->back()->with('success', 'Sucesso!');
    }

    public function update_message()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $id = $data['id'];
        unset($data['id']);
        $status = $this->messagemodel->update($id, $data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
    }

    public function delete_message()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();

        $status = $this->messagemodel->delete($data['id']);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
    }

    public function send_message()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $id = $data['id'];
        // dd($data);
        $sendAttempts  = (object) $this->messagemodel->find($id);

        $status = $this->messagemodel->update($id, ['send' => ($sendAttempts->send + 1)]);

        if (!$status) {
            return json_encode('Ouve uma falha!');
            // return redirect()->back()->with('danger', 'Falha!');
        }

        if ($sendAttempts->type == "E-mail") {
            // dd($sendAttempts->type);
            $this->emailconfig->sendMessage($this->newslettermodel->findAll(), $this->messagemodel->find($id));
        } elseif ($sendAttempts->type === "Mensagem") {
            //
        } else {
            //
        }


        return json_encode('Operação bem sucedida!');
        // return redirect()->back()->with('success', 'Sucesso!');
    }

    public function save_contact(){
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $data['register'] = 1;
  

        $status = $this->newslettermodel->save($data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');

    }

    public function update_contact()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $id = $data['id'];
        unset($data['id']);
        $status = $this->newslettermodel->update($id, $data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
    }

    public function delete_contact()
    {

        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();

        $status = $this->newslettermodel->delete($data['id']);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
    }
}
