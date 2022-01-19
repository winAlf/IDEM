<?php
include_once '../_includes/_funciones/sesiones.php';
include_once '../../_includes/_funciones/bd_conexion.php';
include_once '../_includes/_templates/header.php';
include_once '../_includes/_templates/barra.php';
include_once '../_includes/_templates/navegacion.php';
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Productos
       <small>Administración de los productos.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de Productos</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body col-xs-12">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Categoria/subcategoria</th>
                 <th>Activo</th>
                 <th>Producto</th>
                 <th>Marca</th>
                 <th>Modelo</th>
                 <th>Visitas</th>
                 <th>orden</th>
                 <th>Imagen</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                    try {
                      $sql = "SELECT idproducto, pidcategoria, pidsubcategoria, categoria, subcategoria, producto, marca, modelo, pactivo, visitas, porden ";
                      $sql .= "FROM producto ";
                      $sql .= "INNER JOIN categoria ";
                      $sql .= "ON producto.pidcategoria=categoria.idcategoria ";
                      $sql .= "INNER JOIN subcategoria ";
                      $sql .= "ON producto.pidsubcategoria=subcategoria.idsubcategoria ";
                      $sql .= "ORDER BY idproducto";
                      $productos = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($producto = $productos->fetch_assoc()) { ?>
                          <tr>
                              <td><?php echo $producto['categoria']; ?><br><?php echo $producto['subcategoria']; ?></td>
                              <td>
                                <?php if ($producto['pactivo']==1): ?>
                                  <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                                <?php else: ?>
                                  <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                                <?php endif; ?>
                              </td>
                              <td><?php echo $producto['producto']; ?></td>
                              <td>
                                <?php
                                      $sql5 = "SELECT marca_imagen FROM marcas WHERE idmarca = ".$producto['marca'];
                                      $mImagenes = $conn->query($sql5);
                                      $mImagen = $mImagenes->fetch_assoc();
                                ?>
                                    <img id="imgMar" src="../../img/marcas/<?php echo $mImagen['marca_imagen']; ?>" alt="">
                              </td>
                              <td><?php echo $producto['modelo']; ?></td>
                              <td><?php echo $producto['visitas']; ?></td>
                              <td><?php echo $producto['porden']; ?></td>
                              <td class="tableImg">
                                <?php
                                    $sqlImg = "SELECT Imagen FROM prod_imagenes WHERE iidproducto = ".$producto['idproducto']." AND icono = 1";
                                    $imagenes = $conn->query($sqlImg);
                                    $imagen = $imagenes->fetch_assoc();
                                 ?>
                                    <img id="imgReg" src="../../img/productos/<?php echo $imagen['Imagen']; ?>" alt="">
                              </td>
                              <td>
                                    <a href="editar.php?id=<?php echo $producto['idproducto'] ?>&id_cat=<?php echo $producto['pidcategoria'] ?>&id_Scat=<?php echo $producto['pidsubcategoria']; ?>&id_act=<?php echo $producto['pactivo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" data-id="<?php echo $producto['idproducto'] ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
                              </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Categoria/subcategoria</th>
                   <th>Activo</th>
                   <th>Producto</th>
                   <th>Marca</th>
                   <th>Modelo</th>
                   <th>Visitas</th>
                   <th>orden</th>
                   <th>Imagen</th>
                   <th>Acciones</th>
                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->


 </div>
 <!-- /.content-wrapper -->

 <!-- Modal -->
 <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Agregar SubCategoria</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>


       <div class="modal-body">
         <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
           <div class="box-body">
             <div class="box-body">

               <div class="form-group">
                    <label>Categoría</label>
                    <select name="id_categoria" id="id_catCategoria" class="form-control">
                      <option value="0">Seleccione una Categoría</option>
                            <?php
                                    $addCategorias = mysqli_query($conn, "SELECT * FROM categoria");
                                    while ($addCategoria = mysqli_fetch_array($addCategorias)) {
                                      echo "<option value=". $addCategoria['idcategoria'].">"  . $addCategoria['categoria'] . "</option>";
                                    }
                             ?>
                    </select>
              </div>
              <div class="form-group">
                   <label>Subcategoria</label>
                   <select id="apartado" name="id_subcategoria" class="form-control">
                     <option value="0">Seleccione primero una categoría</option>
                   </select>
             </div>

             <div class="form-group">
               <label for="nombre">Producto:</label>
               <input type="text" name="producto" class="form-control" id="producto" placeholder="Captura el nombre del producto">
             </div>
             <div class="form-group">
               <label for="usuario">Marca:</label>
               <select class="form-control" name="marca" id="marca">
                 <option value="0">Seleccione una marca</option>
                       <?php
                               $addMarcas = mysqli_query($conn, "SELECT * FROM marcas ORDER BY marca_nombre ASC");
                               while ($addMarca = mysqli_fetch_array($addMarcas)) {
                                 echo "<option value=". $addMarca['idmarca'].">"  . $addMarca['marca_nombre'] . "</option>";
                               }
                        ?>
               </select>
             </div>
             <div class="form-group">
               <label for="usuario">Modelo:</label>
               <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Captura el modelo del producto">
             </div>
             <div class="form-group">
               <label for="usuario">Modelo Desc:</label>
               <input type="text" name="modeloDesc" class="form-control" id="modeloDesc" placeholder="Captura el modelo del producto">
             </div>
             <div class="form-group">
               <label for="nombre">Estara activo en la pagina web?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="activado" id="activado1" value="1" checked="">Activado
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="activado" id="activado2" value="0">Desactivado
                  </div>
              </div>
             <div class="form-group">
               <label for="usuario">Descripción:</label>
               <textarea name="descripcion" class="form-control" id="descripcion" rows="6" placeholder="Capture la descripción de la categoria"></textarea>
             </div>
             <div class="form-group">
               <label for="nombre">Ordenamiento:</label>
               <input type="text" name="ordenamiento" class="form-control" id="ordenamiento" placeholder="">
             </div>
             <div class="form-group">
               <label for="nombre">precio:</label>
               <input type="text" name="precio" class="form-control" id="precio" placeholder="">
             </div>
              <div class="form-group">
                  <label for="archivo_sheet">Selecciona Archivo Datasheet:</label>
                  <input type="file" id="archivo_sheet" name="archivo_datasheet">

                  <p class="help-block">El archivo debe estar en formato PDF.</p>
              </div>
              <div class="form-group">
                  <label for="archivo_instructivo">Selecciona Archivo Intructivo:</label>
                  <input type="file" id="archivo_instructivo" name="archivo_instructivo">

                  <p class="help-block">El archivo debe estar en formato PDF.</p>
              </div>
           </div>
           <!-- /.box-body -->

           <div class="box-footer">
             <input type="hidden" name="registro" value="add">
             <button type="submit" class="btn btn-primary">Añadir</button>
           </div>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       </div>
     </div>
   </div>
 </div>
 <!--FIN MODAL-->

<?php include_once '../_includes/_templates/footer.php'; ?>
