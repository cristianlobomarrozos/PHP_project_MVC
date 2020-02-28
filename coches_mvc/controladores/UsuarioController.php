<?php
	//Cristian Lobo Marrozos
	
	require_once "./modelos/Usuario.php" ;
	require_once "./libs/Sesion.php" ;
	require_once "./libs/Routing.php" ;
	//require_once "./vendor/autoload.php" ;

	class UsuarioController {

		public function __construct() {}

		public function login() {

			$usu = Usuario::login() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;
		}

		public function logout() {

			$usu = Usuario::logout() ;

			//echo "<pre>".print_r($lec, true)."</pre>" ;
		}

		public function listar() {
			$user = Usuario::mostrarTodos() ;

			require_once "./vistas/adminUserView.php" ;

		}

		public function perfil() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;

			require_once "./vistas/profileView.php" ;
		}

		public function pedidos() {

			$idu = $_GET["id"] ;

			$user = Usuario::mostrarPedidos($idu) ;

			require_once "./vistas/historyView.php" ;
		}

		public function delete() {
			$idu = $_GET["id"] ;

			$user = Usuario::borraUsuario($idu) ;

			route('index.php', 'usuario', 'listar') ;
		}

		public function edit() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;

			require_once "./vistas/editUser.php" ;

		}

		public function update() {
			$idu = $_GET["id"] ;

			$user = Usuario::mostrarUsuario($idu) ;
			//echo "<pre>".print_r($user, true)."</pre>" ;
			//echo "<pre>".print_r($_GET, true)."</pre>" ;
			$adm = $_GET["esAdmin"] ;

			//echo $adm ;
			//die() ;
			$user->setEsAdmin($adm) ;
			$user->updateUsuario() ;
			//echo $adm ;
			//die() ;
			
			route("index.php", "usuario", "listar") ;

		}
		
	}