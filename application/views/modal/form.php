<?php
$func = $form;
$form($tipo , $datos);


?>
<?php function modalDefecto(){?>

    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">El sistema dice:</h4>
        <button type="button" class="close  close-modal-1" data-dismiss="modal"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        No cuentas con permisos para esta accion.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
    
    

 <?php } function usuario($tipo, $datos){
    if($tipo =='V' || $tipo == 'NN'){
        $disabled ="disabled";
    }else{
        $disabled ="";
    }
        $titulo = array('N' => 'AGREGAR USUARIO','M' =>'ACTUALIZAR USUARIO' , 'V' =>'VER DATOS DEL USUARIO');
        $accion = array('N' => 'insertUsuario','M' =>'updateUsuario' , 'V' =>'');
       
    ?>
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?=$titulo[$tipo];?></h4>
        <button type="button" class="close  close-modal-1" data-dismiss="modal"><span aria-hidden="true">×</span></button>
    </div>
    <?php if($tipo !='V'):?>
    <form enctype="multipart/form-data"  method="POST" name="frmUsuario" id="frmUsuario" onsubmit=" return <?=$accion[$tipo]?>();"  autocomplete="off">
    <?php endif;?>
    <div class="modal-body">

        <?php if($tipo !='N'){  ?>
            <input type="hidden" id='txtCodigo' name="txtCodigo" value="<?= $datos['usuario'][0]['id_usuario']?>">
        <?php } ?>
        
        <div class="row">


            <div class="col-12">
                <div class="col-md-6">    
                <label for="txtNombre" class="text-input">Foto del Usuario:</label>
                    <div class="contenedor">
                        <div class="contenedor-img">
                            <div class="img" style="background-image: url(<?=$datos['url_image']?>);">

                        
                            </div>
                            <div class=""> 
                                <label for="imgSubir" class="btn <?= $tipo == 'N'? 'btn btn-success':'btn btn-warning' ?> btn-img"><?= $tipo == 'N'? 'Agregar':'Cambiar'?>
                                    <input type="file" name="imagen" id="imgSubir" class="btn btn-success btn-img" accept="image/png, image/jpeg" style="display:none;"/>
                                </label>
                                <!-- <button type="button" class="btn btn-success btn-img">SUBIR</button> -->
                            </div>

                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="txtNombre" class="text-input is-required">Nombres:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="txtNombre"  id="txtNombre" value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['nombre'] : '' ?>" class="form-control" <?= $disabled ?> >
                        
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtApellido" class="text-input is-required">Apellidos:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="txtApellido"  id="txtApellido" value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['apellido'] : '' ?>" class="form-control" <?= $disabled ?> >
                            
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtTipoDocumento" class="text-input is-required">Tipo Documento:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <select class="form-control" name="txtTipoDocumento" id="txtTipoDocumento" <?= $disabled ?>>
                                
                                <option value="" <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['tipo_documento'] =='') ? 'selected': '') : '' ?> >Seleccione...</option>
                                <option value="DNI"  <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['tipo_documento'] =='DNI') ? 'selected': '') : '' ?>>DNI</option>
                                <option value="CARNETDEEXTRANAJERIA"  <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['tipo_documento'] =='CARNETDEEXTRANAJERIA') ? 'selected': '') : '' ?>>CARNET DE EXTRANJERIA</option>
                            </select>
                        
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtNumDocumento" class="text-input is-required">N° Documento:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-id-card" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="txtNumDocumento"  id="txtNumDocumento"  class="form-control" value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['num_documento'] : '' ?>" <?= $disabled ?> >
                        
                        </div>
                </div>

                <div class="col-md-6"> 
                    <label for="txtSexo" class="text-input is-required">Sexo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-genderless" aria-hidden="true"></i></span>
                            </div>
                            <select class="form-control" name="txtSexo" id="txtSexo" <?= $disabled ?>>
                                
                                <option value="" <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['sexo'] =='') ? 'selected': '') : '' ?> >Seleccione...</option>
                                <option value="M"  <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['sexo'] =='M') ? 'selected': '') : '' ?>>Masculino</option>
                                <option value="F"  <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['sexo'] =='F') ? 'selected': '') : '' ?>>Femenino</option>
                            </select>
                        
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtNac" class="text-input is-required">Fecha Nacimiento:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                            </div>
                            <input type="date"  name="txtNac" id="txtNac" value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['fecha_nacimiento'] : '' ?>" class="form-control" <?= $disabled ?>>
                        
                        </div>
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="text-input is-required">Celular:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-mobile fa-lg" aria-hidden="true"></i></span>
                            </div>
                            <input type="number"  name="txtCelular" id="txtCelular" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['cel'] : '' ?>" <?= $disabled ?>>
                        
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtCorreo" class="text-input">Correo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <input type="email"  name="txtCorreo" id="txtCorreo" class="form-control"   value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['correo'] : '' ?>" <?= $disabled ?> >
                        
                        </div>
                </div>

                <div class="col-md-12">
                    <label for="txtDomicilio" class="text-input ">Domicilio:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-home" aria-hidden="true"></i></span>
                            </div>
                            <input type="text"  name="txtDomicilio" id="txtDomicilio" class="form-control"   value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['direccion'] : '' ?>" <?= $disabled ?>>
                        
                        </div>
                </div>

                <div class="col-md-6">
                    <label for="txtUsuario" class="text-input is-required">Usuario:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input type="text"  name="txtUsuario" id="txtUsuario" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['nom_usuario'] : '' ?>" <?= $disabled ?> >
                        
                        </div>
                </div>


                <div class="col-md-6">
                    <label for="txtRol" class="text-input is-required">Rol:</label>


                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-list" aria-hidden="true"></i></span>
                            </div>
                        
                            <select class="form-control" name="txtRol" id="txtRol"  <?= $disabled ?>>

                               
                            <option value="" <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['rol_usu'] =='') ? 'selected': '') : '' ?>> Seleccione...</option>

                                <?php foreach($datos['roles'] as $row):?>
                                    <option value="<?=$row['id_rol']?>"  <?= (isset($datos) && $tipo !='N') ? (($datos['usuario'][0]['rol_usu'] ==$row['id_rol']) ? 'selected': '') : '' ?>><?=$row['nombre_rol']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                </div>

                  
                <div class="col-md-6">
                    <label for="txtPass" class="text-input is-required">Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                        
                            <input type="password" name="txtPass" id="txtPass"  value="<?= (isset($datos) && $tipo !='N') ? $datos['usuario'][0]['contrasena'] : '' ?>"  class="form-control password" <?= $disabled ?>  >
                        </div>
                </div>

                <?php if($tipo =='N'){?>   
                <div class="col-md-6">
                    <label for="txtPassConfirm" class="text-input is-required">Confirmar Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                        
                            <input type="password" name="txtPassConfirm" id="txtPassConfirm"  class="form-control password"  >
                        </div>
                </div>
                <?php } ?>
                <div class="col-md-12 checkbox" >
                    <div class="checkbox">
						<label>
						<input type="checkbox" class="mostrarPass" value=""> Mostrar Contraseña?
						</label>
					</div>
                </div>

            </div>
        </div>


       
        
        
    </div>
    <?php if($tipo !='V'){?>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
	</div>
    </form>
    <?php } ?>

    
  
<?php } function roles($tipo, $datos){ 

    if($tipo =='V' || $tipo == 'NN'){
        $disabled ="disabled";
    }else{
        $disabled ="";
    }

        $titulo = array('N' => 'AGREGAR ROL','M' =>'ACTUALIZAR ROL' , 'V' =>'VER INFORMACION');
        $accion = array('N' => 'insertRol','M' =>'updateRol' , 'V' =>'');
?>
 <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?=$titulo[$tipo];?></h4>
        <button type="button" class="close  close-modal-1" data-dismiss="modal"><span aria-hidden="true">×</span></button>
    </div>
    <form enctype="multipart/form-data"  method="POST" name="frmRol" id="frmRol" onsubmit=" return <?=$accion[$tipo]?>();"  autocomplete="off">
    <div class="modal-body">

        <?php if($tipo !='N'){  ?>
            <input type="hidden" id='txtCodigo' name="txtCodigo" value="<?= $datos['rol'][0]['id_rol']?>">
        <?php } ?>

        <div class="row">
                <div class="col-md-6">
                    <label for="txtNombreRol" class="text-input is-required">Nombre Rol:</label>
                        <div class="input-group">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div> -->
                            <input type="text"  name="txtNombreRol" id="txtNombreRol" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['rol'][0]['nombre_rol'] : '' ?>"  <?= $disabled ?> >
                        
                        </div>
                </div>
                <div class="col-md-12">
                    <label for="txtDescripcionRol" class="text-input">Descripcion:</label>
                        <div class="input-group">
                            <!-- <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div> -->
                            <textarea name="txtDescripcionRol" id="txtDescripcionRol" cols="10" rows="5" class="form-control"  <?=$disabled?> ><?= (isset($datos) && $tipo !='N') ? $datos['rol'][0]['descripcion_rol'] : '' ?></textarea>
                        
                        </div>
                </div>
        </div>

    </div>
<?php if($tipo !='V'){?>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
<?php } ?>
</form>


<?php } function permisos($tipo, $datos){
     if($tipo =='V' || $tipo == 'NN'){
        $disabled ="disabled";
    }else{
        $disabled ="";
    }

        $titulo = array('N' => 'VER PERMISOS','M' =>'VER PERMISOS' , 'V' =>'VER PERMISOS');
        $accion = array('N' => 'insertRol','M' =>'updateRol' , 'V' =>'');
?>
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?=$titulo[$tipo];?></h4>
        <button type="button" class="close  close-modal-1" data-dismiss="modal"><span aria-hidden="true">×</span></button>

    </div>

    <form enctype="multipart/form-data"  method="POST" name="frmPermisos" id="frmPermisos" onsubmit=" return permisos();"  autocomplete="off">
    <div class="modal-body">

        <div class="row">
                <div class="col-md-12">
                    <label for="txtNombreRol" class="text-input">Rol:</label>
                        <div class="input-group">
                            
                            <input type="text"  name=""  disabled="disabled" id="" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['rol'][0]['nombre_rol'] : '' ?>"  >
                            <input type="hidden" id="codigoRol" name="codigoRol"  value="<?= (isset($datos) && $tipo !='N') ? $datos['rol'][0]['id_rol'] : '' ?>"  >
                        </div>
                </div>
                </div>
        <table class="table">

            <tbody>
                <?php foreach($datos['grupo'] as $rowGrupo):?>
                            <tr>
                                <th colspan="8" align="center" style="background: #3976b0; color: #ffff;">GRUPO: <?= $rowGrupo['nombre_grupo'];?></th>     
                            </tr>
                            <tr style="background: #dedede; " >
                                <td colspan="3" ></td> 
                                <td > MODULO</td>
                                <td class="table_td">VER</td>
                                <td class="table_td">CREAR</td>
                                <td class="table_td">EDITAR</td>
                                <td class="table_td">ELIMINAR</td>
                            </tr>
                    <?php foreach($datos['modulos'] as $modulo):?>
                        
                        <?php if($rowGrupo['id_grupo_modulo'] == $modulo['id_grp_modulo']):?>
                            
                                <tr>    
                                <td  colspan="3" ></td> 
                                    
                                    <td><?=$modulo['nombre_modulo']?>
                                    <input type="hidden" name="codigoModulo[]" value="<?= $modulo['id_modulo']?>">
                                    </td>  

                                    <td class="table_td">
                                        <label class="form-switch">
                                            <input type="checkbox" class="" id="ver<?=$modulo['id_modulo']?>" name="ver[<?=$modulo['id_modulo']?>]" <?= ($modulo['per_ver'] == 1 ? 'checked':'') ?> value="1"  <?=$disabled ?> >
                                            <i></i>
                                        </label>
                                    </td>  
                                    <td class="table_td">
                                        <label class="form-switch">
                                            <input type="checkbox" class="" id="crear<?=$modulo['id_modulo']?>" name="crear[<?=$modulo['id_modulo']?>]"  <?= ($modulo['per_crear'] == 1 ? 'checked':'') ?> value="1" <?=$disabled ?>>
                                            <i></i>
                                        </label>
                                    </td>  
                                    <td  class="table_td">
                                        <label class="form-switch">
                                            <input type="checkbox" class="" id="editar<?=$modulo['id_modulo']?>" name="editar[<?=$modulo['id_modulo']?>]"  <?= ($modulo['per_editar'] == 1 ? 'checked':'') ?> value="1"  <?=$disabled ?> >
                                            <i></i>
                                        </label>
                                    </td>  
                                    <td  class="table_td">
                                        <label class="form-switch">
                                            <input type="checkbox" class="" id="eliminar<?=$modulo['id_modulo']?>]" name="eliminar[<?=$modulo['id_modulo']?>]"  <?= ($modulo['per_eliminar'] == 1 ? 'checked':'') ?> value="1" <?=$disabled ?> > 
                                            <i></i>
                                        </label>
                                    </td>  
                                </tr>
                        <?php endif;?>

                    <?php endforeach;?>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>

<?php if($tipo !='V'){?>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
<?php } ?>
</form>

<?php } function proveedores($tipo, $datos){ 

if($tipo =='V' || $tipo == 'NN'){
    $disabled ="disabled";
}else{
    $disabled ="";
}

    $titulo = array('N' => 'AGREGAR PROVEEDOR','M' =>'ACTUALIZAR PROVEEDOR' , 'V' =>'VER INFORMACION');
    $accion = array('N' => 'insertProveedor','M' =>'updateProveedor' , 'V' =>'');
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel"><?=$titulo[$tipo];?></h4>
    <button type="button" class="close  close-modal-1" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<form enctype="multipart/form-data"  method="POST" name="frmProveedor" id="frmProveedor" onsubmit=" return <?=$accion[$tipo]?>();"  autocomplete="off">
<div class="modal-body">

    <?php if($tipo !='N'){  ?>
        <input type="hidden" id='txtCodigoProveedor' name="txtCodigoProveedor" value="<?= $datos['proveedores'][0]['id_proveedor']?>">
    <?php } ?>

    <div class="row">
            <div class="col-md-6">
                <label for="txtRuc" class="text-input is-required">Ruc/Dni:</label>
                    <div class="input-group">
                        <input type="text"  name="txtRuc" id="txtRuc" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['ruc'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-6">
                <label for="txtTipoPersona" class="text-input is-required">Tipo de Persona:</label>
                    <div class="input-group">
                      <select name="txtTipoPersona" class="form-control" id="txtTipoPersona" <?= $disabled ?>>
                        <option value="">Seleccione...</option>
                        <option value="JURIDICA" <?= (isset($datos) && $tipo !='N') ? (  $datos['proveedores'][0]['tipo_persona'] == 'JURIDICA' ? 'selected':'' ) : '' ?> >JURIDICA</option>
                        <option value="NATURAL" <?= (isset($datos) && $tipo !='N') ? (  $datos['proveedores'][0]['tipo_persona'] == 'NATURAL' ? 'selected':'' ) : '' ?> >NATURAL</option>

                      </select>
                    
                    </div>
            </div>
            <div class="col-md-12">
                <label for="txtRazonSocial" class="text-input is-required">Razon Social:</label>
                    <div class="input-group">
                        <input type="text"  name="txtRazonSocial" id="txtRazonSocial" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['razon_social'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-12">
                <label for="txtDireccion" class="text-input">Dirección:</label>
                    <div class="input-group">
                        <input type="text"  name="txtDireccion" id="txtDireccion" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['direccion'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-12">
                <label for="txtCorreoPro" class="text-input">Correo:</label>
                    <div class="input-group">
                        <input type="text"  name="txtCorreoPro" id="txtCorreoPro" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['correo'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-6">
                <label for="txtTelefonoPro" class="text-input is-required">Telefono:</label>
                    <div class="input-group">
                        <input type="text"  name="txtTelefonoPro" id="txtTelefonoPro" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['telefono'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>

            <div class="col-md-12">
                <hr>
                <h6>Datos del Encargado:</h6>
            </div>

            <div class="col-md-6">
                <label for="txtNombreEncargado" class="text-input">Nombre Encargado:</label>
                    <div class="input-group">
                        <input type="text"  name="txtNombreEncargado" id="txtNombreEncargado" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['nombre_encargado'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-6">
                <label for="txtApellidoEncargado" class="text-input">Apellido Encargado:</label>
                    <div class="input-group">
                        <input type="text"  name="txtApellidoEncargado" id="txtApellidoEncargado" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['apellido_encargado'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
            <div class="col-md-6">
                <label for="txtTelefonoEncargado" class="text-input">Cel Encargado:</label>
                    <div class="input-group">
                        <input type="text"  name="txtTelefonoEncargado" id="txtTelefonoEncargado" class="form-control"  value="<?= (isset($datos) && $tipo !='N') ? $datos['proveedores'][0]['cel_encargado'] : '' ?>"  <?= $disabled ?> >
                    
                    </div>
            </div>
          
            
    </div>

</div>
<?php if($tipo !='V'){?>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

<button type="submit" class="btn btn-primary">Guardar</button>
</div>
<?php } ?>
</form>

    
<?php } ?>