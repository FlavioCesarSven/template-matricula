<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Matricula Virtual</title>

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
                        <!-- Main content -->
                        <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                            <!-- /.card -->
                            <?php
                            require_once '../controller/cProgramasC.php';
                            $oProgC = new cProgramasC();
                            $result = $oProgC->listar();

                            foreach ($result as $row) {
                                echo $row["idprograma"] . "|" . $row["nomb_pro"] . "<br>";
                            }
                            ?>

                            <br><br><br>
                            <h3>VISUALIZAR EN UN DROPDOWNLIST (Combo)</h3>
                            
                            <select name="" id="">
                                <option selected disabled>Seleccione</option>
                                <?php
                                //recorrer filas
                                foreach ($result as $row) {
                                    
                                    ?>
                                    <option value="<?php echo $row["idprograma"] ?>"> <?php echo $row["nomb_pro"] ?> </option>
                                <?php
                                }
                                ?>


                            </select>
                            <br><br><br>
                            <h3>VISUALIZAR EN UNA TABLA </h3>
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($result as $row) {
                                   
                                ?>
                                    <tr>
                                        <td><?php echo $row["idprograma"] ?> </td>
                                        <td><?php echo $row["nomb_pro"] ?> </td>
                                        <td><?php echo $row["desc_pro"] ?> </td>
                                        <td><?php echo $row["estd_pro"] ?> </td>
                                    </tr>
                                <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
            </div>
        </div>
    </div>

    <?php include_once './includes/s_js.php'; ?>

</html>