<?php
include_once('model/ProductosModel.php');
include_once('model/MarcasModel.php');
include_once('view/ProductosView.php');

class MarcasController extends SecuredController
{


  function __construct()
  {
    parent::__construct();
    $this->view = new ProductosView();
    $this->model = new ProductosModel();//nueva linea
    $this->marcasModel = new MarcasModel();
    
  }

  public function index()
  {
    $marcas = $this->model->getMarcas();
    $this->view->mostrarMarcas($marcas);
  }

   public function agregarMarca(){
      $this->admin();
       if (isset($_POST['marca']) && !empty($_POST['marca'])){
          $marca=$_POST['marca'];
          $this->marcasModel->addmarca($marca);
          header("location:comparativa");
        }else{
          $this->view->errorCrear("Campo incompleto");
          header("location:comparativa");
          }
      
    }
   /*FUNCION Q BORRA MARCA*/
     public function destroyMarca(){
          $this->admin();
           $id = $_POST['id_marca'];
           $this->marcasModel->deleteMarca($id);
            header("location:comparativa");
        
     }
   /*FUNCION QUE INICIA LA EDICION DE UNA MARCA*/
   public function comienzoEditMarca()
   {
          $this->admin();
         $id=$_POST['id_marca'];
         $marcas=$this->marcasModel->getMarca($id);
         $this->view->mostrarEditMarca($marcas);
    
   }
   /*FUNCION Q NOS MUETRA YA LA EDICION REALIZADA*/
   public function editarMarca()
   {
          $this->admin();
         $id=$_POST['id_marca'];
         $nombre=$_POST['nombre'];
         $this->marcasModel->editMarca($id,$nombre);
          header("location:comparativa");
    
   }


}

 ?>
