<?php

if(!defined('MY_APP')) exit();


class Application {

    private static function setError(){

        ini_set('error_reporting', 'On');
        ini_set('display_errors', 1);
    }

    private static function setHeader(){
        header('Content-type:text/html;charset=utf-8');
    }

    private static function setConst(){
        defined('ROOT_DIR')   or define('ROOT_DIR',str_replace('/Core','',str_replace('\\','/',dirname(__FILE__))));
        defined('CORE_DIR')   or define('CORE_DIR',ROOT_DIR.'/Core');
        defined('MODULE_DIR') or define('MODULE_DIR',ROOT_DIR.'/Controller');
        defined('CONF_DIR')   or define('CONF_DIR',ROOT_DIR.'/Conf');
        defined('MODEL_DIR')  or define('MODEL_DIR',ROOT_DIR.'/Model');
        defined('VIEW_DIR')   or define('VIEW_DIR',ROOT_DIR.'/View');
        defined('PUB_DIR')    or define('PUB_DIR',ROOT_DIR.'/Public');
        defined('COMMON_DIR') or define('COMMON_DIR',ROOT_DIR.'/Common');
        defined('ROOT_URL')   or define('ROOT_URL',$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
        //请求定义
        define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
        define('IS_GET', REQUEST_METHOD == 'GET' ? true : false);
        define('IS_POST', REQUEST_METHOD == 'POST' ? true : false);
        define('IS_AJAX', (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false);

    }



    private static function setConfig(){
        $GLOBALS['config']=include CONF_DIR.'./config.php';
    }

    private static function loadfile(){

        include COMMON_DIR.'/function.php';

    }
    private static function loadController($class){
        if(is_file(MODULE_DIR.'/'.$class.'.php')){
            include MODULE_DIR.'/'.$class.'.php';
        }
    }

    private static function loadCore($class){
        if(is_file(CORE_DIR.'/'.$class.'.class.php')){
            include CORE_DIR.'/'.$class.'.class.php';
        }
    }

    private static function loadModel($class){
        if(is_file(MODEL_DIR.'/'.$class.'.php')){
            include MODEL_DIR.'/'.$class.'.php';
        }
    }

    private static function setAutoload(){
        spl_autoload_register(['Application','loadCore']);
        spl_autoload_register(['Application','loadController']);
        spl_autoload_register(['Application','loadModel']);
    }

    private static function setSession(){
        session_start();
    }

    private static function setUrl(){

        /*$module=isset($_REQUEST['m']) ? $_REQUEST['m'] : 'Index';
        $action=isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';*/
        $paths=[];//接收地址信息
        if(isset($_SERVER['REDIRECT_URL'])){
            $url_sp=C('URL_SP');
            $_SERVER['PATH_INFO']=strtolower(trim($_SERVER['REDIRECT_URL'],'/'));
            $paths = explode($url_sp, trim($_SERVER['PATH_INFO'], $url_sp));
        }
        $module=array_shift($paths);
        //$module=ucfirst(strtolower(isset($paths[0])?$paths[0]:'Index'));
        $action=array_shift($paths);
        //$action=strtolower(isset($paths[1])?$paths[1]:'index');

        $_GET=[];
        $_POST=[];
        $temp_param=[];
        if(!empty($paths)){
            foreach($paths as $k => $v){
                if($k%2){
                    $temp_param[$paths[$k-1]]=$v;
                }else{
                    $temp_param[$paths[$k]]='';
                }
            }
        }
        switch($_SERVER['REQUEST_METHOD']){

            case 'POST':
                $_POST=$temp_param;
                break;
            default:
                $_GET=$temp_param;
                break;
        }

        define('MODULE',strip_tags(ucfirst(strtolower($module?$module:'Index'))));
        define('ACTION',strip_tags(strtolower($action?$action:'index')));
    }


    /*private static function setPrivilege(){
        if(!(MODUEL == 'Privilege' && in_array(MODULE,array('login,sigin,captcha')))){
            if(!isset($_SESSION['user'])){
                header('Location:index.php');
            }
        }
    }*/

    private static function setDispatch(){
        $module=MODULE.'Controller';
        $action=ACTION;
        if(is_file(MODULE_DIR.'/'.$module.'.php')){
            $module=new $module();
            $module->$action();
        }else{
            echo '请求的地址不存在！';
        }
    }

    public static function run(){

        self::setError();
        self::setHeader();
        self::setConst();
        self::loadfile();
        self::setConfig();
        self::setAutoload();
        self::setSession();
        self::setUrl();
        self::setDispatch();

    }









}