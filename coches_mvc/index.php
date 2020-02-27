<?php

	require_once "libs/Database.php" ;
	require_once "modelos/Marca.php" ;
	require_once "libs/Sesion.php" ;

	$db = Database::getInstance() ;
	$db->query("SELECT * FROM marca") ;
	
	while($con = $db->getObject("Marca")):
		echo "<pre>".print_r($con, true)."</pre>" ;
	endwhile;

	$sesion = Sesion::getInstance() ;

	$sesion->admin() ;
?>
