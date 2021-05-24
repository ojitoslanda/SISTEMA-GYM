<div class="divegresos">
<table id="tabla-mensual" class="display" style="width:100%">
       <thead>
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
        </thead>
        <tbody>
                    <?php require_once '../controller/clientes/c_mensual_clientes.php'; ?>           
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