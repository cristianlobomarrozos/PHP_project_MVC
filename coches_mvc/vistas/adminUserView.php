<?php
	require_once("./modelos/Usuario.php") ;


    $ses = Sesion::getInstance() ;

    if (!$ses->checkActiveSession()) 
         $ses->redirect("index.php") ;

    $usr = $_SESSION['usuario'] ;

    //echo "<pre>".print_r($usr, true)."</pre>" ;

    $esAdmin = $usr->getEsAdmin() ;
    //echo $esAdmin ;
    
    if (!$esAdmin):
        $ses->redirect("index.php") ;
    else:


    if($usr->getEsAdmin()):

	include("libs/Navbar.php");
?>

<table class="table table-borderless">  

        <div class="form-group">
            <thead>  
                <tr>  
                     
                    <th scope="col">Nombre</td>  
                    <th scope="col">Email</td>  
                    <th scope="col">Apellidos</td>  
                    <th scope="col">Fecha de nacimiento</td>  
                    <th scope="col">esAdmin</td> 
                </tr>  
            </thead>

        </div>

      
<form class="form-inline" method="get">
    <div class="form-group">
            <tbody>  

                <?php
                    foreach($user as $item):
                        //$id = $item->getCodUsu() ;
                        //echo "<pre>".print_r($item, true)."</pre>" ;
                ?>
                <tr data-codusu="<?= $item->getCodUsu() ?>" class="id" >  
                    <!--<input type="hidden"name="id">-->
                    <td><input type="text" disabled name="nombre"    value="<?= $item->getNomUsu() ?>"></td>  
                    <td><input type="int"  disabled name="email"     value="<?= $item->getEmail() ?>"></td>  
                    <td><input type="int"  disabled name="apellidos" value="<?= $item->getApeUsu() ?>"></td>  
                    <td><input type="int"  disabled name="fecNac"    value="<?= $item->getFecNacUsu() ?>"></td>  
                    <td>
                        <input type="text" disabled name="admin" value="<?php if($item->getEsAdmin()):
                                                                        echo "Si";
                                                                        else:
                                                                        echo "No";
                                                                        endif;  ?>">
                    </td>
                    <td>
                        <!--<button id="delete" class="btn-sm btn-danger">Borrar</button>-->
                        <!--<button id="edit" class="btn-sm btn-warning">Editar</button>-->
                        <button class="btn btn-danger delete_user">Borrar</button>
                        <a class="btn btn-warning" href="index.php?con=usuario&ope=edit&id=<?= $item->getCodUsu() ?>">Editar</a>
                    </td>
                </tr>  
                 
            </tbody>  
        
        
<?php

                endforeach;


    else:
         $ses->redirect("index.php") ;
    endif;
endif;
?>
</table>  
    
    </div>
</form>


<div id="modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar usuario</h5>
      </div>
      <div class="modal-body">
        <p>¿Está seguro que desea eliminar a este usuario?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="delete" class="btn btn-danger" href="index.php?con=usuario&ope=delete&id=">Borrar</a>
      </div>
    </div>
  </div>
</div>

<?php
include "libs/Footer.php";
?>