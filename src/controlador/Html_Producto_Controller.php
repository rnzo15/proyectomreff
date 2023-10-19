<?php

use Busesuy\Bsapp\modelo\Producto;
use Busesuy\Bsapp\libs\Controlador;




class Html_Producto_Controller extends Controlador
{
  public function listar()
  {
    try {
      $lista = Producto::listar();
      $this->cargarVista("html/producto/listar", $lista);
    } catch (\Throwable $th) {
      //throw $th;

    }
    //$this->cargarVista("producto/listar", $lista);
  }
}
