<?php

	require_once "libs/Database.php" ;
	require_once "modelos/Marca.php" ;
	require_once "libs/Sesion.php" ;

	//echo "<pre>".print_r($_GET, true)."</pre>" ;
	if(isset($_GET["con"])):

		$nom = $_GET["con"] ;
		$ope = $_GET["ope"] ;

		$controller = $nom."Controller" ;
 
		ucfirst($controller);

		//echo "<h1>".ucfirst($controller)."</h1>" ; 
		//die() ;
		require_once "./controladores/".ucfirst($controller).".php" ;
		//echo $controller ;
		//echo ucfirst($controller) ;

		$controlador = new $controller() ;

		$controlador->$ope() ;

	else:
	include("libs/Navbar.php");
?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>	<div class="row">
		<div class="col-md-6">
			<h2>
				Modernos
			</h2>
			<a href="index.php?con=modelo&ope=moderno"><img src="./images/iconos/moderno.svg" alt="coche moderno" style="width: 800px"></a>
			<p>
				Aquí podrás encontrar una variedad de distintas marcas de coches modernos, es decir, coches salidos al mercado a partir de 2005. Pueden ser coches nuevos, coches de segunda mano o de km 0. Puede haber coches tanto utilitarios como deportivos.
			</p>
			<p>
				<a class="btn btn-primary" href="index.php?con=modelo&ope=moderno">Modernos»</a>
			</p>
		</div>
		<div class="col-md-6">
			<h2>
				Clásicos
			</h2>
			<a href="index.php?con=modelo&ope=clasico"><img src="./images/iconos/clasico.svg" alt="coche clasico" style="width: 830px"></a>
			<p>
				Aquí podrás encontrar una variedad de coches clásicos, todos ellos revisados para garantizar un correcto funcionamiento de los mismos.
			</p>
			<p>
				<a class="btn btn-primary" href="index.php?con=modelo&ope=clasico">Clásicos»</a>
			</p>
		</div>
	</div>

<?php
include "libs/Footer.php";
?>
<?php endif; ?>

