<?php
    class Alumno extends Controller{
        //metodo constructor
        function __construct(){
            parent::__construct();
            $this->view->alumnos=[];
            //$this->view->alumno="";
        }
        //metodo que muestra la interfaz inicial a la llamada del controlador
        function index(){
            $alumnos=$this->model->get();
            $this->view->alumnos=$alumnos;
            $this->view->render('alumno/index');
        }

        //metodo para nuevo registro
        function nuevo(){
            $this->view->render('alumno/nuevo');
        }

        //metodo que ingresara el registro
        function insert(){
           //Declarar variables para recibir los datos del formuario nuevo
           $nombre=$_POST['nombre'];
           $apellido=$_POST['apellido'];
           $telefono=$_POST['telefono'];

           $this->model->insert(['nombre'=>$nombre,'apellido'=>$apellido,'telefono'=>$telefono]);
           $this->index();
        }


        //metodo eliminar
        function delete($dato=null){
            $id=$dato[0];
            $this->model->delete($id);
            //$this->index();
            echo 'Se eliminó: '.$id;
        }

        //metodo para obtener un registro
        function getById($dato=null){
            $id=$dato[0];
            $alumno=$this->model->getById($id);

            session_start();
            $_SESSION['id_Alumno']=$alumno->id;

            //renderizando la vista de detalles
            $this->view->alumno=$alumno;
            $this->view->render('alumno/detalle');
        }

        //Metodo update
        function update(){
            session_start();
            $id=$_SESSION['id_Alumno'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $telefono=$_POST['telefono'];

            //Destruir la sesion
            unset($_SESSION['id_Alumno']);
            $this->model->update(['id'=>$id,'nombre'=>$nombre,'apellido'=>$apellido,'telefono'=>$telefono]);
            /*if(){
                $alumno=new Alumnos();

                $alumno->id=$id;
                $alumno->nombre=$nombre;
                $alumno->apellido=$apellido;
                $alumno->telefono=$telefono;
                $this->view->alumno=$alumno;
                $this->index();
            }else{
                $this->view->render('errores/index');
            }*/
            $this->index();
        }

    }
?>
