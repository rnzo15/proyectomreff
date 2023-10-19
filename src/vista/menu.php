<nav>
  <?php require_once 'traduccion/Translate.php';

  use \SimpleTranslation\Translate; ?>
  <a href="index.php"><?= Translate::__('home'); ?></a>
  <a href="index.php?c=persona&m=listar">Listar Personas</a>
  <a href="index.php?c=producto&m=listar">Listar Productos</a>
  <a href="index.php?c=producto&m=nuevo">Nuevo producto</a>
</nav>