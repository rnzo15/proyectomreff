<?php

namespace Busesuy\Bsapp\libs;


//require_once 'traduccion/Translate.php';

//use \SimpleTranslation\Translate;

//require_once 'config/config.php';

/*manejo de ccookies */
//var_dump(constant('URL'));

//$idioma = $_COOKIE['idioma'] ?? "es";
//Translate::init($idioma, "lang/" . $idioma . ".php");



class Controlador
{
  public $datos;
  public function __construct()
  {
  }

  function cargarVista($vistaRuta, $datos = null, $ext = "php")
  {
    $this->datos = $datos;
    $ruta = "src/vista/{$vistaRuta}.{$ext}";
    require_once $ruta;
  }
}