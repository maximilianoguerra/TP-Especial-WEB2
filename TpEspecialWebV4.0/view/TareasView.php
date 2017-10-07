<?php
class TareasView extends View
{
  function mostrarTareas($producto,$marca){
    $this->smarty->assign('productos', $producto);
    $this->smarty->assign('marcas', $marca);
    $this->smarty->display('templates/index.tpl');
  }

  function mostrarTabla($producto,$marca){
    $this->smarty->assign('productos', $producto);
    $this->smarty->assign('marcas', $marca);
    $this->smarty->display('templates/navTabla.tpl');
  }

  function mostrarCrearTareas(){
    $this->assignarTareaForm();
    $this->smarty->display('templates/formCrear.tpl');
  }

  function errorCrear($error, $titulo, $descripcion, $completada){
    $this->assignarTareaForm($titulo, $descripcion, $completada);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrear.tpl');
  }

  private function assignarTareaForm($titulo='', $descripcion='', $completada=0){
    $this->smarty->assign('titulo', $titulo);
    $this->smarty->assign('descripcion', $descripcion);
    $this->smarty->assign('completada', $completada);
  }

}

 ?>