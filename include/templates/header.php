
<?php
    $palabraABuscar = $_POST['busqueda'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOCEL PROGRESO</title>

    <link rel="stylesheet" href="/Pagina-Web/build/css/app.css">
</head>
<body>

     <div class="contenedor_principal">

            <header class="panel-superior">
               <a href="/pagina-web/tienda.php"> <img class="logo_inicio " src="/Pagina-Web/build/img/logo.webp" alt=" Logo Imagen"></a>
                <form class="formulario__buscador" method="POST">
                    <fieldset>
                        <input  class="input__buscador" id="buscador" name="busqueda" placeholder="Buscador..." type="text">
                        <input type="submit">
                    </fieldset>
                    <div class="resultado__busqueda oculto con__eventos">
                        <ul class="listado__busqueda">
                            <li class="li__busqueda">
                            <div class="producto__busqueda">

                               <div class="imagen_producto--buscador">
                                <img class="imagen" src="build/img/estuche.jpg">
                               </div>
                               <div class="textos__productos--buscador">
                                <p class="modelo">Samsung Galaxy como nuevo</p>
                                <p class="precio">$2000</p>
                               </div>
                            </div>
                            </li>
                            <li>
                            <div class="producto__busqueda">

                               <div>
                                <img src="build/img/estuche.jpg">
                               </div>
                               <div>
                                <p class="modelo">Samsung Galaxy como nuevo</p>
                                <p class="precio">$2000</p>
                               </div>
                            </div>
                            </li>
                            <li>
                            <div class="producto__busqueda ">

                               <div>
                                <img src="build/img/estuche.jpg">
                               </div>
                               <div>
                                <p class="modelo">Samsung Galaxy como nuevo</p>
                                <p class="precio">$2000</p>
                               </div>
                            </div>
                            </li>
                            <li>
                            <div class="producto__busqueda">

                               <div>
                                <img src="build/img/estuche.jpg">
                               </div>
                               <div>
                                <p class="modelo">Samsung Galaxy como nuevo</p>
                                <p class="precio">$2000</p>
                               </div>
                            </div>
                            </li>


                        </ul>

                    </div>

                </form>
                <div class=" contenedor_logotipo">
                <a class="logotipo_inicio"><img src="/Pagina-Web/build/img/carrito2.webp"></a>
                <a class="logotipo_inicio"><img src="/Pagina-Web/build/img/user.webp"></a>
                </div>
            </header>

            <nav>
                <div class="navegacion">

                      <div class="nav">
                            <a href="#"> Accesorios </a>
                      </div>
                      <div class="nav">
                            <a href="#"> Celulares </a>
                      </div>
                      <div class="nav">
                            <a href="#"> Outlet </a>
                      </div>
                </div>
             </nav>