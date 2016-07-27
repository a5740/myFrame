<?php

class Model
{

    // 当前数据库操作对象
    protected $db = null;

    public function __construct($name = '')
    {

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
        // 数据库初始化操作
        // 获取数据库操作对象
        $this->db=new medoo($option);
    }

    public function __get($name)
    {
        return $this->db->$name;
    }


}