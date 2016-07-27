<?php
/**
 * Date: 2016/3/26
 * Time: 11:19
 */
return [
    /*网站设置*/
    'ROOT_URL'              =>  ['http://127.0.0.3/my/','http://www.o.com/'],//最后不要忘记加上斜杠
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'twez',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'twez_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8    'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
    'MODULE_LAYER'          =>'Controller',//
    'URL_SP'                =>'/',//PATHINFO 的分隔符

];
