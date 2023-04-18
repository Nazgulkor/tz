<?php 
        define('DB_HOST', "localhost");
        define('DB_USER', "root");
        define('DB_PASSWORD', "root");
        define('DB_NAME', "tz");
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($mysql->connect_errno) exit("cant connect to db");
        $mysql->set_charset("utf8");
