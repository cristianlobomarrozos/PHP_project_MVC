<?php
	
	//echo "<pre>".print_r($_GET, true)."</pre>" ;

	require_once("./libs/Database.php") ;
	require_once("./modelos/Modelo.php") ;
	require_once("./modelos/Marca.php") ;
	require_once("./libs/Sesion.php") ;
	require_once("./libs/Navbar.php") ;


	include("./css/bootstrap.php") ;

	$db = Database::getInstance("root", "", "coches") ;

	$sesion = Sesion::getInstance() ;
	if (!$sesion->checkActiveSession())
		 $sesion->redirect("index.php") ;

	$usr = $_SESSION["usuario"] ;

	$idUsu = $usr->getCodUsu() ;

	?>
		<table class="table">
		  <thead>
		    <tr>
					<th width="15%" scope="col">Numero de pedido</th>
					<th width="15%" scope="col">Marca</th>
					<th width="15%" scope="col">Modelo</th>
					<th width="15%" scope="col">Potencia</th>
					<th width="15%" scope="col">Año</th>
					<th width="15%" scope="col">Precio</th>
					<th width="15%" scope="col">Fecha del pedido</th>
				</tr>
		  </thead>

 <?php

 		foreach($ped as $item):

 		//echo "<pre>".print_r($ped, true)."</pre>" ;

?>
		  <tbody>
		    <tr>
					<td><?= $item->numeroPedido ?></td>
					<td><?= $item->NomMar ?></td>
					<td><?= $item->NomMod ?></td>
					<td><?= $item->Potencia ?></td>
					<td><?= $item->año ?></td>
					<td><?= $item->Precio ?></td>
					<td><?= $item->fecPedido ?></td>
				</tr>
		  </tbody>
		

		<?php
		endforeach;



?>
</table>


<?php
include "libs/Footer.php";
?>