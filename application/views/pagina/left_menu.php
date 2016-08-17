<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="">
               <a href="#">
                   <i class="fa fa-user"></i> <b>Andrea Morales / ADMIN</b>
               </a>
            </li>
            <li class="header">MENÚ DE NAVEGACIÓN 2</li>
            <li class="<?php echo $menu_activo == "Dashboard" ? "active" : ""; ?>">
                <a href="#">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
			<!--<li class="<?php echo $menu_activo == "Nuevo Cliente" ? "active" : ""; ?>">
                <a href="cliente">
                    <i class="fa fa-user"></i>
                    <span>Nuevo cliente</span>
                </a>
            </li>-->
			<li class="<?php echo $menu_activo == "Clientes" ? "active" : ""; ?>">
                <a href="gestion_clientes">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="<?php echo $menu_activo == "Planes" ? "active" : ""; ?>">
                <a href="ver_planes">
                    <i class="fa fa-files-o"></i>
                    <span>Planes</span>
                </a>
            </li>
            <li class="<?php echo $menu_activo == "Asignar" ? "active" : ""; ?>">
                <a href="asignar_plan">
                    <i class="fa fa-arrow-down"></i> <span>Asignar</span>
                </a>
            </li>
            <li class="<?php echo $menu_activo == "Agenda" ? "active" : ""; ?>">
                <a href="ver_agenda">
                    <i class="fa fa-calendar"></i> <span>Agenda</span>
                </a>
            </li>
            <li class="treeview <?php echo $menu_activo == "Reportes" ? "active" : ""; ?>">
               <a href="#">
                   <i class="fa fa-calendar"></i> <span>Reportes</span>
                   <i class="fa fa-angle-left pull-right"></i>
               </a>
                 <ul class="treeview-menu">
                   <li><a href="nueva_agenda"><i class="fa fa-circle-o"></i> Consultar Citas por Cliente </a></li>
                 </ul>
           </li>
             <li class="<?php echo $menu_activo == "Nueva Agenda" ? "active" : ""; ?>">
                <a href="nueva_agenda">
                    <i class="fa fa-calendar"></i> <span>Nueva Agenda</span>
                </a>
            </li>
            <li>
               <a href="#">
                  <i class="fa fa-key" aria-hidden="true"></i> <span>Cambiar contraseña</span>
               </a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
               <a href="#">
                  <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Cerrar sesión</span>
               </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
