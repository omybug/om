<?php
/**
 * User: omybug
 * Date: 2014/11/13
 * Time: 17:52
 */
class TestAction extends Action{

    public function config(){
        var_dump(Config::get('DB'));
        Config::set("T",123);
        var_dump(COnfig::get("T"));
        var_dump(COnfig::get("AAA",'aaa'));
    }

    public function curl(){
        $curl = new Curl();
        $response = $curl->get('http://www.baidu.com');
        echo $response->body;
    }

    public function testCfg(){
        $sCfg = new CfgService();
        print_r($sCfg->getItems());
    }

    public function update(){
        $s = new TestService();
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            PRESULT($s->edit($id, $name));
        }else{
            PERROR('error!');
        }
    }

    public function delete(){
        $s = new TestService();
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            PRESULT($s->del($id));
        }else{
            PERROR('error!');
        }
    }

    public function insert(){
        $testService = new TestService();
        $name = $_REQUEST['name'];
        if($testService->add($name)){
            PRESULT('success');
        }else{
            PERROR('fail');
        }
    }

    public function select(){
        $s = new TestService();
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            PRESULT($s->getOne($id));
        }else{
            PRESULT($s->getAll());
        }
    }

	public function phpinfo(){
		phpinfo();
	}

	public function test(){
		echo L('Hello');
		echo L('Hello World!');
	}

	public function cache(){
		$cache = Cache::getInstance();
		$cachename = 'change_this_to_a_unique_cache_name_for_this_data';
		$data = $cache->getVar($cachename);
		if ($data === FALSE) {
		    $myarray = array('apples','pears','bananas','oranges');
		    $cache->setVar($cachename, serialize($myarray), Cache::CACHE_ONE_DAY);
		    echo 'cache';
		} else {
		    $myarray = unserialize($data);
		}
		print_r($myarray);
	}

}