<?php 

    ob_start();
    session_start();

    if (!isset($_SESSION["usuario"])  ) {
        header("Location:login.php");
    }else{


?>


<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Programas de Estudio</title>

    <?php include_once './includes/s_head.php'; ?>

</head>

<body>
    <div class="pre-loader">
        <?php include_once './includes/s_loader.php'; ?>
    </div>

    <div class="header">

        <?php include_once './includes/s_header.php'; ?>

    </div>

    <div class="right-sidebar">
        <?php include_once './includes/s_sidebar.php.php'; ?>
    </div>

    <div class="left-side-bar">
        <?php include_once './includes/s_navbar.php'; ?>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">

            <div class="min-height-200px">

                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Programas de Estudios</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Programas de Estudio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <!-- region editable -->
                    <?php
                    // incluir controlador
                    require_once '../controller/cProgramasC.php';
                    // crear el objeto
                    $oProgC = new cProgramasC();
                    // ejecutar la consulta
                    $result = $oProgC->listar();
                    ?>
                    <!-- fin region editable -->
                    <div class="pd-20">
                        <h4 class="text-blue h4">Programas Registrados: <?php echo mysqli_num_rows($result); ?></h4>
                    </div>
                    <div class="pb-20">
                        <!-- Button trigger modal -->
                        <div class="text-right" style="margin-bottom: 10px; margin-right: 10px;">
                            <button type="button" onclick="abrirModal()" class="btn btn-primary">
                                <i class="micon dw dw-add"></i> Agregar
                            </button>

                            <a href="../reports/rpt_programas_scbd2.php" target="_blank" class="btn btn-danger">
                            <i class="icon-copy dw dw-print"></i> Imprimir
                            </a>
                        </div>

                        <?php include_once './modales/m_programa.php'; ?>

                        <table class="table  data-table-export wrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th>Programa</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th class="datatable-nosort">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $index = 1;
                                    foreach ($result as $row) {

                                ?>
                                    <tr>
                                        <td><?php echo $index++ ?></td>
                                        <td><?php echo $row["nomb_pro"] ?></td>
                                        <td><?php echo $row["desc_pro"] ?></td>
                                        <td><?php echo $row["estd_pro"] ?></td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" onclick="editarPrograma(<?php echo $row["idprograma"] ?> )" style="cursor: pointer;"><i class="dw dw-edit2"></i> Editar</a>
                                                    <a class="dropdown-item" onclick="eliminarRegistro( <?php echo $row["idprograma"] ?> )" title="Eliminar <?php echo $row["nomb_pro"] ?>" style="cursor: pointer;"><i class="dw dw-delete-3"></i> Eliminar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- Simple Datatable End -->

                <!-- Checkbox select Datatable End -->

            </div>


            <div class="footer-wrap pd-20 mb-20 card-box">
                <?php include_once './includes/s_footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include_once './includes/s_js.php'; ?>
</body>
<script src="../js/js_programa.js"></script>

</html>

<?php 

} 
ob_end_flush();

?>