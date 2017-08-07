<?php  
	
	$cache = Cache::getInstance();
	$key = 'citys';
	$citys = $cache->get($key);

	if(!$citys){
		$City = D('City');

		$list = $City->getList();
		$citys = array();
		foreach ($list as $key => $val) {
			$citys[$val['code']] = $val['name'];
		}
		$cache->set($key,$citys,24*3600);
		unset($key,$val);
	}

	return array(
		'CITYS' => $citys,
		);
?>