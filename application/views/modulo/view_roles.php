<div class="x_panel">	
		<div class="x_title">
			
            <div class="modulo_titulo">
                Roles y Permisos
            </div>
			
		</div>

		<div class="">
			<div class="acciones_modulo">
			<?php if($permisos['permisos'][0]['per_crear'] == 1):?>
				<button type="button" class="btn btn-primary btn-sm btn-frm-modal" data-id =""  data-tipo ="N"  data-form="roles"  data-toggle="modal" data-target=".bs-example-modal-lg">
					<i class="fa fa-plus"></i> Agregar Roles 
				</button>
				<?php endif;?>

		
			</div>
			<div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">

							<table id="tbl_roles" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<th>N°</th>
									<th>ROL</th>
									<th>DESCRIPCION</th>								
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
		</div>
		<script src="<?= base_url();?>js/page/roles.js"></script>
</div>
	