<?php
	// $db = new mysqli('localhost', 'root', '', 'eomsincc_db');
	// if($db){
		
	// }else{
	// 	echo "No Internet Connection";
	// }
?>



<?php
	$db = new mysqli('project-360.cy71ndbf666a.ap-southeast-1.rds.amazonaws.com', 'project360', 'oUGJyRWQkGbGVArmVlEC', 'eomsincc_db');
	if($db){
		
	}else{
		echo "No Internet Connection";
	}
?>