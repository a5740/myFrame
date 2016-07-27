<?php
/**
 * User: Administrator
 * Date: 2016/3/26
 * Time: 10:02
 */
class Controller{

    protected $view;
    protected $smarty;

    public function __construct(){
        include CORE_DIR.'/smarty/Smarty.class.php';
        $this->smarty=new Smarty();
        $this->smarty->left_delimiter = "<{";
        $this->smarty->right_delimiter = "}>";
        $this->smarty->caching=false; //是否使用缓存，项目在调试期间，不建议启用缓存
        $this->smarty->template_dir = VIEW_DIR.'/'.MODULE.'/'; //设置模板目录
        $this->smarty->compile_dir = "./temp/templates_c"; //设置编译目录
        $this->smarty->cache_dir = "./temp/smarty_cache"; //缓存文件夹
        //$this->view = new View();
    }

    protected function assign($key,$val){
        $this->smarty->assign($key,$val);
    }

    protected function display($template){
        $this->smarty->display($template);
    }

}