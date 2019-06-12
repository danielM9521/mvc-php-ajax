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
        <!---FORMULARIO-->
        <div>
            <!-- <form name="frmDetalle" action="<?php echo constant('URL');?>update.php" method="post"> -->
            <!-- <input type="hidden" name="id_alumno" require value="<?php echo $this->alumno->id?>"> -->
                <table>
                    <tr>
                        <td><label for="nombre">Nombre</label></td>
                        <td><input type="text" id="nombre" name="nombre" require value="<?php echo $this->alumno->nombre?>"></td>
                    </tr>
                    <tr>
                        <td><label for="apellido">Apellido</label></td>
                        <td><input type="text" id="apellido" name="apellido" require value="<?php echo $this->alumno->apellido?>"></td>
                    </tr>
                    <tr>
                        <td><label for="telefono">Telefono</label></td>
                        <td><input type="text" name="telefono" require value="<?php echo $this->alumno->telefono?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" onclick="ajax_post();" value="Guardar"></td>
                        <td><a href="<?php echo constant('URL');?>alumno">Cancelar</a></td>
                    </tr>
                </table>
            <!-- </form> -->
            <div id="status"></div>
        </div>
    </div>
    <?php require 'views/footer.php'?>


    <script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "<?php echo constant('URL');?>update.php";
    var nom = document.getElementById("nombre").value;
    var ape = document.getElementById("apellido").value;
    var vars = "nom="+nom+"&ape="+ape;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("status").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
</script>


</body>
</html>