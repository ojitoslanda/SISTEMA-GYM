<div class="container">
    <div class="row">
            <div class="col-md-3 pt-4 offset-md-4">
            <form action="#" method="post">
            <b> Nombre: </b>
            <input type="text" placeholder="Nombre del cliente" class="form-control" name="nom">
            </div>
              <div class="col-md-3 pt-4">
            <br>
            <button type="submit" class="btn btn-primary">Buscar</button>
             </form>
            </div>
<!---->
        <div class="col-md-12 ">
            <div class="table-responsive">
                <?php require_once '../controller/reportes/consulta_nombre_cliente.php'; ?>
            </div>
        </div>
<!---->
    </div>
</div>

