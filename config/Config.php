<?php
return array(
    'DB' => array('host'=>'localhost','user'=>'root','password'=>'','dbname'=>'om'),
    'DB2' => array('host'=>'localhost', 'user'=>'root', 'password'=>'', 'dbname'=>'test')
);
//class Config{
//
//    private $DB = array('host'=>'localhost','user'=>'','password'=>'','dbname'=>'om');
//
//	private $CACHE_TYPE = '';
//
//	public function __get($property) {
//		if (property_exists($this, $property)) {
//			return $this->$property;
//		}
//	}
//
//	public function __set($property, $value) {
//		if (property_exists($this, $property)) {
//			$this->$property = $value;
//		}
//	}
//
//}