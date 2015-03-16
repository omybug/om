<?php
$uri = parse_url($_SERVER['PATH_INFO'], PHP_URL_PATH);
$uri = urldecode($uri);
if($uri == '/favicon.ico') {
    return false;
}
Log::route($uri);
Log::route(json_encode($_REQUEST));

require 'Util.php';
require 'config/Common.php';
//导入配置文件
Config::load('config/Config.php');

//header("Content-Type: text/html; charset=utf-8");

$s_ts = timestamp();
//设置缓存类型
define('CACHE_TYPE', 'file');
define('CACHE_FOLDER', dirname(__FILE__).'/cache/');

$pars = explode('/',$uri);
$actionName = $pars[1].'Action';
if(class_exists($actionName)) {
    $action = new $actionName();
    if(method_exists($action,$pars[2])){
        $action->$pars[2]();
    }else{
        echo $pars[1].'.'.$pars[2].' is not exist!';
    }
}else{
    echo 'action '.$pars[1].' is not exist!';
}

Log::debug(timestamp() - $s_ts);

/**
 * @param string $className
 * @return bool
 */
function __autoload($className) {
	$paths = array('action','activity','service','dao');
	foreach($paths as $p){
        if (stristr($className,$p) && file_exists($p . DIRECTORY_SEPARATOR . $className . '.php')) {
            require_once $p . DIRECTORY_SEPARATOR . $className . '.php';
            return true;
        }
	}
    $p = 'om';
    if (file_exists($p . DIRECTORY_SEPARATOR . $className . '.php')) {
        require_once $p . DIRECTORY_SEPARATOR . $className . '.php';
        return true;
    }
	return false;
}

//set_exception_handler(
//    function($e){
//        $error['message'] = $e->getMessage();
//        $trace = $e->getTrace();
//        if($trace[0]['function'] == 'throw_exception'){
//            $error['file'] = $trace[0]['file'];
//            $error['line'] = $trace[0]['line'];
//        }else{
//            //直接扔出异常
//            $error['file'] = $e->getFile();
//            $error['line'] = $e->getLine();
//        }
//        Log::error($error);
//    });
?>