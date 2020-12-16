<?php

//================================PATHS================================
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__));  //dinh nghia duong dan toi thu muc goc
define('LIBRARY_PATH', ROOT_PATH . DS . 'libs' . DS);  //dinh nghia duong dan toi thu muc thu vien
define('PUBLIC_PATH', ROOT_PATH . DS . 'public' . DS);  //dinh nghia duong dan toi thu muc public
define('APPLICATION_PATH', ROOT_PATH . DS . 'application' . DS);  //dinh nghia duong dan toi thu muc ap
define('MODULE_PATH', APPLICATION_PATH . DS . 'module' . DS);  //dinh nghia duong dan toi thu muc module
define('TEMPLATE_PATH', PUBLIC_PATH . 'template' . DS);  //dinh nghia duong dan toi thu muc tem

define('ROOT_URL',DS.'bookstoreHome'.DS);
define('APPLICATION_URL', ROOT_URL . 'application' . DS);
define('PUBLIC_URL', ROOT_URL  . 'public' . DS);
define('TEMPLATE_URL', PUBLIC_URL . 'template' . DS);



define('DEFAULT_MODULE', 'default');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');


//================================DATABASE================================
define('DB_HOST', 'localhost');
define('DB_USERS', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bookstore');
define('DB_TABLE', 'group');
//================================DATABASE TABLE================================
define('TBL_GROUP', 'group');
define('TBL_USER', 'user');
