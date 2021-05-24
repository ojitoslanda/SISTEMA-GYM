<!--begin container-->
<div class="container">
	<div class="row justify-content-around">
		<div class="card bg-light mb-3 col-xl-12" style="max-width: 20rem; /*margin-top: 16px;*/">
		    <div class="card-header bg-light align-self-center ">
		   	    <dt><h5><strong>PERFIL DE USUARIO</strong></h5></dt>
		   	</div>
			<form action="#" method="post">
						 <div class="col-12 col-xl-12 d-done d-md-block">&nbsp;&nbsp;&nbsp;</div>
				<div class="form-group text-center">
		 			<img src="assets/img/1.jpg" width="190" alt="Mi perfil">
		 		</div>
		 					<div class="form-group">
								<label for="usuario"><font face="Franklin Gothic">CIP: </font></label>
								<input type="text" class="form-control" name='usuario' value="<?php echo "$nombre"?>"  reandOnly disabled>
							</div>
							<div class="form-group">
								<label for="privilegios"><font face="Franklin Gothic">Privilegios:</font></label>
								<input type="text" class="form-control" name='clave' value="<?php  echo "$rol"?>" reandOnly disabled>
							</div>
		 		
				<center>
					<button type="button" class="btn btn-link registrar"  data-toggle="modal" data-target="#mimodal">
						 <h5>Modificar mi clave</h5>
					</button>
				</center>
			</form>
		</div>
	</div>
</div>
<!--end container-->

    <!--modal-->
    <div class="modal fade" id="mimodal">
        <div class="modal-dialog">
            <div class="modal-content">
        
                        <!--header-->
                        <div class="modal-header">
                        <h4 class="modal-title">Modificacion</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!--body-->
                        <div class="modal-body">
                             <form action="servidorPassword" method="POST">
                              
                            <div class="col-xl-12">
                              <div class="col-12">
                                <div class="col-12 d-none">
                                <input type="text" class="form-control" name="Codigo" value="<?php echo "$codigo" ?>" readonly>
                                <input type="text"  class="form-control" name="Usuario" value="<?php echo "$nombre"?>" readonly>
                                </div>
                                <label for="actual"><font face="Franklin Gothic">Clave Actual</font></label>       
                                <input type="password" class="form-control" name="actual" autofocus required>
                              </div>
                              <div class="col-xl-12">
                                <label for="nueva"><font face="Franklin Gothic">Clave nueva</font></label>       
                                <input type="password" class="form-control" name="nueva" required>
                              </div><br>
                              <div class="col-xl-12">
                              <center><button type="submit" class="btn btn-primary">Enviar</button></center>
                              </div>

                            </div>

                             </form>
                        </div>      
                </div>
            </div>
        </div>
