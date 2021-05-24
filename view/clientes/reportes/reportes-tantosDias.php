<div class="divIngresos">
 <table id="tabla-tantosdias" class="hover cell-border order-column" style="width:100%">
        <thead>
            <tr>
            <th>Opciones</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Actualizada</th>
            <th>Productos hoy</th>
            <th>Dias</th>
            <th>Rutina</th>
            <th>Baile</th>
            <th>Maquina</th>
            </tr>
        </thead>
        <tbody>
                   <?php require_once '../controller/clientes/c_tantosdias.php';?>           
        </tbody>
        <tfoot>
           <tr>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Fecha Inicio</th>
              <th>Fecha Actualizada</th>
              <th>Productos hoy</th>
              <th>Dias</th>
              <th>Rutina</th>
              <th>Baile</th>
              <th>Maquina</th>
            </tr>
        </tfoot>
    </table>
</div>