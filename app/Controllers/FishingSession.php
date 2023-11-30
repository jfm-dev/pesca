<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FishingSession extends BaseController
{
    public function index()
    {
        return view(
            'pages/fishing_session/index',
            [
                'publications' => $this->fishingsessionmodel->getPublications(),
                'files' => $this->filesmodel->findAll()
            ]
        );
    }

    public function save_session()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $data['user'] = session('userData')->iduser;
        // dd($data);

        $status = $this->fishingsessionmodel->save($data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            // print_r((object)$this->fishingsessionmodel->errors());
            // $this->session->setFlashdata('danger', (object)$this->usermodel->errors());
            return redirect()->back()->with('danger', 'Erro!');
        }
    }

    public function delete_session()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        // dd($data);
        $status = $this->fishingsessionmodel->delete($data['id']);
        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        } else {
            return redirect()->back()->with('danger', 'Erro!');
        }
    }

    public function save_files()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();

        // $data['user'] = session('userData')->iduser;
        // dd($files);

        if ($file = $this->request->getFile('file')) {
            // foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                echo $filename;

                $file->move(WRITEPATH . 'sessionfiles', $filename);
            } else {
                return redirect()->back()->with('danger', 'Erro!');
            }
            // }
        }
        //  dd($file);
        $status = $this->filesmodel->save(['file' => $filename, 'file_name' => $data['file_name'], 'description' => $data['description'], 'fishing_session' => $data['id'], 'user' => session('userData')->iduser]);
        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        @unlink(WRITEPATH . 'sessionfiles/' . $filename);
        return redirect()->back()->with('danger', 'Erro!');
    }


    public function delete_session_file()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        // dd($data);
        $temp = $this->filesmodel->find($data['id']);
        $status = $this->filesmodel->delete($data['id']);

        if ($status) {
            @unlink(WRITEPATH . 'sessionfiles/' . $temp->file);
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
    }

    public function update_session()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $status = $this->fishingsessionmodel->update($data['id'], $data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');

        dd($data);
    }
}
