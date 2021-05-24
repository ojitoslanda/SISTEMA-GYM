<style>
.divproducto{
  height: 400px;
  overflow: auto;
}
</style>
<div class="modal fade" id="ModalProd" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="ModalProdTitle">
  <div class="modal-dialog modal-dialog-centered modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro y/o Reporte de producto</h5>
        <button type="button" class="close"  id="new1" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
             <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <form action="../controller/producto/agregar_producto.php" method="POST">
                         <label class="font-weight-light">Nombre del Producto</label>
                         <input type="hidden" class="form-control">
                         <input type="text" class="form-control" name="nombre" placeholder="producto" required="">
                         <label class="font-weight-light">Costo del Producto</label>
                         <input type="text" class="form-control decimales" name="costo" placeholder="costo" required="">
                         <input type="submit" class="btn btn-primary my-4 align-content-center" value="Guardar producto">
                       </form>
                    </div>
                  </div>
                  <div class="col-md-9 border-left border-danger">
                    <div class="container mb-4 " id="panel_modificar" style="display:none;">
                      <div class="row">
                        <div class="col-md-4">
                        <form action="#" method="post">
                          <label class="font-weight-light">Nombre Producto</label>
                            <input type="hidden" class="form-control idproducto">
                            <input type="text" class="form-control nomproducto" required placeholder="producto">
                        </div>
                        <div class="col-md-3">
                              <label class="font-weight-light">Costo Producto</label>
                            <input type="text" class="form-control costproducto decimales" required placeholder="costo">
                        </div>
                        <div class="col-md-5 mt-2"><br>
                            <button type="button" class="btn btn-success"
                            disabled id="btnModificar">Modificar </button>
                            <button type="button" class="btn btn-info" id="salir" >Cancelar </button>
                            </form>
                        </div>
                      </div>
                    </div>

                    <div class="divproducto">
                        <table id="table-productos" class="table text-center  " cellspacing="0" width="100%">
                              <thead class="thead-light">
                                  <tr>
                                    <th>Nombre</th>
                                    <th>Costo</th>
                                    <th>Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php include '../controller/producto/consultar_producto.php'; ?>
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
