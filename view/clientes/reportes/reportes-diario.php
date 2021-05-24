
<p class="font-weight-normal">
<?php  
    $hoy = date('Y-m-d'); //Consulto la fecha de hoy
    echo "Registro de personas que ingresaron en $hoy";
?>
</p>

<div class="divIngresos">
 <table id="tabla-diario" class="hover cell-border order-column" style="width:100%">
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
                   <?php require_once '../controller/clientes/c_diario_clientes.php'; ?>           
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