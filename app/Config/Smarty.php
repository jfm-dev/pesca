<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Smarty extends BaseConfig
{
    public static $configDirs = [
        'templateDir'=>APPPATH . 'Views',
        'compileDir'=>APPPATH . 'Templates_c',
        'cacheDir'=>APPPATH . 'Cache',
        'configDir'=>APPPATH . 'Config'
    ];

    public static $fileExtension = 'php';
}
