<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Matricula de Estudio</title>

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
                                <h4>Matricula de Estudio</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Matricula de Estudio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <!-- region editable -->
                    <!-- region editable -->
                    <?php
                    // incluir controlador
                    require_once '../controller/cMatriculaC.php';
                    // crear el objeto
                    $oMatriC = new cMatriculaC();
                    // ejecutar la consulta
                    $result = $oMatriC->listar();
                    ?>
                    <!-- fin region editable -->
                    <div class="pd-20">
                        <h4 class="text-blue h4">Matricula Registrados: <?php echo mysqli_num_rows($result); ?></h4>
                    </div>
                    <div class="pb-20">
                        
                    <!-- Button trigger modal -->
                    <div class="text-right" style="margin-bottom: 10px; margin-right: 10px;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#w_programa">
                            <i class="micon dw dw-add"></i> Agregar
                        </button>
                    </div>
                    <?php include_once './modales/m_matricula.php'; ?>
                        <table class="table  data-table-export wrap">
                            <thead>
                                <tr>
                                    <th class="table-plus">ID</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Fecha Nac</th>
                                    <th>Sexo</th>
                                    <th>Programa</th>
                                    <th>Ciclo</th>
                                    <th>Turno</th>
                                    <th>Estado</th>
                                    <th class="datatable-nosort">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as  $row) {
                                    $fecha = $row["fnac_est"];
                                    $fecha = date("d/m/Y", strtotime($fecha));
                                ?>
                                    <tr>
                                        <td><?php echo $row["idestudiante"] ?></td>
                                        <td><?php echo $row["nombres"] ?></td>
                                        <td><?php echo $fecha ?></td>
                                        <td><?php echo $row["sexo_est"] ?></td>
                                        <td><?php echo $row["nomb_pro"] ?></td>
                                        <td><?php echo $row["nomb_cic"] ?></td>
                                        <td><?php echo $row["turn_mat"] ?></td>
                                        <td><?php echo $row["estd_mat"] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
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
               <?php  include_once './includes/s_footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include_once './includes/s_js.php'; ?>

</html>