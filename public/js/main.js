const botones = document.querySelectorAll('.btnEliminar');
var idP;
botones.forEach(boton => {
boton.addEventListener('click',function(){
const id = this.dataset.id;
const confirm = window.confirm('¿Desea eliminar al alumno '+ id + '?');
if(confirm){
  //Solicitud ajax
httpRequest('http://localhost/mvc_php/alumno/delete/'+id, function(){
console.log(this.responseText);
const tbody = document.querySelector('#tbody-alumnos');
const fila = document.querySelector('#fila-'+id);
tbody.removeChild(fila);
});
}
});
});

function httpRequest(url, callback){
  const http = new XMLHttpRequest;
  http.open('GET', url);
  http.send();
http.onreadystatechange = function(){
  if(this.readyState == 4 && this.status == 200){
callback.apply(http);
  }
}
}





}



