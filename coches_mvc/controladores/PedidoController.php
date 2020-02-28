<?php
	//Cristian Lobo Marrozos
	
	require_once "./modelos/Pedido.php" ;
	require_once "./modelos/Marca.php" ;
	require_once "./modelos/Modelo.php" ;
	require_once "./libs/Sesion.php" ;

	class PedidoController {

		public function __construct() {}

		public function pedidos() {
			$idu = $_GET["id"] ;

			$ped = Pedido::mostrarPedidos($idu) ;

			require_once "./vistas/historyView.php" ;
		}
		
	}