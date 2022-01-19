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
       Servicios
       <small>Administración de los servicios.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de Servicios</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body col-xs-12">
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">Agregar</button>

             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Categoria</th>
                 <th>Servicios</th>
                 <th>Orden</th>
                 <th>Ícono</th>
                 <th>Activo</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>
                 <?php
                    try {
                      $sql = "SELECT idServCat, servCategoria, idServicios, servicio, servCatID, servOrden, servIco, servActivo ";
                      $sql .= "FROM servicios ";
                      $sql .= "INNER JOIN servcat ";
                      $sql .= "ON servicios.servCatID=servcat.idServCat ";
                      $sql .= "ORDER BY idServicios";
                      $servicios = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($servicio = $servicios->fetch_assoc()) { ?>
                          <tr>
                              <td><?php echo $servicio['servCategoria']; ?></td>
                              <td><?php echo $servicio['servicio']; ?></td>
                              <td><?php echo $servicio['servOrden']; ?></td>
                              <td><i class="<?php echo $servicio['servIco']; ?>"></i></td>
                              <td>
                                <?php if ($servicio['servActivo']==1): ?>
                                  <p id="contVisitado">v<i class="fas fa-check-circle"></i></p>
                                <?php else: ?>
                                  <p id="contNuevo">n<i class="fas fa-times-circle"></i></p>
                                <?php endif; ?>
                              </td>
                              <td>
                                    <a href="editar.php?id=<?php echo $servicio['idServicios'] ?>&id_cat=<?php echo $servicio['idServCat'] ?>&id_act=<?php echo $servicio['servActivo']; ?>" class="btn bg-orange btn-flat margin"><i class="fas fa-pencil-alt"></i></a>
                                    <!--<a href="" data-id="<?php echo $servicio['idServicios'] ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>-->
                              </td>
                          </tr>
                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Categoria</th>
                   <th>Servicios</th>
                   <th>Orden</th>
                   <th>Ícono</th>
                   <th>Activo</th>
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
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
       </div>


       <div class="modal-body">
         <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
           <div class="box-body">
             <?php
                 $catSel = "SELECT idServCat, servCategoria FROM servcat";
                 $categorias = $conn->query($catSel);
              ?>
             <div class="form-group">
                  <label>Categoría:</label>
                  <select name="categoria" id="categoria" class="form-control" required>
                    <option value="0">Seleccione una Categoría</option>
                    <?php  while ($categoria = $categorias->fetch_assoc()) { ?>
                        <option value="<?php echo $categoria['idServCat']; ?>"><?php echo $categoria['servCategoria']; ?></option>
                    <?php } ?>
                  </select>
                </div>
             <div class="form-group">
               <label for="nombre">Servicio:</label>
               <input type="text" name="subcategoria" class="form-control" id="subcategoria" placeholder="Captura el nombre de la subcategoría" required>
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
               <label for="nombre">Estara activo?</label>
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
           </div>
           <!-- /.box-body -->

           <div class="box-footer">
             <input type="hidden" name="registro" value="add">
             <button type="submit" class="btn btn-primary">Añadir</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           </div>
         </form>
       </div>
       <div class="modal-footer">
       </div>
     </div>
   </div>
 </div>
 <!--FIN MODAL-->

<?php include_once '../_includes/_templates/footer.php'; ?>
