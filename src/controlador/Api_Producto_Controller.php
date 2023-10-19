<?php

use Busesuy\Bsapp\modelo\Producto;
use Busesuy\Bsapp\libs\Controlador;



class Api_Producto_Controller extends Controlador
{

  //echo "con index m index ";
  public function crear()
  {
    $res = new stdClass();
    $res->codigo = 200;
    $res->respuesta = [];
    try {
      $datos = file_get_contents("php://input");
      $json = json_decode($datos);
      $codigo = $json->codigo;
      $descripcion = $json->descripcion;
      $precio = $json->precio;
      $fecha = $json->fecha;
      $fechaF = DateTime::createFromFormat('Y-m-d', $fecha)->format('Y-m-d');
      //$producto = new Producto(null, $codigo, $descripcion, $precio, $fechaF);
      //creo un nuevo producto
      //$id = intval($producto->crear());
      $res = new stdClass();
      $res->codigo = 201;
      /*$res->respuesta = [
        'id' => $id
      ];*/
      $this->cargarVista('api/index', $res);
    } catch (\Throwable $th) {
      //throw $th;
      $res->codigo = 500;
      $this->cargarVista('api/index', $res);
    }
    //$this->cargarVista("producto/listar", $lista);
  }
  public function listar()
  {
    try {
      $datos = file_get_contents("php://input");
      $json = json_decode($datos);
      $lista = Producto::listar();
      $res = new stdClass();
      $res->codigo = 200;
      $res->respuesta = [
        'lista' => $lista,
        'total' => count($lista)
      ];
      $this->cargarVista('api/index', $res);
    } catch (\Throwable $th) {
      //throw $th;

    }

    //$this->cargarVista("producto/listar", $lista);
  }
}