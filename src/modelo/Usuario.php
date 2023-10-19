<?php

namespace Busesuy\Bsapp\modelo;


use PDOException;
use JsonSerializable;
use Busesuy\Bsapp\libs\Conexion;

class Usuario implements JsonSerializable
{


  private $iduser;
  private $email;
  private $direccion;

  public function __construct($iduser, $email, $direccion)
  {
    $this->iduser = $iduser;
    $this->email = $email;
    $this->direccion = $direccion;
  }

  private static function arrayAProducto($item)
  {
    $producto             = new Usuario(
      $item['iduser'],
      $item['email'],
      $item['direccion']
    );
    return $producto;
  }

  public static function listar()
  {
    $pdo = null;
    $query = null;
    $items = [];
    $pdo = Conexion::getConexion()->getPdo();
    try {
      $sql = 'SELECT  iduser, email, direccion FROM usuarios;';
      $query      = $pdo->query($sql);
      while ($row = $query->fetch()) {
        $item = self::arrayAProducto($row);
        $items[] =   $item;
        //$item->url = isset($row['url']) ? $row['url'] : $urlDefecto;
      }
      return $items;
    } catch (PDOException $th) {
      //throw $th;
    } finally {
      $pdo = null;
    }
  }

  public function crear()
  {
    $pdo = null;
    $query = null;
    $pdo = Conexion::getConexion()->getPdo();
    $id = -1;
    try {
      $query      = $pdo->prepare('INSERT INTO productos 
      (codigo,
      descripcion,
      precio,
      fecha)
VALUES(:codigo,:descripcion,:precio,:fecha
)');

      if ($query->execute()) {
        $id = $pdo->lastInsertId();
      }
      return $id;
    } catch (PDOException $th) {
      throw $th;
    } finally {
      $pdo = null;
    }
  }



  public function JsonSerialize()
  {
    return [
      'id' => $this->iduser,
      'email' => $this->email,
      'direccion' => $this->direccion
    ];
  }
}
