<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <h3>Bienvenido al Panel Admnistrativo</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <img class="img-fluid" src="../images/matriculas-online-web.jpg" alt="">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
            </div>
        </div>
    </div>

    <?php include_once './includes/s_js.php'; ?>

</html>