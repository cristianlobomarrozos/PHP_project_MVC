<<?php 
	
	class Database {

		private $host = '' ;
	 	private $user = 'root' ;
	 	private $pass = '' ;
	 	private $dbnm = '' ;

	 	private $pdo ;
	 	private static $instance = null ;
	 	private $parameters;


	 	/**
	 	 * Conexión a la base de datos
	 	 */
	 	private function __construct() {

	 		$dsn = 'mysql:charset=UTF8;host=localhost;dbname=coches';

	 		try {
	 			$this->pdo = new PDO($dsn, 
	 								 $this->user, 
	 								 $this->pass) ;
	 		} catch (PDOException $e) {
	 			die ('**ERROR: se ha producido un error en la conexión con la base de datos.') ;
	 		}
	 	}


	 	/**
	 	 * Devuelve una instancia de la clase, ya que el constructor es privado (Patrón singletone).
	 	 * @return
	 	 */
	 	public static function getInstance() {
	 		if (self::$instance==null) 
	 			self::$instance = new Database() ;

	 		return self::$instance ;
	 	}

	 	/**
	 	 * Cierra la conexión a la base de datos
	 	 */
	 	public function __destruct(){
			$this->pdo = null ;
		}

		/**
	     *	@void 
	     *
	     *	Áñade un parámetro al array de parametros
	     *	@param string $para  
	     *	@param string $value 
	     */
	    public function bind($para, $value)
	    {
	        $this->parameters[sizeof($this->parameters)] = [":" . $para , $value];
	    }
	    /**
	     *	@void
	     *	
	     *	Añade más parámetros al array
	     *	@param array $parray
	     */
	    public function bindMore($parray)
	    {
	        if (empty($this->parameters) && is_array($parray)) {
	            $columns = array_keys($parray);
	            foreach ($columns as $i => &$column) {
	                $this->bind($column, $parray[$column]);
	            }
	        }
	    }


		/**
		 * Realiza la consulta a la base de datos y devuelve un resultado
		 *
		 * @param $sql
		 * @return
		 */
		public function query(string $sql){
			$this->res = $this->pdo->query($sql) ;
			return $this ;
		}

		/**
		 * Devuelve un registro en formato de objeto
		 *
		 * @param $cls
		 * @return
		 */
		public function getObject(string $cls = "StdClass"){
			return $this->res->fetchObject($cls) ;
		}


	}

 ?>