<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

define('Kanda_CORE', dirname(__DIR__ . '/core'));

require_once Kanda_CORE . '/autoload.php';

require_once Kanda_CORE . '/activerecord/ActiveRecord.php';

use core\helps\Session;
use core\app\Controller;

class Kanda{

    public static $app;

    public static $post;
    
    public static $get;
    

    public function __construct() {

        Kanda::$post = \core\helps\Http::run();
        
        Kanda::$app = (object) [
                    'arrays'     => \core\helps\Arrays::run(),
                    'cache'      => \core\helps\Cache::run(),
                    'crop'       => \core\helps\Crop::run(),
                    'html'       => \core\helps\Html::run(),
                    'url'        => \core\helps\Url::run(),
                    'uploadFile' => \core\helps\UploadFile::run(),
                    'session'    => \core\helps\Session::run(),
        ];
    }

    /**
     * @access public
     *      * 
     * @importante metodo @Core contem include as principais class dos sistema
     * 
     * @param array() $main
     * 
     * 
     */
    public static function run($main) {

        set_include_path(get_include_path() . PATH_SEPARATOR . Kanda_CORE);


        define('DSN', $main['db']['dsn']);
        define('THEME', $main['app']['view'][1][0]);
                 
        define('MODEL', WWW_ROOT . $main['app']['model']);
        define('VIEW',$main['app']['view'][0]);
        define('CONTROLLER',$main['app']['controller']);

        if(isset($main['app']['diralias']))
            define('ALIAS',$main['app']['diralias']);
        else
            define('ALIAS','');

        ActiveRecord\Config::initialize(function($cfg) {
            $cfg->set_model_directory(MODEL);
            $cfg->set_connections(array(
                'development' => DSN));
        });

        date_default_timezone_set($main['app']['timezone']);

        $controller = new Controller();
        $controller->setController($main['app']['view'][1]);
    }

}

$kanda = new Kanda();
$kanda->run($main);