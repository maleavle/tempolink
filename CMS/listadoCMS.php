<?php

require_once("../DAO/Usuario.php");
$usuarios = Usuario::listado();
$numRegistros = count($usuarios);
$paginaActual = 0;
$registrosXPagina = 10;
if( isset( $_GET["pagina"] ) ) {
    $paginaActual = $_GET["pagina"];
}

?>
<h3>LISTADO DE USUARIOS</h3>
<br />
En esta secci&oacute;n usted podra gestionar los usuarios que accederan al CMS de su sitio web.<br /><br />
<?php if($numRegistros != 0 ) {?>
<table id="tablaGen">
	<thead>
        <tr>
            <th width="50%" valign="bottom">NOMBRE DEL USUARIO</th>
            <th width="20%" align="center">USUARIO</th>
            <th width="10%" align="center">EDITAR</th>
            <th width="10%" align="center">ELIMINAR</th>
        </tr>
	</thead>
	<tbody>
    <?php
    for($i =0; $i < $numRegistros; $i++ ) {?>
        <tr>
            <td><?php echo($usuarios[$i]->getNombre()); ?></td>
            <td align="center"><?php echo($usuarios[$i]->getLogin()); ?></td>
            <td align="center"><a href="javascript:document.location.href='index.php?pag=usuarios&opc=editarCMS&id=<?php echo($usuarios[$i]->getId()); ?>';"><img src="images/edit.png" alt="Editar" title="Editar" /></a></td>
            <td align="center"><a href="javascript:if(confirm('\xbfDesea eliminar este usuario?')){document.location.href='index.php?pag=usuarios&opc=eliminarCMS&id=<?php echo($usuarios[$i]->getId()); ?>';}"><img src="images/delete.png" alt="Eliminar" title="Eliminar" /></a></td>
        </tr>
    <?php
    }?>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="6" align="right"><input type="button" value="Nuevo" id="btnNuevo" class="button" onclick="javascript:document.location.href='index.php?pag=usuarios&opc=editarCMS&id=0';"/></td>
        </tr>
    </tfoot>
</table> 
<?php
}
else {?>
<br />
<h3>No existen usuarios</h3><?php
}
?>