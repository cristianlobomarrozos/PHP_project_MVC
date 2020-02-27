<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  <link rel="stylesheet" href="./css/style.css">  
<?php
	require_once("../libs/Database.php") ;
	require_once("../modelos/Modelo.php") ;	


	$db = Database::getInstance("root", "", "coches") ;
	if(!$db->query("SELECT mo.*, ma.NomMar FROM modelo mo left join marca ma on (mo.CodMar=ma.CodMar) WHERE esClasico=false")):
		die("Error");
	else:
		$modelo = $db->getObject("Modelo") ;
		do {
?>
<div class="card mb-3 my-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="../images/coches/<?=$modelo->getNomMod()?>.jpg" class="card-img" alt="<?= $modelo->getNomMod() ?>" style="max-height: 300px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="info.php?id=<?= $modelo->getCodMod() ?>"><?= $modelo->getNomMod() ?></a>
        <p class="card-text">Año <?= $modelo->getAño() ?> potencia <?= $modelo->getPotencia() ?>CV</p>
        <p class="card-text"><?= $modelo->getDescripcion() ?></p>
        <p class="card-text"><?= $modelo->getPrecio() ?>€</p>
      </div>
    </div>
  </div>
</div>

<?php 
    $modelo = $db->getObject("Modelo") ;    
    } while($modelo) ;
    endif;  
?> 
