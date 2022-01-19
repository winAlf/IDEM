<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left info">
        <p><?php echo $nombreU ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menú de Administración</li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../../index.html"><i class="fas fa-clipboard-list"></i> Dashboard</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-users"></i>
          <span>Contacto</span>
          <span class="pull-right-container">
            <?php
                $sqlV = "SELECT COUNT(*) total FROM contacto WHERE visitado = '0'";
                $CantNew = $conn->query($sqlV);
                $numeroV = $CantNew->fetch_assoc();
                //echo 'Número de total de registros: ' . $numeroV['total'];

             ?>
            <span class="label label-primary pull-right"><?php echo $numeroV['total']; ?></span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/contacto/index.php?n=1"><i class="fas fa-user"></i> Nuevos Contactos</a></li>
          <li><a href="/admin/contacto"><i class="fas fa-user"></i> Contactos</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-chair"></i> <span>Catálogo Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/categorias/"><i class="fas fa-bed"></i> Categoría</a></li>
          <li><a href="/admin/subcategorias/"><i class="fas fa-code-branch"></i> Subcategoría</a></li>
          <li><a href="/admin/marca/"><i class="fas fa-bullseye"></i> Marcas</a></li>
          <li><a href="/admin/productos/"><i class="fas fa-couch"></i></i> Productos</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-chair"></i> <span>Servicios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/servCategorias/"><i class="fas fa-bed"></i> Categoría</a></li>
          <li><a href="/admin/servicios/"><i class="fas fa-bullseye"></i> Servicios</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-users-cog"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/usuarios"><i class="fas fa-user-check"></i> Administrar Usuarios</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-users-cog"></i> <span>Chat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/mibew/operator/login" target="_blank"><i class="fas fa-user-check"></i> Administrar Chat</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Documentación</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="documentacion/Default.htm"><i class="fa fa-book"></i> Documentación</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
