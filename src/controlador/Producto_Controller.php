<?php

use Busesuy\Bsapp\modelo\Producto;
use Busesuy\Bsapp\libs\Controlador;





class Producto_Controller extends Controlador
{
  public function listar()
  {
    $lista = Producto::listar();
    $this->cargarVista("producto/listar", $lista);
  }
  public function nuevo()
  {
    $this->cargarVista("producto/nuevo");
  }
  public function crear()
  {
    try {
      $codigo = $_POST['codigo'];
      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $fecha = $_POST['fecha'];
      $fechaF = DateTime::createFromFormat('Y-m-d', $fecha)->format('Y-m-d');
      $producto = new Producto(null, $codigo, $descripcion, $precio, $fechaF);
      $id = $producto->crear();
      //mover el archivo
      if (isset($_FILES["img"]) && $_FILES["img"]["error"] === 0) {
        $img = $_FILES["img"];
        $imgRuta = $img["tmp_name"];
        $nombre = $img["name"];
        $arr = explode('.', $nombre);
        $ext = end($arr);
        $rutaDestino = "public/imagenes/producto/{$id}.{$ext}";  // Directorio donde se almacenarán las imágenes

        // Mueve el archivo cargado al directorio deseado
        move_uploaded_file($imgRuta, $rutaDestino);
        // echo "La imagen se ha subido exitosamente.";
      }
      $this->cargarVista("producto/crear", $id);
    } catch (\Throwable $th) {
      //throw $th;
      $this->cargarVista("producto/error");
    }
  }
}