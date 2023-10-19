 <table>
   <tr>
     <th>Id</th>
     <th>codigo</th>
     <th>descripcion</th>
     <th>precio</th>
     <th>fecha</th>
   </tr>
   <?php foreach ($this->datos as $producto) { ?>
     <tr>
       <td><?= $producto->getId(); ?></td>
       <td><?= $producto->getCodigo(); ?></td>
       <td><?= $producto->getDescripcion(); ?></td>
       <td><?= $producto->getPrecio(); ?></td>
       <td><?= $producto->getFecha(); ?></td>
     </tr>
   <?php }; ?>
 </table>