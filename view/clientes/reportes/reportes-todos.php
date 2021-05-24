<div class="divIngresos">
 <table id="tabla-todosClientes" class="hover cell-border order-column" style="width:100%">
        <thead>
            <tr>
                <th>Opcion</th>
                <th>¿Pago?</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Productos</th>
                <th>Rutina</th>
                <th>Baile</th>
                <th>Maquina</th>
                <th>Estrella</th>
            </tr>
        </thead>
        <tbody>
               <?php include("../controller/clientes/c_todos.php"); ?>
        </tbody>
        <tfoot>
           <tr>
                <th>Opciones</th>
                <th>¿Pago?</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Productos</th>
                <th>Rutina</th>
                <th>Baile</th>
                <th>Maquina</th>
                <th>Estrella</th>
            </tr>
        </tfoot>
    </table>
</div>