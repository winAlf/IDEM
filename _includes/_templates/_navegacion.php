    <nav class="contNav">
    <?php
          try {
            $sql = "SELECT * FROM categoria ORDER BY orden";
            $categorias = $conn->query($sql);
          } catch (Exception $e) {
            $error = $e->getMessage();
            echo $error;
          }
    ?>
        <ul class="contUlPrin">

    <?php while ($categoria = $categorias->fetch_assoc()) {
      $id = $categoria['idcategoria'];?>
      <li><a class="conCat" href="#"><i class="nivelI <?php echo $categoria['icono']; ?>"></i><?php echo $categoria['categoria']; ?></a>
            <ul class="contDosNivel">
              <?php

                    try {
                      $sql = "SELECT * FROM subcategoria WHERE sidcategoria = ".$id." ORDER BY sorden";
                      $subcategorias = $conn->query($sql);
                    } catch (Exception $e) {
                      $error = $e->getMessage();
                      echo $error;
                    }
                    while ($subcategoria = $subcategorias->fetch_assoc()) {
              ?>

              <li><a class="nivelDos" href="catalogo.php?sel=1&subCat=<?php echo $subcategoria['idsubcategoria']; ?>&cat=<?php echo $categoria['idcategoria']; ?>"><?php echo $subcategoria['subcategoria']; ?></a> </li>

            <?php } ?>
            </ul>
      </li>

      <hr class="separadorN">

    <?php } ?>

        </ul><!--contUlPrin-->
    </nav>
