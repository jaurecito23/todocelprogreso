<?php

    require "../../include/funciones.php";
    $db = conectarDB();

        $errores = [];

        $marca = "";
        $modelo = "";
        $precio = "";
        $imagen = "";
        $stock = "";
        $detalles = "Sin Detalles";
        $cantidadStock = "";
        $precioReal ="";
        $proveedor= "";
        $otrosDetalles = "Sin Detalles";
        $imagen = "";



    if($_SERVER['REQUEST_METHOD']==="POST"){


        $marca = mysqli_real_escape_string($db,$_POST['marca']);
        $modelo = mysqli_real_escape_string($db,$_POST['modelo']);
        $precio = mysqli_real_escape_string($db,$_POST['precio']);
        $stock = mysqli_real_escape_string($db,$_POST['stock']);
        $detalles = mysqli_real_escape_string($db,$_POST['detalles']);
        $precioReal = mysqli_real_escape_string($db,$_POST['precio-real']);
        $cantidadStock =mysqli_real_escape_string($db,$_POST['cantidad-stock']);
        $proveedor= mysqli_real_escape_string($db,$_POST['proveedor']);
        $otrosDetalles = mysqli_real_escape_string($db,$_POST['otros-detalles']);
        if(isset($_FILES['imagen'])){
            $imagen = $_FILES['imagen'];
        }





        if($marca === ""){
            $errores[] = "Debe ingresar una marca";
        }
        if($modelo === ""){
            $errores[] = "Debe ingresar un modelo";
        }
        if($precio === ""){
            $errores[] = "Debe ingresar un precio";
        }
        if($stock === "--Seleccione--"){
            $errores[] = "Debe ingresar un stock";
        }

        if($detalles === ""){
            $errores[] = "Debe ingresar los detalles";
        }
        if($cantidadStock === ""){
            $errores[] = "Debe ingresar una cantidad en stock";
        }
        if($precioReal === ""){
            $errores[] = "Debe ingresar un precio real";
        }
        if($proveedor === ""){
            $errores[] = "Debe ingresar un proveedor";
        }
        if($otrosDetalles === ""){
            $errores[] = "Debe ingresar Otros Detalles";
        }

        if ($_FILES['imagen']['name'] === "") {
            $errores[] = "Debe ingresar imagen";
        }

        // if(isset($_FILES['imagen']) && !$_FILES['imagen']['error'] = 0 ){

        //     $errores[] = "Debes Agregar una imagen";

        // }



        if(empty($errores)){
            // Imagen
            // Subir al servidor
                // crear carpeta si no existe
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //Nombre
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                // Subo imagen
                move_uploaded_file($imagen['tmp_name'], CARPETA_IMAGENES . $nombreImagen);

                //Inseratr todo en base de datos
            $query = "INSERT INTO productos (marca,modelo,precio,imagen,stock,detalles) VALUES('$marca','$modelo','$precio','$nombreImagen','$stock','$detalles');";


            $resultado = mysqli_query($db,$query);


            if($resultado){

                header("Location: /pagina-web/admin/admin.php?id=1");

            }



        }

    }


    incluírTemplate("header");

?>

     <main>
            <div>
                <?php foreach($errores as $error):?>

                        <h2> <?php echo $error?> </h2>

                <?php  endforeach;?>

            </div>

        <div>
                <form method="POST" action="/pagina-web/admin/productos/crear.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend> Ingrese las características </legend>
                        <div>
                        <label> Marca </label>
                        <input value="<?php echo $marca ?>" name="marca" type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Modelo </label>
                        <input  name="modelo" type="text" value="<?php echo $modelo ?>" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio </label>
                        <input  name="precio" type="number" value="<?php echo $precio ?>" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Imagen </label>
                        <input name="imagen" type="file" placeholder="Ej.: Samsung" acept="image/jpeg" acept="image/png">
                        </div>

                        <div>
                        <label for="stocc"> Stock </label>
                        <select name="stock" id="stock">
                            <option  <?php echo $stock === "" ? 'selected' : ''?>>--Seleccione--</option>
                            <option <?php echo $stock === "True" ? 'selected' : ''?> >True</option>
                            <option  <?php echo $stock === "False" ? 'selected' : ''?>>False</option>

                        </select>


                        </div>

                          <div>
                        <label> Detalles </label>
                       <textarea name="detalles" > <?php  echo $detalles ?></textarea>
                        </div>


                    </fieldset>
                    <fieldset>
                        <legend> Otros datos </legend>
                        <div>
                        <label> Cantidad en stock </label>
                        <input name="cantidad-stock" type="number" min="1" value="<?php echo $cantidadStock  ?>" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio Real </label>
                        <input  name ="precio-real"  value="<?php echo $precioReal ?>"type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Proveedor </label>
                        <input type="text" name="proveedor" value="<?php echo $proveedor ?>" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Otros detalles </label>
                       <textarea name="otros-detalles"><?php echo $otrosDetalles ?></textarea>
                        </div>

                        <input value="ENVIAR" type="submit">

                    </fieldset>
                </form>



        </div>


     </main>





<?php

incluírTemplate("footer");

?>