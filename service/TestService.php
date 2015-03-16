<?php
/**
 * User: omybug
 * Date: 15-2-12
 * Time: 下午11:38
 */

class TestService extends Service{

    private $testDao = null;

    function __construct(){
        $this->testDao = new TestDao();
    }

    public function add($name){
        return $this->testDao->insert($name);
    }

    public function edit($id, $name){
        return $this->testDao->update($id, $name);
    }

    public function del($id){
        return $this->testDao->delete($id);
    }

    public function getAll(){
        return $this->testDao->selectAll();
    }

    public function getOne($id){
        return $this->testDao->select($id);
    }
} 