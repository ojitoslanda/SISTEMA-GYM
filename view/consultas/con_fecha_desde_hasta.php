<br>
<div class="container">
    <div class="row">
            <div class="col-md-3 offset-md-2">
            <form action="#" method="post">
                     Desde:<input type="date" class="form-control" name="desde" required="">
            </div>
            <div class="col-md-3">
                     Hasta:<input type="date" class="form-control" name="hasta" required="">
            </div>
              <div class="col-md-3">
            <br><button type="submit" class="btn btn-primary">Buscar</button>
             </form>
            </div>
<!---->
        <div class="col-md-12">
            <div class="table-responsive">
                <?php require_once '../controller/reportes/consulta_desde_hasta.php'; ?>
            </div>
        </div>
<!---->
    </div>
</div>

