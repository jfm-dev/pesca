<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notice extends BaseController
{
    public function index()
    {
        return view('pages/notice/index', ['notices' => $this->noticemodel->getNotices()]);
    }

    public function save_notice()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $data['user'] = session('userData')->iduser;
        $file = $this->request->getFile('image');
        // dd($file);
        // dd($data);


        if ($file = $this->request->getFile('image')) {
            // foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                $data['image'] = $filename;
                // dd($filename);

                $file->move(WRITEPATH . 'notices', $filename);
            } else {
                return redirect()->back()->with('danger', 'Erro!');
            }
            // }
        }

        $status = $this->noticemodel->save($data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }

        @unlink(WRITEPATH . 'notices/' . $filename);
        return redirect()->back()->with('danger', 'Erro!');
        // dd($file);
    }

    public function update_notice()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $oldfile = $data['file'];
        $id = $data['id'];
        unset($data['id']);
        unset($data['file']);

        if ($file = $this->request->getFile('image')) {
            // dd($file);
            // foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                $data['image'] = $filename;
                // dd($filename);

                $file->move(WRITEPATH . 'notices', $filename);
                @unlink(WRITEPATH . 'notices/' . $oldfile);
            }
            // }
        }

        $status = $this->noticemodel->update($id, $data);

        if ($status) {
            return redirect()->back()->with('success', 'Sucesso!');
        }
        return redirect()->back()->with('danger', 'Erro!');
      
    }

    public function delete_notice()
    {
        if ($this->request->getMethod() != 'post') {
            return redirect()->to('/');
        }

        $data = $this->request->getPost();
        $status = $this->noticemodel->delete($data['id']);

        if ($status) {
            @unlink(WRITEPATH . 'notices/' . $data['image']);
            return redirect()->back()->with('success', 'Sucesso!');
        }

        return redirect()->back()->with('danger', 'Erro!');
    }
}
