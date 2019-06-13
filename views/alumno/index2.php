<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <div id="main">
        <h4>Listado de Alumno</h4><br>
        <a href="<?php echo constant('URL'); ?>alumno/nuevo">Nuevo Alumno</a><br><br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>TELEFONO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody-alumnos">
                    <?php
                    include_once 'models/alumnos.php';
                    foreach ($this->alumnos as $item) {
                        $alumno = new Alumnos();
                        $alumno = $item; ?>
                        <tr id="fila-<?php echo $alumno->id; ?>">
                            <td id="td-<?php echo $alumno->id; ?>"><?php echo $alumno->id; ?></td>
                            <td id="td-<?php echo $alumno->nombre; ?>"><?php echo $alumno->nombre; ?></td>
                            <td id="td-<?php echo $alumno->apellido; ?>"><?php echo $alumno->apellido; ?></td>
                            <td id="td-<?php echo $alumno->telefono; ?>"><?php echo $alumno->telefono; ?></td>
                            <td>
                                <button class="btnEditar" data-id="<?php echo $alumno->id; ?>">Editar</button>

                                <button class="btnEliminar" data-id="<?php echo $alumno->id; ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>




<!-- Para el editar -->
    <table>
                    <tr>
                        <td><label for="nombre">Nombre</label></td>
                        <td><input type="text" id="nombre" name="nombre" required></td>
                    </tr>
                    <tr>
                        <td><label for="apellido">Apellido</label></td>
                        <td><input type="text" id="apellido" name="apellido" required></td>
                    </tr>
                    <tr>
                        <td><label for="telefono">Telefono</label></td>
                        <td><input type="text" id="telefono" name="telefono" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" onclick="ajax_post();" value="Guardar"></td>
                        <td><a href="<?php echo constant('URL');?>alumno">Cancelar</a></td>
                    </tr>
                </table>
<!-- ----------------------------------------------- -->






    <?php require 'views/footer.php' ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js">
    </script>

   
    <!-- Funciones para llenar el formulario con los datos del alumno seleccionado -->
    <script>
  

    </script>




</body>

</html>