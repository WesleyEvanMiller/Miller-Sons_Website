<?php
	include ('Connections/millernsons.php');
	
	$query = $handler->prepare("SELECT * FROM inventory");
	$query->execute();
	$rows = array();
	while($r = $query->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
	}
	print json_encode($rows);
?>