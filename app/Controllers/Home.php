<?php


namespace App\Controllers;

use CodeIgniter\Files\Writable;

class Home extends BaseController
{
   protected $emailconfig;
   public function __construct()
   {
      $this->emailconfig = new EmailConfig;
   }
   public function index()
   {

      foreach ($this->noticemodel->getNotices() as $key => $value) {
         $imagePaths[] = WRITEPATH . 'notices/' . $value->image;
      }
      $dataUri[] = null;
      if (!empty($imagePaths)) {
         foreach ($imagePaths as $key => $value) {
            $imageData = file_get_contents($value);
            $base64Image = base64_encode($imageData);
            $dataUri[] = 'data:image/jpeg;base64,' . $base64Image;
         }
      }

      //       foreach ($dataUri as $key => $value) {
      //          echo '<img src="' . $value . '" alt="Minha Imagem">';
      //       }
      // dd('');
      $options = [
         'cache' => 60
      ];

      return view(
         'index',
         ['notices' => $this->noticemodel->getNotices(), 'image' => $dataUri, 'session' => $this->fishingsessionmodel->getSession()],
         $options
      );
   }

   public function dashboard()
   {
      return view(
         'pages/dashboard',
         [
            'users' => $this->usermodel->select('count(id) as users')->first(),
            'departments' => $this->departmentmodel->select('count(id) as departments')->first(),
            'subscribed' => $this->newslettermodel->select('count(id) as subscribed')->first(),
            'notices' => $this->noticemodel->select('count(id) as notices')->first()
         ]
      );
   }

   public function subscriber()
   {
      if ($this->request->getMethod() != 'post') {
         return redirect()->to('/');
      }

      $data = $this->request->getPost();


      $status = $this->newslettermodel->save($data);

      if (!$status) {
         return redirect()->back()->with('danger', 'Falha!');
      }

      $this->emailconfig->subscribe($data);

      return redirect()->back()->with('success', 'Sucesso!');
   }
}
