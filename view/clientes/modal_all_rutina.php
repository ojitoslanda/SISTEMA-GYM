<style>
.divproducto{
  height: 400px;
  overflow: auto;
}
</style>
<div class="modal fade" id="ModalRutina" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="ModalProdTitle">
  <div class="modal-dialog modal-dialog-centered modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro y/o Reporte de Rutina</h5>
        <button type="button" class="close"  id="rutinaAll" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
             <div class="row">
                  <div class="col-md-12">
                  <div class="container  border-bottom border-danger" id="panel_modificar_rutina" style="display:none;">
                        <h6>Modificar Rutina</h6> 
                        <div class="row mb-4">
                            <div class="col-md-4">
                            <form action="#" method="post">
                                <label class="font-weight-light">Rutina</label>
                                <input type="hidden" class="form-control idRutina" disabled>
                                <input type="text" class="form-control nameRutina" disabled placeholder="rutina">
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-light">Costo</label>
                                <input type="text" class="form-control costoRutina decimales_cr" required placeholder="costo">
                            </div>
                            <div class="col-md-5 mt-2"><br>
                                <button type="button" class="btn btn-success"
                                disabled id="btnModificarRutina">Modificar </button>
                                <button type="button" class="btn btn-info" id="btnCloseUpdateRutina">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="divproducto mt-4">
                      <table id="table-productos-rutina" class="table text-center" cellspacing="0" width="100%">
                              <thead class="thead-light">
                                  <tr>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php include '../controller/producto/consultar_producto_rutina.php'; ?>
                              </tbody>
                        </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" onclick="location.reload()">Salir</button>
      </div>
    </div>
  </div>
</div>
