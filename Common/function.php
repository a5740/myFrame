<?php
/**
 * User: Administrator
 * Date: 2016/3/26
 * Time: 11:19
 */
function C($name){
    return $GLOBALS['config'][$name];
}


function M(){
    $option=[// 必须配置项
        'database_type' => C('DB_TYPE'),
        'database_name' => C('DB_NAME'),
        'server'        => C('DB_HOST'),
        'username'      => C('DB_USER'),
        'password'      => C('DB_PWD'),
        'charset'       => C('DB_CHARSET'),
        // 可选参数
        'port' => C('DB_PORT'),
        // 可选，定义表的前缀
        'prefix' => C('DB_PREFIX'),
        // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
        'option' => [
            PDO::ATTR_CASE              => PDO::CASE_LOWER,
            PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ORACLE_NULLS      => PDO::NULL_NATURAL,
            PDO::ATTR_STRINGIFY_FETCHES => false,
        ]
    ];


    return new medoo($option);
}

function workget($str){
    return addslashes(htmlspecialchars(trim($str)));
}

function GET($name,$if=true){

    if($if){
        return  workget($_GET[$name]);
    }else{
        return $_GET[$name];
    }

}

function EchoAjax($arr){
    echo json_encode($arr);exit();
}

function POST($name,$if=true){

    if($if){
        return  workget($_POST[$name]);
    }else{
        return $_POST[$name];
    }

}
function p($arr){
    echo '<pre>',print_r($arr,true),'</pre>';
}