	<?php

	include "libs/Navbar.php" ;

	require_once "libs/Database.php" ;
	require_once "modelos/Modelo.php" ;


?>
		<div class="content">
			<div class="p-5">
				<div>
					<h1><?= $mod->getNomMod() ?></h1>
					
				</div>
				<div class="col-md-3">
					  <img src="./images/coches/<?=$mod->getNomMod()?>.jpg" alt="<?= $mod->getNomMod() ?>">
					</div>
				</div>
				<div>
					<p>
						Año <?=	$mod->getAño() ?> </p>
					<p>	Potencia(en caballos): <?= $mod->getPotencia() ?>CV</p><br/> 

					<p>
						<?= $mod->getDescripcion() ?>
					</p>
				</div>
				<div class="font-weight-bold text-right" style="font-size: 2vw;">
					<?= $mod->getPrecio() ?>€
				</div>
				<form action="compra.php">
					<input id="id" type="hidden" name="id" value="<?=$id?>" />
					<div class="p-1">
						<?php
							if(!empty($mod->getPrecio())):
						?>
						<button type="submit" class="btn btn-primary">Comprar</button>
						<?php
							endif;
						?>
					</div>
				</form>
			</div>
