<?php 
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'common.func.php';
require_once 'mysql.func.php';
require_once 'configs.php';
require_once 'page.func.php';
require_once 'compet.inc.php';
require_once 'book.inc.php';
require_once 'user.inc.php';
$HandleAuthority = 5;
connect();
