<div class="header-left">
    <div class="menu-icon dw dw-menu"></div>
    <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>

    <div class="header-search">
        <form>
            <div class="form-group mb-0">
                <!-- <i class="dw dw-search2 search-icon"></i> -->

                <!-- <input type="text" class="form-control search-input" placeholder="Búscar...">

                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="ion-arrow-down-c"></i>
                    </a>
                </div> -->
            </div>
        </form>
    </div>
</div>

<div class="header-right">

    <div class="user-info-dropdown">
        <div class="dropdown">

            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <span class="user-icon">
                    <img src="../<?php echo $_SESSION["foto_usu"]; ?>" alt="User Image">
                </span>
                <span class="user-name">Sesion de <?php echo $_SESSION["usuario"]; ?> | Área:  <?php echo $_SESSION["nomb_are"]; ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Configuración</a>
                <a class="dropdown-item" href="../controller/cUsuarioC.php?inputAccion=CerrarSesion"><i class="dw dw-settings2"></i> Cerrar Sesión</a>
            </div>

        </div>
    </div>

</div>