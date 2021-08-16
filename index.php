<?php
session_start();
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$x=0;
?>

<!DOCTYPE html>

<html>
<!--AQUI ESTA EL HEAD    -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="docs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/estilosindex.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="img/logo1.jpeg">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"
        defer=""></script>
    <script src="docs/js/bootstrap.min.js" type="text/javascript" defer=""></script>
    <script src="docs/jQueryValidator/form-validator/jquery.form-validator.js" type="text/javascript"></script>
    <title>Inicio</title>
</head>
<a href="SI/Auditor/examples/Perfil.html"></a>
<!--EMPIEZA EL BODY   -->

<h:body data-spy="scroll" data-target="#navbar-example">
    <!--IMAGEN DE FONDO DE INICIO-->
    <section id="homepage" class="container-fluid slaider d-flex justify-content-center align-items-center">
        <h1 class="display-4 color1 mt-5 pt-5 font-weight-bold">Bienvenidos a ASOREDC</h1>
    </section>

    <!--NAVEGADOR-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light color2 fixed-top" id="navbar-example">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand">
                <img src="img/logo1.jpeg" width="150" height="80" class="d-inline-block align-top" alt="Logo">
            </a>
            <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">
                <div class="navbar-nav mr-auto ml-auto">
                    <li class="nav-item navbar-dark">
                        <a class="nav-link active" href="#homepage"><span class="fa fa-tree" aria-hidden="true"></span>
                            Inicio
                            <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienes"><span class="fa fa-question"></span>
                            Quiénes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactenos"> <span class="fa fa-user-circle-o"></span>
                            Contáctenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Vista/catálogo.php">
                            <span class="fa fa-cubes"></span>
                            Material</a>
                    </li>
                </div>
                <div class="navbar-nav">
                    <div class="dropdown show">
                        <a class="btn btn-success dropdown-toggle ml-5" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-user-circle-o"></span>Iniciar Sesión
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#">Iniciar
                                Sesión </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!--NAVEGADOR-->
    <hr>

    <!--Aqui va el carrusel-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/pakas1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Pacas de Cartón</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/chatarra.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Chatarra</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/pakas2.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Pacas de Pet</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/papel.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Papel</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/vidrio.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Vidrio</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/tapas.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Tapas</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/plástico.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Pet</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="img/FOTOS HUMEDALES/pakas3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Pacas de Latas</h3> -->
                    <p>Recolección de residuos.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!--Aqui termina  el carrusel-->
    <!--Aqui empiezan las cartas de información-->
    <hr>
    <section class="container mt-5 pt-5 ">
        <h1 class="text-center text-uppercase h1">¡bienvenidos!</h1>
        <div class="card-group mt-5">
            <div class="card-deck">

                <!--PRIMERA CARTA-->

                <div class="card">
                    <a href="" data-toggle="modal" data-target="myModal"><img class="card-img-top mycard"
                            src="Imagenes/Principios.PNG" alt="Card image cap" /></a>
                    <div class="card-body">
                        <h4 class="card-title">Principios</h4>
                        <p class="card-text">Incentivar y construir una reducción significativa de cantidades existentes
                            de residuos contaminantes y peligrosos.</p>

                        <!-- BOTON MODAL -->

                        <button type="button" class="btn btn-primary" id="myModal" data-toggle="modal"
                            data-target=".bd-example-modal-lg">Ver más...</button>

                        <!-- MODAL -->

                        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title display-4 mytext" id="exampleModalLabel">Principios</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <img class="mycard2" width="1200" height="300" src="Imagenes/REC.jpg"
                                            alt="Card image cap" />
                                        <div class="d-flex flex-column">
                                            <p class="ml-4">Hoy te presentamos lo último que ha llegado a nuestro
                                                portafolio, y que su vez es lo último de las tendencias mundiales para
                                                prevenir los residuos y promover la reutilización, el reciclado y la
                                                recuperación para reducir el impacto mundo ambiental.
                                            </p>
                                            <p class="ml-4">
                                                "Con el aumento en los niveles de emisión de contaminantes a lo largo de
                                                los años, también ha aumentado la preocupación sobre las acciones que se
                                                pueden tomar para minimizar el daño causado al planeta. Como una forma
                                                de promover la reducción o la no generación de residuos, surge el
                                                principio de las 3 R. Estas acciones,
                                                junto con la adopción de patrones de consumo sostenibles, se han
                                                promovido como una forma de proteger los recursos naturales y minimizar
                                                el desperdicio".
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--FIN MODAL-->

                    </div>
                </div>

                <!--SEGUNDA CARTA-->

                <div class="card">
                    <a href="" data-toggle="modal" data-target="#modal2"><img class="card-img-top mycard"
                            src="Imagenes/Servicios.PNG" alt="Card image cap" /></a>
                    <div class="card-body">
                        <h4 class="card-title">Servicios</h4>
                        <p class="card-text">Recuperación, transformación, aprovechamiento, recolección, pesaje y
                            transporte de residuos aprovechables.</p>

                        <!-- BOTON MODAL -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">Ver
                            más...</button>

                        <!--MODAL-->

                        <div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title display-4 mytext" id="exampleModalLabel">Servicios</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <img class="mycard2" width="1200" height="300" src="Imagenes/serv.jpg"
                                            alt="Card image cap" />
                                        <div class="d-flex flex-column">
                                            <p class="ml-4">Transporte de residuos aprovechables con la opción de pesaje
                                                en el punto para determinar la cantidad de material recolectado con la
                                                selección y clasificación previa de cada uno.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--FIN MODAL-->

                    </div>
                </div>

                <!--TERCERA CARTA-->

                <div class="card">
                    <img class="card-img-top mycard" src="Imagenes/Materiales.PNG" alt="Card image cap" />
                    <div class="card-body">
                        <h4 class="card-title">Materiales</h4>
                        <p class="card-text">En AsoreDC nos gusta que la gente conozca los aprovechables que podría
                            tener
                            en casa con facilidad.
                        </p>
                        <!-- BOTON MODAL -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3">Ver
                            más...</button>
                        <!--MODAL-->
                        <div class="modal fade bd-example-modal-lg" id="modal3" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title display-4 mytext" id="exampleModalLabel">Materiales</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <img class="mycard2" width="1200" height="300" src="Imagenes/material.jpg"
                                            alt="Card image cap" />
                                        <div class="d-flex flex-column">
                                            <h5 class="display-4 mytext text-center">¿Qué puedes reutilizar?</h5>
                                            <p class="ml-4 mt-5">
                                                -Bolsas de le leche, envases de plástico, latas, envases de papel,
                                                cartón y vidrio.
                                            </p>
                                            <p class="ml-4">
                                                -.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN MODAL-->
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Aqui empiezan las cartas de información-->

    <!--BANNER-->
    <section class="banner2 my-5 ">
        <h3 class="display-4 text-white d-flex aling-items-center justify-content-center">Copyright (C) |2021| | AsoreDC
            - ECA | Todos los derechos reservados.</h3>
    </section>
    <!--FIN BANNER-->

    <!--SECCION SERVICIOS-->

    <section class="container mt-5 pt-5">
        <h1 class="text-center text-uppercase h1">Servicios</h1>
        <div class="row d-flex justify-content-center mt-5">
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-heart fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Recuperación</h4>
                    </div>
                    <p class="card-text">AsoreDC ofrece servicios de recuperación y garantía de
                        productos renovables para su procesamiento y uso con diferentes entidades.
                        Rescatando siempre la reutilización de materiales producidos. </p>
                </div>
            </div>
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-check-square fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Transformación</h4>
                    </div>
                    <p class="card-text">AsoreDC tiene a su disposición las herramientas y equipo necesario
                        para escoger el material en buen estado y de calidad para luego enviarla a su objetiva
                        transformación para nuevamente utilizarlos.</p>
                </div>
            </div>
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-briefcase fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Aprovechamiento</h4>
                    </div>
                    <p class="card-text">AsoreDC ofrece un plan de aprovechamiento con protocolos en estándares de
                        calidad y seguridad en adquirir material para después suministrarlo a entidades que los usen
                        como materia prima.</p>
                </div>
            </div>
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-play fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Recolección</h4>
                    </div>
                    <p class="card-text">En AsoreDC existe una variedad de material para su renovación, del cual podemos
                        encontrar: cartón, plegadiza, archivo, vidrio, plástico, metales, entre otros.
                        Los invitamos a que vean nuestra sección de material.</p>
                </div>
            </div>
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Pesaje</h4>
                    </div>
                    <p class="card-text">AsoreDC cuenta con todos los equipos técnicos de pesaje como también
                        el equipo adecuado para hacer esta actividad dentro de las instalaciones, contando
                        con el espacio y zonas exclusivas para ello.</p>
                </div>
            </div>
            <div class="card bg-light mb-3 m-3" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="d-flex">
                        <i class="fa fa-truck fa-4x" aria-hidden="true"></i>
                        <h4 class="card-title ml-4">Transporte de Residuos</h4>
                    </div>
                    <p class="card-text">AsoreDC tiene a su disposición un vehículo especializado para el transporte
                        de materiales en la actividad de recolección, garantizando el traslado y cargue de compra
                        por el peso del material.</p>
                </div>
            </div>
        </div>
    </section>

    <!--FIN SECCION SERVICIOS-->

    <!--Aqui empieza las cartas de mision y vision-->

    <hr>
    <div class="container">
        <h1 class="text-center h1" id="quienes">Quiénes Somos</h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">MISIÓN</h4>
                        <a href="" data-toggle="modal" data-target="myModal"><img class="card-img-top mycard"
                                src="Imagenes/Misión.PNG" alt="Card image cap" /></a>
                        <p class="card-text text-justify">
                        <ul>
                            <li class="text-justify">Una verdadera autoridad en materia ambiental, respaldados en los
                                principios administrativos de legalidad,
                                igualdad, moralidad administrativa, responsabilidad y eficiencia.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">VISIÓN</h4>
                        <a href="" data-toggle="modal" data-target="myModal"><img class="card-img-top mycard"
                                src="Imagenes/Visión.PNG" alt="Card image cap" /></a>
                        <p class="card-text text-justify">
                        <ul>
                            <li class="text-justify">Una entidad comprometida con el cambio de la cultura ciudadana
                                entorno a la protección, conservación y preservación de los recursos naturales
                                renovables.
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Aqui Termina las cartas de mision y vision-->
    <!--Aqui empieza el contactenos-->

    <hr>
    <h1 class="h1 text-center" id="contactenos">Contáctenos</h1>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <!--Div para el formulario-->
            <div class="col-6 row ">
                <div class="embed-responsive embed-responsive-16by9 col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.0183725997645!2d-74.08465188573592!3d4.590725696664866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9901673a469b%3A0xbafe2d4f25840c9d!2zQ3JhLiA5ICMyLTMwLCBCb2dvdMOh!5e0!3m2!1ses!2sco!4v1624995692603!5m2!1ses!2sco"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col">
                    <p>Carrera 9° No. 2 - 30 - Barrio Las Cruces - Contacto: +57 3123157845.
                        <br>Horario de atención: lunes a viernes 8:00 am a 5:00 pm.
                        <br>Bogotá - Colombia
                    </p>
                </div>
            </div>

            <!--Div para el formulario-->
            <div class="col-6 borde p-5 mb-5">
                <form id="contactenosForm" method="POST">
                    <div class="form-group row">
                        <label class="col-12 col-md-4 col-lg-3 col-form-label">Nombre:</label>
                        <input type="text" placeholder="Carlos Alberto Suárez."
                            class="form-control col-12 col-md-8 col-lg-9 " id="nombreCont" name="nombreCont"
                            data-validation="length" data-validation-length="1-50"
                            data-validation-error-msg="Ingrese un maximo de 50 caracteres">
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-4 col-lg-3 col-form-label">Email:</label>
                        <input type="text" placeholder="carlos@gmail.com" class="form-control col-12 col-md-8 col-lg-9"
                            id="emailCont" name="emailCont" data-validation="email"
                            data-validation-error-msg="Ingrese un email valido">
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-4 col-lg-3 col-form-label">Observaciones:</label>
                        <input type="text" required placeholder="¿Qué sugerencias tiene?"
                            class="form-control col-12 col-md-8 col-lg-9" id="observa" name="observa"
                            data-validation="required">
                    </div>
                    <div class="form-group d-flex justify-content-center row">
                        <button class="btn btn-success col-12" id="obser">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-auto ml-auto " id="exampleModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
if ($x==1)
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' align='center'>
    <strong>Usuario</strong> no registrado con los datos ingresados, vuelva a intentar.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
if ($x==2)
	echo "<div class='alert alert-warning alert-dismissible fade show' role='alert' align='center'>
    <strong>Atención!</strong> debe Iniciar Sesión para poder ingresar a la Aplicación.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
if ($x==3)
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert' align='center'>
    <strong>El Usuario</strong> ha cerrado la Sesión.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
?>
                <form id="iniciarSesion" action="Controlador/validarIniciarSesion.php" autocomplete="off">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <label class="col-form-label">Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" name="login" id="login"
                                required>
                        </div>
                        <div class="container-fluid">
                            <label class="col-form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="jumbotron mt-5 mb-0 bg-dark text-white rounded-0">
        <div class="container">
            <h1 class="display-5">Gracias por visitarnos.</h1>
            <div class="d-flex justify-content-between aling-items-center">
                <p class="lead"></p>
            </div>
            <hr class="my-4">
            </hr>
            <div class="d-flex">
                <p class="mt-2">Copyright (C) |2021| | AsoreDC
                    - ECA | Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</h:body>
<!--TERMINA EL BODY    -->

</html>