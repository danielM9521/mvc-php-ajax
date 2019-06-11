<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'?>
    <div id="main">
        <h4>Listado de Alumno</h4><br>
        <a href="<?php echo constant('URL');?>alumno/nuevo">Nuevo Alumno</a><br><br>
        <div>
            <table border="1">
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
                            foreach($this->alumnos as $item){
                                $alumno=new Alumnos();
                                $alumno=$item;
                        ?>
                        <tr id="fila-<?php echo $alumno->id;?>">
                                <td><?php echo $alumno->id;?></td>
                                <td><?php echo $alumno->nombre;?></td>
                                <td><?php echo $alumno->apellido;?></td>
                                <td><?php echo $alumno->telefono;?></td>

                                <td>
                                    <a href="<?php echo constant('URL').'alumno/getById/'.$alumno->id;?>" title="Editar">Editar</a>
                                    <td><button class="btnEliminar" data-id="<?php echo $alumno->id;?>">Eliminar</button> </td>
                                    <!-- <a href="<?php echo constant('URL').'alumno/delete/'.$alumno->id;?>" title="¿Desea eliminar este registro?">Eliminar</a> -->
                                </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
    <?php require 'views/footer.php'?>
    <script src="<?php echo constant('URL');?>public/js/main.js">

    </script>
</body>
</html>
