<div class="asideContPrinNav">
    <br>
    <h1>Catálogo de Productos</h1>
    <br>

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

</div><!--asideContPrinNav-->

<div class="asideContPrinZt">
      <img src="/img/ZKTecoLogo.png" alt="">
      <p>Distribuidor Autorizado</p>
      <a href="zteco.php">saber más...</a>
</div><!--asideContPrinSat-->

<div class="asideContPrinSat">
      <img src="/img/satisfaccion.png" alt="">
      <p>Los productos mas avanzados del mercado y nuestros servicios realizados por técnicos certificados te garantizan el 100% de satisfacción.</p>
</div><!--asideContPrinSat-->

<div class="asideContPrinCont">
      <h1>NECESITAS AYUDA CON TU COMPRA?</h1>
      <div class="btnMibew">
        <!-- mibew button --><a id="mibew-agent-button" href="/mibew/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['5d0031d0ccc53a90'].open();return false;"><img src="/mibew/b?i=mblue&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/mibew/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"5d0031d0ccc53a90","url":"\/mibew\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/mibew\/chat\/style\/popup"});</script><!-- / mibew button -->
      </div>
</div><!--asideContPrinCont-->
