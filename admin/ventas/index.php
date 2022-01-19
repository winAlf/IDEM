<?php
  include_once '../_includes/_funciones/sesiones.php';
  include_once '../../_includes/_funciones/bd_conexion.php';
  include_once '../_includes/_templates/header.php';
  include_once '../_includes/_templates/barra.php';
  include_once '../_includes/_templates/navegacion.php';

  if ($_GET['n'] == "1") {
    $condicion = " AND v.visto=0";
  }else{
    $condicion = "";
  }

 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Ventas
       <small>muestra la información enviada por el cliente solicitando información de un producto.</small>
     </h1>
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-xs-12">

         <div class="box">
           <div class="box-header">
             <h3 class="box-title">Tabla de Ventas</h3>
           </div>

           <!-- /.box-header -->
           <div class="box-body col-xs-12">


             <table id="registros" class="table table-bordered table-striped">
               <thead>
               <tr>
                 <th>Visitado</th>
                 <th>producto</th>
                 <th>Imagen</th>
                 <th>Nombre</th>
                 <th>Telefono</th>
                 <th>email</th>
                 <th>Fecha</th>
                 <th>Cotización</th>
                 <th>Acciones</th>
               </tr>
               </thead>
               <tbody>

                 <?php
                    try {
                      $sql = "SELECT v.id_venta, v.ventaNombre, v.ventatelefono, v.ventaTelefono, v.ventaNota, v.status, v.visto, v.id_Prod, v.ventaCoti, v.fecha, v.email, ";
                      $sql .= "p.producto, p.modelo, ";
                      $sql .= "c.categoria, s.subcategoria, m.marca_nombre, i.Imagen, i.principal ";
                      $sql .= "FROM ventasdb v, producto p, categoria c, subcategoria s, marcas m, prod_imagenes i ";
                      $sql .= "WHERE v.id_Prod = p.idproducto AND p.pidcategoria = c.idcategoria AND p.pidsubcategoria = s.idsubcategoria AND p.marca = m.idmarca AND p.idproducto = i.iidproducto AND i.principal = 1";
                      $sql = $sql . $condicion;
                      $resultado = $conn->query($sql);
                      //echo $sql;
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($admin = $resultado->fetch_assoc()) { ?>
                          <tr>
                              <td>
                                  <?php if ($admin['visto'] == 0): ?>
                                    <p id="contNuevo">v<i class="fas fa-eye-slash"></i></p>
                                  <?php else: ?>
                                    <p id="contVisitado">n<i class="fas fa-eye"></i></p>
                                  <?php endif; ?>
                              </td>
                              <td>
                                <?php echo $admin['categoria']; ?><br>
                                <?php echo $admin['subcategoria']; ?><br>
                                <?php echo $admin['producto']; ?><br>
                                <?php echo $admin['marca_nombre']; ?><br>
                                <?php echo $admin['modelo']; ?><br>
                              </td>
                              <td>
                                <img id="imgReg" src="../../img/productos/<?php echo $admin['Imagen']; ?>" alt="">
                              </td>
                              <td><?php echo $admin['ventaNombre']; ?></td>
                              <td><?php echo $admin['ventaTelefono']; ?></td>
                              <td><?php echo $admin['email']; ?></td>
                              <td><?php echo $admin['fecha']; ?></td>
                              <td>archivo pdf</td>
                              <td>
                                <!-- Button trigger modal -->
                                <button type="button" data-id="<?php echo $admin['id_venta'] ?>" data-visita="<?php echo $admin['visto'] ?>" class="btn btn-success contacto_visitado" data-toggle="modal" data-target="#ModalAdd<?php echo $admin['id_venta']; ?>"><i class="fas fa-glasses"></i></button>
                                <button type="button" data-id="<?php echo $admin['id_venta'] ?>" data-visita="<?php echo $admin['visto'] ?>" class="btn btn-warning contacto_visitado" data-toggle="modal" data-target="#ModalAdd<?php echo $admin['id_venta']; ?>"><i class="fas fa-file-upload"></i></button>
                              </td>
                          </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="ModalAdd<?php echo $admin['id_venta']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Datos de Contacto</h5>
                                </div>

                                <div class="modal-body">
                                  <form role="form" name="crearRegistro" id="crearRegistro" method="post" action="ajax.php">
                                    <div class="box-body">
                                      <p>Este usuario esta interesado en el producto marca: <?php echo $admin['marca_nombre']; ?><br>modelo: <?php echo $admin['modelo']; ?></p>
                                      <div class="form-group">
                                        <label for="usuario">Nombre:</label>
                                        <p><?php echo $admin['ventaNombre']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="nombre">Telefono:</label>
                                        <p><?php echo $admin['ventaTelefono']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Email:</label>
                                        <p><?php echo $admin['email']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Interes:</label>
                                        <p><?php echo $admin['ventaNota']; ?></p>
                                      </div>
                                      <div class="form-group">
                                        <label for="password">Fecha:</label>
                                        <p><?php echo $admin['fecha']; ?></p>
                                      </div>
                                    </div>
                                    <!-- /.box-body - ->

                                    <div class="box-footer">
                                      <input type="hidden" name="registro" value="add">
                                      <button type="submit" class="btn btn-primary">Añadir</button>
                                    </div>-->
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--FIN MODAL-->


                    <?php } ?>

               </tbody>
               <tfoot>
                 <tr>
                   <th>Visitado</th>
                   <th>producto</th>
                   <th>Imagen</th>
                   <th>Nombre</th>
                   <th>Telefono</th>
                   <th>email</th>
                   <th>Fecha</th>
                   <th>Cotización</th>
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



  <?php

    include_once '../_includes/_templates/footer.php';

  ?>
