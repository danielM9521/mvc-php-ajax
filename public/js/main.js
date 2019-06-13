//Almacenamos en una variable la NodeList con los botones que pertenecen a la clase btnEliminar
const botones = document.querySelectorAll('.btnEliminar');
//Recorremos la NodeList con un foreach
botones.forEach(boton => {
  //Agregamos a cada botón el evento click
  boton.addEventListener('click', function () {
  //Obtenemos el date-id asignado en la vista
    const id = this.dataset.id;
    //Guardamos en una variable la respuesta al cuadro de diálogo confirm (true o false)
    const confirm = window.confirm('¿Desea eliminar al alumno ' + id + '?');
    
if(confirm){
  //Solicitud ajax al controlador alumno
  //En este caso el callback es una funcion 
  httpRequest('http://localhost/mvc-php-ajax/alumno/delete/' + id, function () {
  //Mostramos en consola la respuesta obtenida 
    console.log(this.responseText);
    //Seleccionamos el tbody de la tabla que muestra los alumnos registrados
    const tbody = document.querySelector('#tbody-alumnos');
    //Luego seleccionamos la fila que será eliminada
    const fila = document.querySelector('#fila-' + id);
    //Removemos la fila de la tabla
tbody.removeChild(fila);
});
}
});
});

//Declaramos na función que se encargará de hacer la solicitud ajax
function httpRequest(url, callback) {
  //Nuevo objeto de la clase XMLHttpRequest
  const http = new XMLHttpRequest;
  //Ejecutamos el método open de la clase XMLHttpRequest
  http.open('GET', url);
  //Ejecutamos el método send de la clase XMLHttpRequest
  http.send();
  http.onreadystatechange = function () {
  //Validar que la respuesta recibida sea correcta
    if (this.readyState == 4 && this.status == 200) {
    //Si la respuesta es correcta ejecutamos el callback
    callback.apply(http);
  }
}
}





//Para editar
const botonesEditar = document.querySelectorAll('.btnEditar');
botonesEditar.forEach(botonEditar => {
    botonEditar.addEventListener('click',function(){
        const idEditar = this.dataset.id;
      var datos = document.getElementById('fila-' + idEditar);
      
      var id = idEditar;

      var nombre = datos[0];

        console.log(datos);
        
});
});










