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
       SubCategorias
       <small>Administración de las SubCategorias de productos.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de SubCategorias</h3>
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
                 <th>Orden</th>
                 <th>Ícono</th>
                 <th>Activo</th>
                 <th>Imagen</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                    try {
                      $sql = "SELECT idsubcategoria, sidcategoria, subcategoria, categoria, sorden, sicono, sactivo, simagen ";
                      $sql .= "FROM subcategoria ";
                      $sql .= "INNER JOIN categoria ";
                      $sql .= "ON subcategoria.sidcategoria=categoria.idcategoria ";
                      $sql .= "ORDER BY idsubcategoria";
                      $resultado = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                              <td><?php echo $admin['categoria']; ?></td>
                              <td><?php echo $admin['subcategoria']; ?></td>
                              <td><?php echo $admin['sorden']; ?></td>
                              <td><?php echo $admin['sicono']; ?></td>
                              <td>
                                <?php if ($admin['sactivo']==1): ?>
                                  <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                                <?php else: ?>
                                  <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                                <?php endif; ?>
                              </td>
                              <td><img id="imgReg" src="../../img/subcategorias/<?php echo $admin['simagen']; ?>" alt=""></td>
                              <td>
                                    <a href="editar.php?id=<?php echo $admin['idsubcategoria'] ?>&id_cat=<?php echo $admin['sidcategoria'] ?>&id_act=<?php echo $admin['sactivo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" data-id="<?php echo $admin['idsubcategoria'] ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
                              </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Categoria</th>
                   <th>Subcategoria</th>
                   <th>Descripcion</th>
                   <th>Ordenamiento</th>
                   <th>Activo</th>
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
             <?php
                 $catSel = "SELECT idcategoria, categoria FROM categoria";
                 $categorias = $conn->query($catSel);
              ?>
             <div class="form-group">
                  <label>Categoría</label>
                  <select name="categoria" id="categoria" class="form-control">
                    <option value="0">Seleccione una Categoría</option>
                    <?php  while ($categoria = $categorias->fetch_assoc()) { ?>
                        <option value="<?php echo $categoria['idcategoria']; ?>"><?php echo $categoria['categoria']; ?></option>
                    <?php } ?>
                  </select>
                </div>
             <div class="form-group">
               <label for="nombre">SubCategoria:</label>
               <input type="text" name="subcategoria" class="form-control" id="subcategoria" placeholder="Captura el nombre de la subcategoría">
             </div>
             <div class="form-group">
               <label for="usuario">Descripción:</label>
               <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Captura la descripción de la subcategoria">
             </div>
             <div class="form-group">
               <label for="nombre">Ordenamiento:</label>
               <input type="text" name="ordenamiento" class="form-control" id="ordenamiento" placeholder="">
             </div>
             <div class="form-group">
               <label for="nombre">Ícono:</label>
               <input type="text" name="icono" class="form-control" id="icono" placeholder="">
             </div>
             <div class="form-group">
               <label for="nombre">Estara activa en la pagina web?</label>
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

<?php include_once '../_includes/_templates/footer.php'; ?>
