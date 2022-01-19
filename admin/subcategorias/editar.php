<?php
include_once '../_includes/_funciones/sesiones.php';
include_once '../../_includes/_funciones/bd_conexion.php';
  $id = $_GET['id'];
  $id_cat = $_GET['id_cat'];
  //$id_catS = $_GET['id_cats'];
  $id_act = $_GET['id_act'];

  switch ($id_act) {
    case '1':
      $activo="checked";
      $inactivo="";
      break;
    default:
      $activo="";
      $inactivo="checked";
      break;
  }

  /*
  echo "<pre>";
    var_dump($_GET);
  echo "</pre>";
  */

  if(!filter_var($id,FILTER_VALIDATE_INT)){
    die("Error!");
  }

  include_once '../_includes/_templates/header.php';
  include_once '../_includes/_templates/barra.php';
  include_once '../_includes/_templates/navegacion.php';

  $sql = "SELECT * FROM `subcategoria` WHERE idsubcategoria = $id";
  $resultado = $conn->query($sql);
  $row = $resultado->fetch_assoc();

/*
  echo "<pre>";
    var_dump($row);
  echo "</pre>";
*/
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Editar Categría
       <small>Realiza los cambios necesarios en el formulario.</small>
     </h1>
   </section>




   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Formulario de edición de categoria</h3>
       </div>
       <div class="box-body">
         <div class="col-md-8">
           <form role="form" name="subirArchivo" id="subirArchivo" method="post" action="ajax.php" enctype="multipart/form-data">
             <div class="box-body">
               <?php
               $catSel = "SELECT idcategoria, categoria FROM categoria";
               $categorias = $conn->query($catSel);
                ?>
               <div class="form-group">
                    <label>Categoría</label>
                    <select name="categoria" id="categoria" class="form-control">
                      <?php  while ($categoria = $categorias->fetch_assoc()) { ?>
                          <?php if ($categoria['idcategoria'] == $id_cat): ?>
                              <option selected value="<?php echo $categoria['idcategoria']; ?>"><?php echo $categoria['categoria']; ?></option>
                          <?php else: ?>
                              <option value="<?php echo $categoria['idcategoria']; ?>"><?php echo $categoria['categoria']; ?></option>
                          <?php endif; ?>
                      <?php } ?>
                    </select>
                  </div>
               <div class="form-group">
                 <label for="nombre">SubCategoria:</label>
                 <input type="text" name="subcategoria" class="form-control" id="subcategoria" value="<?php echo $row['subcategoria']; ?>" placeholder="Captura el nombre de la subcategoría">
               </div>
               <div class="form-group">
                 <label for="usuario">Descripción:</label>
                 <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $row['sdescripcion']; ?>" placeholder="Captura la descripción de la subcategoria">
               </div>
               <div class="form-group">
                 <label for="nombre">Ordenamiento:</label>
                 <input type="text" name="ordenamiento" class="form-control" id="ordenamiento" value="<?php echo $row['sorden']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="nombre">Ícono:</label>
                 <input type="text" name="icono" class="form-control" id="icono" value="<?php echo $row['sicono']; ?>" placeholder="">
               </div>
               <div class="form-group">
                 <label for="nombre">Estará activa en la pagina web?</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="activado" id="activado1" value="1" <?php echo $activo ?>>Activado
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="activado" id="activado2" value="0" <?php echo $inactivo ?>>Desactivado
                    </div>
                  </div>

             </div>
             <!-- /.box-body -->

             <div class="box-footer">
               <input type="hidden" name="registro" value="edit">
               <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
               <button type="submit" class="btn btn-primary">Actualizar</button>
               <a href="index.php" class="btnBack">Cancelar</a>
               <a href="" data-id="<?php echo $id ?>" class="btn btn-danger btn-flat margin borrar_registro"><i class="fas fa-trash-alt"></i></i></a>
             </div>
           </form>

         </div>

       </div>
       <!-- /.box-body -->

       <!-- /.box-footer-->
     </div>
     <!-- /.box -->

     <div class="box-footer">
       Footer
     </div>

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

<?php include_once '../_includes/_templates/footer.php'; ?>
