<?php

	require_once("libs/Database.php") ;
	require_once("modelos/Modelo.php") ;
	require_once("libs/Sesion.php") ;
	require_once("modelos/Marca.php") ;

	include("css/bootstrap.php") ;

	$db = Database::getInstance("root", "", "coches") ;

	$sesion = Sesion::getInstance() ;
	if (!$sesion->checkActiveSession()) 
		 $sesion->redirect("../index.php") ;
	
	$usr = $_SESSION["usuario"] ;

	$esAdmin = $usr->getEsAdmin() ;
    //echo $esAdmin ;
    
    if (!$esAdmin):
        $sesion->redirect("../index.php") ;
    else:

	//echo "<pre>".print_r($_GET, true)."</pre>" ;

	

	
		?>


			<form action="index.php">
				<input type="hidden" name="nom" value="<?= $mod->getNomMod() ?>">
				<input type="hidden" name="con" value="modelo">
				<input type="hidden" name="ope" value="editar">
				<div class="form-group">
					<input type="hidden" name="id" value="<?= $mod->getCodMod() ?>">
				</div>
				<div class="form-group">
					<label>Modelo:</label>
					<input type="text" class="form-control" name="modelo" value="<?= $mod->getNomMod() ?>">
				</div>
				<div class="form-group">
					<label>Potencia:</label>
					<input type="int" class="form-control" name="potencia" value="<?= $mod->getPotencia() ?>">
				</div>
				<div class="form-group">
					<label>Año:</label>
					<input type="int" class="form-control" name="año" value="<?= $mod->getAño() ?>">
				</div>
				<div class="form-group">
					<label>Marca:</label>
					<select class="form-control" name="marca">
						 <!--<option selected value="0"> -- Elija una opción -- </option>-->
	                        <?php
	                            $db->query("SELECT * FROM marca") ;
	                            $item = $db->getObject("Marca");

	                            do {

	                            	if($item->getCodMar() === $mod->getCodMar()):

	                                	echo "<option selected value=\"".$item->getCodMar()."\">".$item->getNomMar()."</option>" ;
	                                else:
	                                	echo "<option value=\"".$item->getCodMar()."\">".$item->getNomMar()."</option>" ;
	                                endif;
	                                
	                                //echo "<pre>".print_r($item->getNomMar(), true)."</pre>" ;

	                                $item = $db->getObject("Marca") ;

	                            }while($item) ;
	                        ?>
                    </select>
                </div>
                <div class="form-group">
                	<label>Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" value="<?= $mod->getDescripcion() ?>">
                </div>
                <div class="form-group">
                	<label>Precio:</label>
					<input type="float" class="form-control" name="precio" value="<?= $mod->getPrecio() ?>">
				</div>
				<div class="form-group">
					<label>Es Clásico:</label>
					<select class="form-control" name="esClasico">
						<?php
						//echo $esClasico ;
							if($mod->getEsClasico()):
								echo "<option selected value=\"1\">Sí</option>" ;
								echo "<option value=\"0\">No</option>" ;
							else:
								echo "<option value=\"1\">Sí</option>" ;
								echo "<option selected value=\"0\">No</option>" ;
							endif;
						?>
                    </select>
                </div>
                        <button type="submit" class="btn btn-success">Update</button>
				</form>

				<form>


			<?php
			//header("Location: Update.php?id=$id") ;
				

endif;

?>