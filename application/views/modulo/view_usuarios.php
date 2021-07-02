<div class="x_panel">	
		<div class="x_title">
			
            <div class="modulo_titulo">
                Usuario
            </div>
			
		</div>


		<div class="">
			<div class="acciones_modulo">

				<?php if($permisos['permisos'][0]['per_crear'] == 1):?>
					<button type="button" class="btn btn-primary btn-sm btn-frm-modal" data-id =""  data-tipo ="N"  data-form="usuario"  data-toggle="modal" data-target=".bs-example-modal-lg">
						<i class="fa fa-plus"></i> Agregar Usuario
					</button>
				<?php endif;?>

			</div>
			<div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">

							<table id="tbl_usuario" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<th>NOMBRE</th>
									<th>APELLIDO</th>
									<th>CELULAR</th>
									<th>CORREO</th>
									<th>DOMICILIO</th>
									<th>USUARIO</th>
									<th>ROL</th>
									<th>ESTADO</th>
									<th>ACCION</th>	
								</thead>


								<tbody>
									
							
								</tbody>
							</table>
                		</div>
                    </div>
                </div>
            </div>
			<!-- <div class="row">
				<div class="col-md-12">
					<div class="card-box table-responsive">
						<table id="tbl_usuario" class="display" >
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Celular</th>
									<th>Correo</th>
									<th>Domicilio</th>
									<th>Usuario</th>
									<th>Rol</th>
									<th>Estado</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>


							</tbody>
						</table>
					</div>
     			</div>
		    </div> -->
		</div>
		<script src="<?= base_url();?>js/page/usuario.js"></script>
</div>
	