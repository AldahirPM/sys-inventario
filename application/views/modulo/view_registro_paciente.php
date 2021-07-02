<div class="x_panel">	
		<div class="x_title">
			
			<h1>Pacientes<small></small></h1>
			
		</div>

		<div class="">
			
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
			<i class="fa fa-plus"></i> Agregar Paciente</button>

			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Agregar Paciente</h4>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				
				<form class="form-label-left input_mask">

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Primer Nombre <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Segundo nombre
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Primer Apellido<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Segundo Apellido<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Direccion (Domicilio)
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ocupacion Laboral
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>



					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Telefono
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>

					<div class=" item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">DNI<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="first-name" required="required" class="form-control ">
						</div>
					</div>


					<!---fin de nombre s-->

					<!--
					<div class=" item form-group">
						<input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
						<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
					</div>

					<div class=" item form-group">
						<input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone">
						<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
					</div>

					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Default Input</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" class="form-control" placeholder="Default Input">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Disabled Input </label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-md-3 col-sm-3 ">Read-Only Input</label>
						<div class="col-md-9 col-sm-9 ">
							<input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
						</div>
					</div>-->

					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 ">
							<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
							<script>
								function timeFunctionLong(input) {
									setTimeout(function() {
										input.type = 'text';
									}, 60000);
								}
							</script>
						</div>
					</div>

				
					<!--<div class="ln_solid"></div>
						<div class="form-group row">
						<div class="col-md-9 col-sm-9  offset-md-3">
							<button type="button" class="btn btn-primary">Cancel</button>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>-->

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>

				</div>
			</div>
			</div>
			
		</div>
		<br>
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
				<th>Salary</th>
				<th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
				<td>$320,800</td>
				<td>
				<div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      Accion
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Eliminar</a>
                      <a class="dropdown-item" href="#">Editar</a>
                  </div>
				</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
				<td>$170,750</td>
				<td>
				<div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      Accion
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Eliminar</a>
                      <a class="dropdown-item" href="#">Editar</a>
                  </div>
				</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
				<td>$86,000</td>
				<td>
				<div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      Accion
                    </button>
                    <div class="dropdown-menu">
					<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg">
					<i class="fa fa-plus"></i> Agregar Paciente</button>
                      <a class="dropdown-item" href="#">Eliminar</a>
                      <a class="dropdown-item" href="#">Editar</a>
                  </div>
				</td>
            </tr>

        </tbody>

	</table>
</div>
	<!-- <div class="x_panel">	
		<div class="x_title">
			<h1>Registrar Paciente<small></small></h1>
		</div>
		<div class="x_content">
			<br />
			<form class="form-label-left input_mask">


				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Primer Nombre <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>

				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Segundo nombre
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>

				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Primer Apellido<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>

				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Segundo Apellido<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>
				
				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Direccion (Domicilio)
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>

				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ocupacion Laboral
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>



				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Telefono
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>

				<div class=" item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">DNI<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" required="required" class="form-control ">
					</div>
				</div>-->


				<!---fin de nombre s-->

<!--
				<div class=" item form-group">
					<input type="email" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
					<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
				</div>

				<div class=" item form-group">
					<input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone">
					<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
				</div>

				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 ">Default Input</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="text" class="form-control" placeholder="Default Input">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 ">Disabled Input </label>
					<div class="col-md-9 col-sm-9 ">
						<input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-md-3 col-sm-3 ">Read-Only Input</label>
					<div class="col-md-9 col-sm-9 ">
						<input type="text" class="form-control" readonly="readonly" placeholder="Read-Only Input">
					</div>
				</div>-->

				<!--<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align">Fecha de Nacimiento <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 ">
						<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
						<script>
							function timeFunctionLong(input) {
								setTimeout(function() {
									input.type = 'text';
								}, 60000);
							}
						</script>
					</div>
				</div>

				<div class="ln_solid"></div>
				<div class="form-group row">
					<div class="col-md-9 col-sm-9  offset-md-3">
						<button type="button" class="btn btn-primary">Cancel</button>
						<button class="btn btn-primary" type="reset">Reset</button>
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				</div>

			</form>
		</div>
	</div>	-->
