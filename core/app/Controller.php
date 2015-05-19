<?php

/**
 * @package App
 * 
 * Configuração dos controllers
 * 
 * @copyright (c) KandaFramework
 * 
 */

namespace core\app;

use core\base\Url;

class Controller extends Url {

    /**
     * @access public
     * 
     * @static 
     * 
     * @var type string  $theme Guarda o nome do theme
     * 
     */
    public static $theme;

    /**
     *
     * @access public
     * 
     * @var type string
     * 
     * @description Serar guardado o title da página. Deve ser chamado no arquivo php
     * 
     * @example $this->title = 'KandaFramework';
     * 
     */
    public $title = '';

    

    /**
     * @access public
     * 
     * @static 
     * 
     * @var string $view Guarda o nome da view
     * 
     */
    public static $view;

    /**
     * @access public
     * 
     * @static 
     * 
     * @var string Contem o valor da url
     * 
     */
    public static $server;

    /**
     * @access public
     * 
     * @static
     *  
     * @var string Contem o valor base da url
     * 
     * @example /kandaframework/painel
     * 
     */
    public static $base;

    /**
     * @access public
     * 
     * @static
     * 
     * @var string Contem o valor da url padrão do projeto 
     * 
     */
    public static $baseUrl;

    /**
     * 
     * @access private
     * 
     * @static
     * 
     * 
     * @var string Guarda o nome do controller.
     * 
     * 
     */
    private static $ControllerName;

    /**
     * @access public
     * 
     * @static
     * 
     * @var string Serar chamado como default caso não tenha passado na action
     * 
     */
    public $layout = 'main';

    /**
     *
     * @access public
     * 
     * @static
     * 
     * @var string Guarda no url dos script que são chamados na pasta assets
     * 
     * 
     */
    public static $assets = '';

    /**
     *
     * @access public 
     * 
     * @var string Guarda o valor da url base 
     * 
     */
    public static $home;

    /**
     * 
     */
    public function behaviors() {
        
    }

    /**
     * @access public
     * 
     * @param string $url 
     * 
     * @description Montar a url.
     * Caso não tenha valor no parametro, serar chamado a url base exp: http://kandaframework.com
     * 
     * @return string Retonar a url 
     * 
     */
    public function createUrl($url = '') {

        if (!empty($url)) {

            return $this->baseUrl() . '/' . $url;
        }

        self::$home = $this->baseUrl();

        return self::$home;
    }

    /**
     * 
     * @access public
     * 
     * @param string $render Nome do arquivo php 
     * @param arary $param  Valores para ser carreagodo na render
     * 
     * 
     * @description Monta o path da render escolhida
     * Caso não tenha o arquivo na view serar mostrando uma mensagem de erro.
     * 
     */
    public function render($render, $param = []) {

        $content = WWW_ROOT . VIEW . self::$theme . '/views/' . self::$view . '/' . $render . '.php';

        self::$assets = $this->assets(self::$theme);

        if (file_exists($content)) {
            $this->loadView($content, $param);
        } else {
            die("View <i style='color:blue;'>$content</i> not fond!");
        }
    }

    /**
     * 
     * @access public
     * 
     * @param string $view Nome da view
     * @param array $param Parametros a ser passado na url
     * 
     * @example $this->redirect('index',['id'=>1]); 
     * 
     * @description Redirecionar para uma view. Referencia da url serar herdada

     * 
     */
    public function redirect($view = '', $param = []) {

        $queryString = '';

        if (!empty($param)) {

            $queryString = '/';
            $i = 0;$cont='';

            foreach ($param as $key => $value) {

                if ($i > 0)
                    $cont = "/";

                $queryString .= "{$cont}$value";

                ++$i;
            }
        }

        $header = $this->baseUrl() . '/' . self::$theme . '/' . self::$view . '/' . $view . $queryString;

        if (empty($view)) {
            $header = $this->baseUrl() . '/' . self::$theme . '/' . self::$view . $queryString;
        }


        header("Location:$header");
        exit;
    }

    /**
     * 
     * @param type $actionName
     * @param type $theme
     * @param string $className
     * @param type $frontend
     */
    public function load($actionName, $theme, $className, $frontend) {

        $actionName = ucfirst($actionName);
        $className = ucfirst($className) . "Controller";

        self::$baseUrl = $this->createUrl();

        $controller = CONTROLLER . $theme . '/' . $className;

        if (file_exists(WWW_ROOT.'/'.$controller . '.php')) {
            $this->Actions(str_replace('/', "\\", $controller), $actionName, $frontend);
        } else {

            $controller = CONTROLLER . $theme . '/' . ucfirst($theme) . 'Controller';
        
            if (file_exists(WWW_ROOT.'/'.$controller.'.php')) {
                    
                $this->Actions(str_replace('/', "\\", $controller), $actionName, $frontend);
            } else {
                
            }
        }
    }

    private function Actions($_namespace, $actionName, $frontend) {

        $model = new $_namespace;
        $action = "action$actionName";
        if (method_exists($model, 'behaviors'))
            $rule = $model->behaviors();
        $rule['getClass'];

        if (method_exists($model, $action)) {
            call_user_func_array([$model, $action], $this->paramns($frontend));
            exit;
        } elseif (method_exists($model, "actionIndex")) {
            call_user_func_array([$model, 'actionIndex'], $this->paramns($frontend));
            exit;
        } else
            die("<strong style='color:red'>action$actionName</strong> not fond!");
    }

    /**
     * 
     * @return string
     * 
     * @description Retorna os valores do parametro da action
     * 
     */
    public function paramns($theme) {
        $param = [];

        if (in_array(parent::segment(1), $theme)) {

            if (strlen(parent::segment(5)) > 0)
                return [parent::segment(4), parent::segment(5)];

            if (strlen(parent::segment(4)) > 0)
                return [parent::segment(4)];

            if (strlen(parent::segment(2)) == 0) {
                return [];
            } else {

                if (strlen(parent::segment(3) > 0)) {
                    return [parent::segment(3)];
                } else
                    return [];
            }
        }else {

            if (strlen(parent::segment(3) > 0))
                return [parent::segment(2), parent::segment(3)];
            elseif (strlen(parent::segment(2) > 0)) {
                if (strlen(parent::segment(3)) > 0)
                    return [parent::segment(2), parent::segment(3)];
                else
                    return [parent::segment(2)];
            } else
                return [parent::segment()];
        }
    }

    /**
     * @access private
     * 
     * @param string $content Referencia do path da content a ser criada
     * @param array  $param Contem os valores a ser extraios 
     * 
     * 
     * @description Monta o conteudo do site
     * 
     * 
     */
    private function loadView($content_, $param = []) {

        $theme = self::$theme;


        $main = WWW_ROOT . VIEW . $theme . '/views/layout/' . $this->layout . '.php';


        ob_start();
        ob_implicit_flush(false);
        extract($param, EXTR_OVERWRITE);
        require($content_);

        $content = ob_get_clean();

        if (file_exists($main)) {
            require_once $main;
        } else
            die('Not fond main.php');
    }

    /**
     * @access public
     * 
     * @param string $alias Nome do path para ser criado
     * 
     * @description @theme retorna o theme atual, @weroot retorna Root do framework
     * 
     * @example getAlias('@webroot/controller'); Serar criado o path controller
     * 
     * 
     * @return string Path alias criado
     */
    public static function getAlias($alias) {

        $root = $_SERVER['DOCUMENT_ROOT'];

        $key = strpos($alias, '/');

        $dir = substr($alias, $key);

        /**
         * @theme
         */
        if ($key == 7)
            $root .= '/frontend' . $dir;
        /**
         * @webroot
         */
        elseif ($key == 8)
            return $root . $dir;

        return $root;
    }

    /**
     * 
     * @param type $theme
     * @param type $controller
     */
    public function NameController($theme, $controller) {

        self::$base  = $this->createUrl().'/'.$theme . '/' . $controller;
        self::$view  = $controller;
        self::$theme = $theme;
        self::$ControllerName = ucfirst($controller);
    }

    public function setController($frontend) {


        if (in_array(parent::segment(1), $frontend)) {

            if (strlen(parent::segment(4)) > 0) {

                $this->NameController(parent::segment(1), parent::segment(2));
                $this->load(parent::segment(3), parent::segment(1), parent::segment(2), $frontend);
            }
            if (strlen(parent::segment(3)) > 0) {

                $this->NameController(parent::segment(1), parent::segment(2));
                $this->load(parent::segment(3), parent::segment(1), parent::segment(2), $frontend);
            } else {
                if (strlen(parent::segment(2)) == 0) {
                    $this->NameController(parent::segment(1), parent::segment(1));
                    $this->load(parent::segment(1), parent::segment(1), parent::segment(1), $frontend);
                }

                $this->NameController(parent::segment(1), parent::segment(2));
                $this->load(parent::segment(2), parent::segment(1), parent::segment(2), $frontend);
            }
        } else {

            $actionName = parent::segment(1);

            if (empty($actionName))
                $actionName = THEME;

            $this->NameController(THEME, THEME);
            $this->load($actionName, THEME, THEME, $frontend);
        }
    }

    /**
     * @access public
     * @param string $theme Contem o nome do theme
     * @return string Retorna a url do path do theme
     * 
     */
    public function assets($theme = '') {
        $theme = (!empty($theme)) ? $theme : THEME;

        return $this->baseUrl() .  VIEW . $theme . "/assets/";
    }

    /**
     * @access public
     * 
     * @description Monta a url base do framework
     * 
     * @return string 
     */
    public function baseUrl() {

        $server_name = $_SERVER['SERVER_NAME'];

        $protocolo = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === false) ? 'http' : 'https';

        if ($_SERVER['SERVER_NAME'] == 'localhost') {

            $serName = explode('/', $_SERVER['REQUEST_URI']);

            $server_name = $_SERVER['SERVER_NAME'] . '/' . $serName[1];
        }

        self::$home = $protocolo . '://' . $server_name . ALIAS;

        return self::$home;
    }

    /**
     * 
     * @param type array $json
     * 
     * @return type object Retonar os dados do Json
     * 
     */
    public static function Json($json = []) {

        header('Content-Type: application/json');

        echo json_encode($json);
        exit;
    }

    public static function htmlOptions($html = []) {

        $atributos = '';

        if (!empty($html)) {
            foreach ($html as $atributo => $value) {

                if ($atributo == 'label' || $atributo == 'options' || $atributo == 'selected')
                    continue;

                $atributos .= "$atributo='$value'";
            }
        }
        return $atributos;
    }

}
