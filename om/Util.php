<?php

function L($key){
	$lang = include 'lang/zh-cn.php';
	if(array_key_exists($key, $lang)){
		return $lang[$key];
	}else{
		return $key;
	}
}

function mkdirs($dir, $mode = 0777) {
	if (is_dir ( $dir ) || @mkdir ( $dir, $mode ))
		return TRUE;
	if (! mkdirs ( dirname ( $dir ), $mode ))
		return FALSE;
	return @mkdir ( $dir, $mode );
}


/**
 * 获取时间戳（毫秒）
 * @return Ambigous <>
 */
function timestamp() {
    $time = microtime(true) * 1000;
    $time2 = explode(".", $time);
    return $time2[0];
}

/**
 * @param $msg
 */
function PRESULT($msg){
    PJSON(0,$msg);
}

/**
 * @param string $msg
 */
function PERROR($msg){
    PJSON(1,$msg);
}

function PLRESULT($msg){
    PRESULT(array('msg'=>L($msg)));
}

/**
 * 不推荐使用
 */
function PLERROR($msg){
    PERROR(L($msg));
}

/**
 * @param string $msg
 * @param int $ret
 * @return bool
 */
function PMSG($msg, $ret = 1){
    return PJSON($ret, L($msg));
}

/**
 * @param int $ret
 * @param array $para
 * @return bool
 */
function PJSON($ret,$para=null) {
    $json['timestamp'] = timestamp();
    $json['from'] = $_SERVER['PHP_SELF'];
    $json['ret'] = $ret;
    if($ret > 0){
        $json['msg'] = $para;
    }else {
        if(!empty($para)) {
            foreach ($para as $key => $val) {
                if (isset($val)) {
                    $json['data'][$key] = $val;
                }
            }
        }
    }
//    $callback = $_REQUEST['callback'];
//    if (isset($callback)) {
//        header('Content-Type: text/javascript');
//        echo $callback . '(' . json_encode($json) . ');';
//    } else {
    header('Content-type:text/json');
    echo json_encode($json);
    return true;
//    }
    //exit();
}

?>