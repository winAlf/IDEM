<?php
  include_once '../funciones/sesiones.php';
  include_once '../../_includes/_funciones/bd_conexion.php';
  include_once '../templates/header.php';
  include_once '../templates/barra.php';
  include_once '../templates/navegacion.php';

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
             <h3 class="box-title">Tabla de productos</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body col-xs-12">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Categoria</th>
                 <th>Subcategoria</th>
                 <th>Producto</th>
                 <th>Modelo</th>
                 <th>Activo</th>
                 <th>Visitas</th>
                 <th>Orden</th>
                 <th>Imagen</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                    try {
                      $sql = "SELECT id_producto, catCatNombre, catSubCatNombre, prodNombre, prodModelo, prodActivo, prodVisita, prodOrden, prodImagen ";
                      $sql .= "FROM productos ";
                      $sql .= "INNER JOIN catSubCategoria ";
                      $sql .= "ON productos.id_catSubCategoria=catSubcategoria.id_catSubCategoria ";
                      $sql .= "INNER JOIN catCategoria ";
                      $sql .= "ON productos.id_catCategoria=catcategoria.id_catCategoria ";
                      $sql .= "ORDER BY id_producto";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                              <td><?php echo $admin['catCatNombre']; ?></td>
                              <td><?php echo $admin['catSubCatNombre']; ?></td>
                              <td><?php echo $admin['prodNombre']; ?></td>
                              <td><?php echo $admin['prodModelo']; ?></td>
                              <td>
                                <?php if ($admin['prodActivo']==1): ?>
                                  <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                                <?php else: ?>
                                  <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                                <?php endif; ?>
                              </td>
                              <td><?php echo $admin['prodVisita']; ?></td>
                              <td><?php echo $admin['prodOrden']; ?></td>
                              <td>
                                <?php if ($admin['prodImagen']==null): ?>
                                      Aqui va la imagen
                                <?php else: ?>
                                      <img id="imgReg" src="../../img/productos/<?php echo $admin['prodImagen']; ?>" alt="">
                                <?php endif; ?>
                              </td>
                              <td>
                                <?php
                                      $catBuscada = $admin['catCatNombre'];
                                      $subCatBuscada = $admin['catSubCatNombre'];
                                      $findCat = "SELECT id_catCategoria FROM catCategoria WHERE catCatNombre = '$catBuscada'";
                                      $findCatS = "SELECT id_catSubCategoria FROM catSubCategoria WHERE catSubCatNombre = '$subCatBuscada'";
                                      //echo $findSubS;
                                      $filasC = $conn->query($findCat);
                                      $filaC = $filasC->fetch_assoc();
                                      $filasS = $conn->query($findCatS);
                                      $filaS =  $filasS->fetch_assoc();
                                 ?>
                                <a href="editar.php?id=<?php echo $admin['id_producto']; ?>&id_cat=<?php echo $filaC['id_catCategoria'] ?>&id_catS=<?php echo $filaS['id_catSubCategoria'] ?>&id_act=<?php echo $admin['prodActivo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" data-id="<?php echo $admin['id_producto'] ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
                          </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Categoria</th>
                   <th>Subcategoria</th>
                   <th>Producto</th>
                   <th>Modelo</th>
                   <th>Activo</th>
                   <th>Visitas</th>
                   <th>Orden</th>
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
         <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>


       <div class="modal-body">
         <form role="form" name="subirArchivo" id="subirArchivo1" method="post" action="ajax.php" enctype="multipart/form-data">
           <div class="box-body">
             <div class="form-group">
                  <label>Categoría</label>
                  <select name="id_catCategoria" id="id_catCategoria" class="form-control">
                    <option value="0">Seleccione una Categoría</option>
                          <?php
                                  $addCategorias = mysqli_query($conn, "SELECT * FROM catcategoria");
                                  while ($addCategoria = mysqli_fetch_array($addCategorias)) {
                                    echo "<option value=". $addCategoria['id_catCategoria'].">"  . $addCategoria['catCatNombre'] . "</option>";
                                  }
                           ?>
                  </select>
            </div>
            <div class="form-group">
                 <label>Subcategoria</label>
                 <select id="apartado" name="id_catSubCategoria" class="form-control">
                   <option value="0">Seleccione primero una categoría</option>
                 </select>
           </div>
             <div class="form-group">
               <label for="usuario">Nombre del Producto:</label>
               <input type="text" name="prodNombre" class="form-control" id="prodNombre" placeholder="Captura el nombre de la categoria">
             </div>
             <div class="form-group">
               <label for="nombre">Marca del Producto:</label>
               <input type="text" name="prodMarca" class="form-control" id="prodMarca" placeholder="Captura la descripcion de la categoria">
             </div>

             <div class="form-group">
               <label for="usuario">Modelo:</label>
               <input type="text" name="prodModelo" class="form-control" id="prodModelo" placeholder="Captura el nombre de la categoria">
             </div>

             <div class="form-group">
               <label for="nombre">Hay existencia del producto y está activo?</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="prodActivo" id="activado1" value="1" checked="">Activado
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="prodActivo" id="activado2" value="0">Desactivado
                  </div>
                </div>


             <div class="form-group">
               <label for="usuario">Descripcion:</label>
               <input type="text" name="prodDesc" class="form-control" id="prodDesc" placeholder="Captura el nombre de la categoria">
             </div>
             <div class="form-group">
               <input type="hidden" value="1" name="prodVisita" id="prodVisita">
             </div>
             <div class="form-group">
               <label for="usuario">Orden:</label>
               <input type="text" name="prodOrden" class="form-control" id="prodOrden" placeholder="Captura el nombre de la categoria">
             </div>
             <div class="form-group">
                 <label for="imagen_subcategoria">Selecciona Imagen:</label>
                 <input type="file" id="imagen_subcategoria" name="archivo_imagen">

                 <p class="help-block">La imagen debe ser del siguiente tamaño: .</p>
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

  <?php

    include_once '../templates/footer.php';

  ?>
