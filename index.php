<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicReservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/css/general.css">
    <link rel="stylesheet" href="recursos/css/inicioSty.css">
</head>

<body>
    <div class="soy">
        <div class="container-lg container-md container-sm">
            <div class="row">
                <div class="col-12">
                    <a href="" class="antehead">Persona natural</a>
                    <a href="emp/turnos" class="antehead">Empresa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg container-md container-sm">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 logito ">
                    <a href="" class="logo">CLICRESERVAS</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="menuInicio">
                        <a href="" class="btn-menu">INICIO</a>
                        <a href="reservar/" class="btn-menu">RESERVAR</a>
                        <?php 
                            session_start();
    
                            if(isset($_SESSION['usuario'])){
                                echo '<a href="cuenta/perfil/" class="ln-cuenta">'.$_SESSION['usuario'].'</a>&nbsp;<a href="recursos/php/verificaciones/cerrar.php" ><img class="btn-cerrar" src="recursos/img/cerrar.svg"
                                alt="cerrar"></a>';
                            }else{
                                echo '<a href="cuenta/inicio-sesion/" class="btn-cuenta">CUENTA</a>';
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <main class="contenido">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 Bemvida">
                    <section class="Bda">
                        <h1 class="Bda-T">Bienvenidos a ClicReservas</h1>
                        <p class="Bda-D">En nuestro sitio encontraras una gran variedad de empresas en las cuales
                            puedes realizar tus reservas sin salir de casa y sin largas esperas.</p>
                    </section>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" style="width: auto;">
                    <figure class="figure">
                        <img src="recursos/img/undraw_a_better_world_9xfd - copia.png" alt="Imagen de bienvenida" class="figure-img img-fluid rounded imgBienvenida">
                    </figure>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <h2 class="sub col-12">Preguntas frecuentes</h2>
                        <ul class="faqs col-12">
                            <li>
                                <button class="btn-faq btn-block">¿Qué tipo de reservas puedo realizar?</button>
                            </li>
                            <li>
                                <button class="btn-faq btn-block">¿Cómo funciona la plataforma?</button>
                            </li>
                            <li>
                                <button class="btn-faq btn-block">¿Cómo tramito un reserva?</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="contacto" id="ct">
                        <h2 class="sub">Contacto</h2>
                        <form method="POST" id="contactos">
                            <div class="form-row">
                                <div class="col-12 info">
                                  <input type="text" class="form-control texto" id="nombre" placeholder="Pepito Perez" required>
                                </div>
                                <div class="col-12 info">
                                    <input type="text" class="form-control texto" id="asunto" placeholder="Empresa interesada" required>
                                </div>
                                <div class="col-12 info">
                                    <input type="mail" class="form-control texto" id="correo" placeholder="ejemplo@mail.com" required>
                                </div>
                                <div class="col-12 info">
                                    <input class="btn-general" type="submit" value="Contactar">
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 in">
                    <p class="copy">ClicReservas &copy; 2020</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="nav op-ft">
                        <a href="#" class="info-ft">b</a>
                        <a href="#" class="info-ft">a</a>
                        <a href="#" class="info-ft">f</a>
                    </nav>
                </div>
            </div>
        </footer>

        
    </div>
    <script src="recursos/js/jquery-3.4.1.min.js"></script>
    <script src="recursos/js/bootstrap.js"></script>
    <script src="recursos/js/inicio.js"></script>
</body>
</html>