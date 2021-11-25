<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" href="vendors/styles/login_style2.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoico.png">

    <title>Iniciar Sesión</title>
</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Sistema de Matriculas</h2>
                    <form class="login-form">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
                            <input type="text" class="form-control" placeholder="Ingresar Usuario"  maxlength="20" id="InputLogin" id="InputPassword" >
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Ingresar Contraseña">
                        </div>

                        <div class="form-group"  id="msg">
                        </div>
                        
                        <br><br>
                        <div class="form-check">
                            <button onclick="ValidarAcceso()" class="btn btn-login float-right">Iniciar Sesión</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <!-- <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide"> -->
                                <!-- <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div> -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
    </section>

</body>

<script src="../js/js_usuario.js"></script>

</html>