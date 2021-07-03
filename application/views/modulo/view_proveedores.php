<div class="x_panel">	
		<div class="x_title">
			
            <div class="modulo_titulo">
                Proveedores para el nuevo sistema de inventario 
            </div>
			
		</div>

		<div class="">
			<div class="acciones_modulo">
			<?php if($permisos['permisos'][0]['per_crear'] == 1):?>
				<button type="button" class="btn btn-primary btn-sm btn-frm-modal"  data-id =""  data-tipo ="N"  data-form="proveedores"  data-toggle="modal" data-target=".bs-example-modal-lg">
					<i class="fa fa-plus"></i> Agregar Proveedor 
				</button>
				<?php endif;?>

		
			</div>
			<div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">

							<table id="tbl_proveedores" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<th>RUC</th>
									<th>RAZON SOCIAL</th>								
									<th>RESPONSABLE</th>								
									<th>DIRECCION</th>
									<th>TIPO PERSONA</th>
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
		<script src="<?= base_url();?>js/page/proveedores.js"></script>
</div>
	