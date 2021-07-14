<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicReservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../recursos/css/general.css">
    <link rel="stylesheet" href="../recursos/css/reservas.css">
</head>

<body>
    <div class="soy">
        <div class="container-lg container-md container-sm">
            <div class="row">
                <div class="col-12">
                    <a href="../" class="antehead">Persona natural</a>
                    <a href="../emp/turnos" class="antehead">Empresa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg container-md">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 logito">
                    <a href="../" class="logo">CLICRESERVAS</a>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="menuInicio">
                        <a href="../" class="btn-menu">INICIO</a>
                        <a href="../reservar" class="btn-menu">RESERVAR</a>
                        <?php 
                            session_start();
    
                            if(isset($_SESSION['usuario'])){
                                echo '<a href="../cuenta/perfil/" class="ln-cuenta">'.$_SESSION['usuario'].'</a>&nbsp;<a href="../recursos/php/verificaciones/cerrar.php" ><img class="btn-cerrar" src="../recursos/img/cerrar.svg"
                            alt="cerrar"></a>';
                            }else{
                                echo '<a href="../cuenta/inicio-sesion/" class="btn-cuenta">CUENTA</a>';
                            }
                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <main class="contenido" style="min-height: 800px;">
            <div class="buscador">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form method="POST" class="bus">
                            <div class="form-group">
                                <input type="text" class="form-control texto" id="busqueda" placeholder="¿Quieres buscar tu empresa de preferencia?">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row emprecitas">
                
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

    <script src="../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../recursos/js/popper.min.js"></script>
    <script src="../recursos/js/bootstrap.js"></script>
    <script src="../recursos/js/reservas.js"></script>
</body>

</html>