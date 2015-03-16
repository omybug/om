<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2014/11/13
 * Time: 17:52
 */

class Action{

    protected $uid = 1;

    function __construct(){
        if(isset($_REQUEST['uid'])){
            $this->uid = $_REQUEST['uid'];
        }
    }
}