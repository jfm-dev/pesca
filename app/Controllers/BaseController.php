<?php

namespace App\Controllers;

use App\Models\LevelModel;
use App\Models\DepartmentModel;
use App\Models\FilesModel;
use App\Models\FishingSessionModel;
use App\Models\MessageModel;
use App\Models\NewsletterModel;
use App\Models\NoticeModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\App;
use Psr\Log\LoggerInterface;
use Smarty;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $smarty;
    protected $email;

    public $session;
    protected $encrypter;

    protected $departmentmodel;
    protected $usermodel;
    protected $fishingsessionmodel;
    protected $levelmodel; 
    protected $filesmodel;
    protected $noticemodel;
    protected $newslettermodel;
    protected $messagemodel;




    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['Pdfhelper', 'form', 'date', 'email'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->initSmarty();

        $this->session = \Config\Services::session();
        $this->encrypter = \Config\Services::encrypter();
        $this->email = \Config\Services::email();

     
        $this->fishingsessionmodel = new FishingSessionModel();
        $this->usermodel = new UserModel();
        $this->levelmodel = new LevelModel();
        $this->departmentmodel = new DepartmentModel();
        $this->filesmodel =  new FilesModel();
        $this->noticemodel = new NoticeModel();
        $this->newslettermodel = new NewsletterModel();
        $this->messagemodel = new MessageModel();
     
    }
    private function initSmarty(){
        $configDirs = \Config\Smarty::$configDirs;
        $this->smarty =  new Smarty();
        $this->smarty->setTemplateDir($configDirs['templateDir']);
        $this->smarty->setCompileDir($configDirs['compileDir']);
        $this->smarty->setCacheDir($configDirs['cacheDir']);	    
        $this->smarty->setConfigDir($configDirs['configDir']);


    }

    public function smartyview($view, $data = []){
        $this->smarty->assign($data);
        $this->smarty->display($this->smarty->getTemplateDir(0).$view.'.'.\Config\Smarty::$fileExtension);
    }
}
