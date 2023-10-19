<?php


use Busesuy\Bsapp\libs\Controlador;
use Busesuy\Bsapp\modelo\Usuario;

class Test_Controller extends Controlador
{
  public function listar()
  {
    try {
      //$datos = file_get_contents("php://input");
      //$json = json_decode($datos);
      $user = $_POST['nombre'] ?? "defecto";
      $pwd = $_POST['pwd'] ?? "defecto";
      $lista = Usuario::listar();
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