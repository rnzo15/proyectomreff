<?php

use Busesuy\Bsapp\modelo\Producto;
use Busesuy\Bsapp\libs\Controlador;




class Php_Producto_Controller extends Controlador
{
  public function listar()
  {
    try {
      //$datos = file_get_contents("php://input");
      //$json = json_decode($datos);
      $user = $_POST['user'] ?? "defecto";
      $pwd = $_POST['pwd'] ?? "defecto";
      $lista = Producto::listar();
      $res = new stdClass();
      $res->codigo = 200;
      $res->res = [
        'lista' => $lista,
        'usuario' => $user,
        'pwd' => $pwd,
        'total' => count($lista),

      ];
      $this->cargarVista("php/producto", $res);
    } catch (\Throwable $th) {
      //throw $th;

    }
    //$this->cargarVista("producto/listar", $lista);
  }
}