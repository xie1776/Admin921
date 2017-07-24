<?php  
	// phpinfo();
	// 
	
	// echo '11';
	function encrypt($data) {
	    return md5('4Pfk4Z' . md5($data));
	}

	echo encrypt('123456');
?>