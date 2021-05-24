<div class="divIngresos">
 <table id="tabla-clienteEstrellas" class="hover cell-border order-column" style="width:100%">
        <thead>
            <tr>
                <th>Opcion</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Productos</th>
                <th>Rutina</th>
                <th>Baile</th>
                <th>Maquina</th>
            </tr>
        </thead>
        <tbody>
               <?php include("../controller/clientes/c_estrella.php"); ?>
        </tbody>
        <tfoot>
           <tr>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Productos</th>
                <th>Rutina</th>
                <th>Baile</th>
                <th>Maquina</th>
            </tr>
        </tfoot>
    </table>
</div>