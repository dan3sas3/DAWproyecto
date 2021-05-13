
<?php
  require "header.php"
 ?>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <title>Inicio</title>
    <style>

        body {
            font-family: 'Poppins', sans-serif;
        }
        #car, .carousel-inner .item {
            height: 100vh;
        }
        .banner {
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .carousel-caption {
            padding-bottom: 250px;
            font-family: poppins;
        }
        .carousel-caption h2 {
            font-size: 70px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .carousel-caption h2 span {
            color: #EDBB00;
        }
        .carousel-caption a {
            background: #EDBB00;
            padding: 15px 35px;
            display: inline-block;
            margin-top: 15px;
            color: #fff;
            text-transform: uppercase;
            border-radius: 25px;
        }
        .carousel-control.right {
            background-image: none;
        }
        .carousel-control.left {
            background-image: none;
        }
        .carousel-indicators .active {
            background-color: #EDBB00;
            border-color: #EDBB00;
        }
        /*responsive css*/

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .carousel-caption {
                padding-bottom: 50px;
            }
            .carousel-caption h2 {
                font-size: 50px;
            }
        }
        @media only screen and (max-width: 767px) {
            .navbar-inverse .navbar-brand {
                font-size: 30px;
                padding: 20px 15px;
            }
            .navbar-collapse {
                background: rgba(0, 0, 0, 0.5);
            }
            .carousel-caption {
                padding-bottom: 120px;
            }
            .carousel-caption h2 {
                font-size: 25px;
            }
            .carousel-caption h3 {
                font-size: 18px;
            }
            .carousel-caption a {
                padding: 10px 25px;
            }
        }
    </style>

    <div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="banner" style="background-image: url(../img/DuaLentes.gif);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated bounceInRight" style="animation-delay: 1s">K&D <span> Peoples</span></h2>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">La nueva manera de ver la vida</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/productos.php">Ver Productos</a></p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/aboutUs.php">¿Quiénes somos?</a></p>
                    </div>
                </div>

                <div class="item">
                    <div class="banner" style="background-image: url(../img/AriLentes2.jpeg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">K&D <span> Peoples</span></h2>
                        <h3 class="animated fadeInUp" style="animation-delay: 2s">La nueva manera de ver la vida</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/productos.php">Ver Productos</a></p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/aboutUs.php">¿Quiénes somos?</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(../img/BichoLentes.jpg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">K&D <span> Peoples</span></h2>
                        <h3 class="animated fadeInLeft" style="animation-delay: 2s">La nueva manera de ver la vida</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/productos.php">Ver Productos</a></p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php//aboutUs.php">¿Quiénes somos?</a></p>
                    </div>
                </div>
                <div class="item">
                    <div class="banner" style="background-image: url(../img/DaniLentes2.jpeg);"></div>
                    <div class="carousel-caption">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">K&D <span> Peoples</span></h2>
                        <h3 class="animated fadeInLeft" style="animation-delay: 2s">La nueva manera de ver la vida</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/productos.php">Ver Productos</a></p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="http://localhost/PHPProjects/DAWproyecto-main/php/aboutUs.php">¿Quiénes somos?</a></p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
