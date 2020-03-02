<?php

	include("./css/bootstrap.php") ;


	$sesion = Sesion::getInstance() ;
	
	if (!$sesion->checkActiveSession()) 
		 $sesion->redirect("./index.php") ;
	
	$usr = $_SESSION["usuario"] ;
    
	$esAdmin = $usr->getEsAdmin() ;
    //echo $esAdmin ;
    
    if (!$esAdmin):
        $sesion->redirect("./index.php") ;
    else:

    	//echo "<pre>".print_r($user, true)."</pre>" ;

		?>
			<form action="index.php">
					<input type="hidden" name="id"  value="<?= $user->getCodUsu() ?>">
					<input type="hidden" name="con" value="usuario">
					<input type="hidden" name="ope" value="update">

					<input type="text" disabled name="nombre" value="<?= $user->getNomUsu() ?>">
					<input type="int"  disabled name="email" value="<?= $user->getEmail() ?>">
					<input type="int"  disabled name="apellidos" value="<?= $user->getApeUsu() ?>">
					<input type="int"  disabled name="fecNac" value="<?= $user->getFecNacUsu() ?>">
					<select name="esAdmin">
							<option value="0" <?php 
												if($user->getEsAdmin()):
													echo "selected" ;
												endif;  ?>>No</option>
                            <option value="1" <?php 
												if($user->getEsAdmin()):
													echo "selected" ;
												endif;  ?>>Si</option>
                    </select>
                        <button type="submit" class="btn btn-success">Update</a>
				</form>


			<?php
			//header("Location: Update.php?id=$id") ;
	
endif;

?>