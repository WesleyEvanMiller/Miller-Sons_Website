<?php
try{
	$handler = new PDO('mysql:host=localhost;dbname=ms1'		,'root','');
	$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('Sorry, database down contact Wesley.');
}
?>