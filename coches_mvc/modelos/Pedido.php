<?php
	
	class Pedido {
		private $CodPed ;
		private $CodUsu ;
		private $fecPedido ;
		private $numeroPedido ;


	
	    /**
	     * @return mixed
	     */
	    public function getCodPed()
	    {
	        return $this->CodPed;
	    }

	    /**
	     * @param mixed $CodPed
	     *
	     * @return self
	     */
	    public function setCodPed($CodPed)
	    {
	        $this->CodPed = $CodPed;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getCodUsu()
	    {
	        return $this->CodUsu;
	    }

	    /**
	     * @param mixed $CodUsu
	     *
	     * @return self
	     */
	    public function setCodUsu($CodUsu)
	    {
	        $this->CodUsu = $CodUsu;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getFecPedido()
	    {
	        return $this->fecPedido;
	    }

	    /**
	     * @param mixed $fecPedido
	     *
	     * @return self
	     */
	    public function setFecPedido($fecPedido)
	    {
	        $this->fecPedido = $fecPedido;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNumeroPedido()
	    {
	        return $this->numeroPedido;
	    }

	    /**
	     * @param mixed $numeroPedido
	     *
	     * @return self
	     */
	    public function setNumeroPedido($numeroPedido)
	    {
	        $this->numeroPedido = $numeroPedido;

	        return $this;
	    }

	    public static function mostrarPedidos($id) {
	    	$db = Database::getInstance() ;

            $db->query("SELECT * FROM modelo mo LEFT JOIN marca ma on (mo.CodMar=ma.CodMar) LEFT JOIN contiene c on (mo.CodMod=c.CodMod) RIGHT JOIN pedido p on (c.CodPed=p.Codped) LEFT JOIN usuario u on (p.CodUsu=u.CodUsu) WHERE u.CodUsu=$id") ;

            $data = [] ;

            while($row = $db->getObject()):
            	array_push($data, $row) ;
            endwhile;

            return $data ;
	    }
}


?>