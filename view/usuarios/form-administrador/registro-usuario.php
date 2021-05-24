<!--begin container-->
<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto border border-2">
			<form action="../controller/usuario/registrar.php" method="post"  enctype="multipart/form-data" class="row my-3">
				<div class="col-md-3">
					<div class="form-group text-center">
						<img src="assets/img/user.png" id="Image1" class="w-50 h-50 img-fluid img-thumbnail" >
						<button id="files" class="btn btn-dark" onclick="document.getElementById('file').click(); return false;">Cargar Imagen</button>
						<input type="file"  id="file" onchange="readURL(this);" class="form-control" accept="image/*" style="visibility: hidden;" name="imagen" >
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="nombre"><font face="Franklin Gothic">Nombre: </font></label>
								<input type="text" placeholder="Escribe su nombre"  class="form-control"  name='nombre' required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="privilegios"><font face="Franklin Gothic">Privilegios:</font></label>
								<select name="rol" class="custom-select" required>
									<option value="">Seleccione.....</option>
									<option value="Usuario" required>Usuario</option>
									<option value="Administrador" required>Administrador</option>
									</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="usuario"><font face="Franklin Gothic">Usuario: </font></label>
								<input type="text" placeholder="Escribe el usuario"  class="form-control"  name='usuario' required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="contraseña"><font face="Franklin Gothic">Contraseña:</font></label>
								<input type="password" placeholder="Escribe su contraseña" id="password1" maxlength="20" name='clave' class="form-control"  required >
								<div class="custom-control custom-checkbox mr-sm-2">
									<input type="checkbox" class="custom-control-input"  onchange="document.getElementById('password1').type = this.checked ? 'text' : 'password'" id="customControlAutosizing">
									<label class="custom-control-label efecto" for="customControlAutosizing">Ver Contraseña</label>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-center">
							<input type="submit" class="btn btn-success" value="Registrar Usuario">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- 
<div class="container">
	<div class="col-6 col-xl-12 ">
			<span class="float-right border">&nbsp;&nbsp;&nbsp;&nbsp;<a href="cpanel-consultar-usuario">
				<img src="assets/img/user-update.png" title="Modificar Usuario" width="90"><br>
				<font face="Franklin Gothic">Modificar usuarios</font></a>
			</span>
	</div>
	<div class="row justify-content-around">
<div class="col-12 col-xl-12 d-done d-md-block">&nbsp;&nbsp;&nbsp;</div>
		<div class="card bg-light mb-3 col-xl-12" style="max-width: 24rem;">
		  <div class="card-header bg-light align-self-center "><dt><h5><strong>REGISTRO DE USUARIO</strong></h5></dt></div>
		  <div class="card-body">
				<form action="../controller/usuario/registrar.php" method="post"  enctype="multipart/form-data">
					 <div class="form-group text-center">
				        <img src="assets/img/user.png" id="Image1" width="180" >
				        <button id="files" onclick="document.getElementById('file').click(); return false;">Cargar Imagen</button>
				        <input type="file"  id="file" onchange="readURL(this);" class="form-control" accept="image/*" style="visibility: hidden;" name="imagen" >
				      </div>
					<div class="form-group">
						<label for="nombre"><font face="Franklin Gothic">Nombre: </font></label>
						<input type="text" placeholder="Escribe su nombre"  class="form-control"  name='nombre' required>
					</div>
					<div class="form-group">
						<label for="usuario"><font face="Franklin Gothic">Usuario: </font></label>
						<input type="text" placeholder="Escribe el usuario"  class="form-control"  name='usuario' required>
					</div>
					<div class="form-group">
						<label for="contraseña"><font face="Franklin Gothic">Contraseña:</font></label>
						<input type="password" placeholder="Escribe su contraseña" id="password1" maxlength="20" name='clave' class="form-control"  required >
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input"  onchange="document.getElementById('password1').type = this.checked ? 'text' : 'password'" id="customControlAutosizing">
							<label class="custom-control-label efecto" for="customControlAutosizing">Ver Contraseña</label>
						</div>
					</div>
					<div class="form-group">
						<label for="privilegios"><font face="Franklin Gothic">Privilegios:</font></label>
						<select name="rol" class="custom-select" required>
							<option value="">Seleccione.....</option>
							<option value="Usuario" required>Usuario</option>
						 	<option value="Administrador" required>Administrador</option>
						 </select>
					</div>
				<center><button type="submit" class="btn btn-primary registrar" >Registrar</button></center>
			</form>
			</div>
		</div>
	</div>
</div> -->
<style>
 .registrar{
 	width: 200px;
	font-family: arial;
 }
 .efecto {
 background-color: transparent;
	opacity: 0.5;
 }
  input[type=file]
  {
    color:transparent;

  }
</style>