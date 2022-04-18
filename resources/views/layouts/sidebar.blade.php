<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="background-color:#466587">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                <a class="nav-link" href="{{ route('home') }}" style="color:white;">
                    <i class='fas fa-home'></i>
                    <div class="sb-nav-link-icon"></div>
                    <FONT COLOR="white">
                    Inicio
                    </FONT>
                </a>
                <!--<div class="sb-sidenav-menu-heading">Panel de Control</div>-->
                <a class="nav-link" href="{{ route('home') }}" style="color:white;">
                    <i class='fas fa-digital-tachograph'></i>
                    <div class="sb-nav-link-icon"></i></div>
                    <FONT COLOR="white">
                    Panel de Control
                    </FONT>
                </a>

                <!--<div class="sb-sidenav-menu-heading">Modulos</div>-->
                <!-- Modulo de empleados -->
                <a class="nav-link" href="{{route('productos.index')}}"  style="color:white;">
                    <i class='fas fa-archive'></i>
                    <div class="sb-nav-link-icon"></div>
                    <FONT COLOR="white">
                    Productos / Inventario
                    </FONT>
                </a>
                <!--<div class="collapse" id="menuEmpleados" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href=""><FONT COLOR="white"> Panel</a></FONT>
                        <a class="nav-link" href=""><FONT COLOR="white"> Agregar productos</a></FONT>
                    </nav>
                </div>-->
                <!-- Modulo de permisos -->
                <!--<a class="nav-link collapsed" href="#" style="color:white;">
                    <i class='fas fa-clipboard'></i>
                    <div class="sb-nav-link-icon"></div>
                    <FONT COLOR="white">
                    Inventario
                    </FONT>
                </a>-->
                    <!--<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href=""><FONT COLOR="white">Tablero</a></FONT>
                    </nav>
                </div>-->
                 <a class="nav-link" href="{{route('proveedors.index')}}" style="color:white;">
                    <i class='fas fa-truck'></i>
                    <div class="sb-nav-link-icon"></div>
                    <FONT COLOR="white">
                    Proveedores
                    </FONT>
                </a>

                <a class="nav-link" href="{{route("productos.panelReportes")}}" style="color:white;">
                    <i class='fas fa-paste'></i>
                    <div class="sb-nav-link-icon"></div>
                    <font color="white">
                        Reportes
                    </font>
                </a>

            </div>
        </div>
    </nav>
</div>