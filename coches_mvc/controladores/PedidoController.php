<?php
	//Cristian Lobo Marrozos
	
	require_once "./modelos/Pedido.php" ;
	require_once "./modelos/Marca.php" ;
	require_once "./modelos/Modelo.php" ;
	require_once "./libs/Sesion.php" ;
	require_once "./libs/Routing.php" ;

	class PedidoController {

		public function __construct() {}

		public function pedidos() {
			$idu = $_GET["id"] ;

			$ped = Pedido::mostrarPedidos($idu) ;

			require_once "./vistas/historyView.php" ;
		}

		public function contiene() {
			$idu = $_GET["idu"] ;
			$idm = $_GET["idm"] ;
			$idma = $_GET["idma"] ;

			//$hoy = time() ;

			//echo "<pre>".print_r($hoy, true)."</pre>" ;

			$fecha = date('Y-m-d') ;

			echo $fecha ;
			//die() ;
			$token = "$idu".time()."$idma";

			echo $token."<br/>" ;
			echo "<pre>".print_r($_GET, true)."</pre>" ;

			//die() ;
			$ped = new Pedido() ;
			$ped->setCodUsu($idu) ;
			$ped->setFecPedido($fecha) ;
			$ped->setNumeroPedido($token) ;
			$ped->save() ;

			$ped->contiene($idm) ;

			route1("index.php") ;

			//route("index.php", "", "") ;

		}
		
	}