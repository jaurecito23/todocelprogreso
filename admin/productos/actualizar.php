<?php

    require "../../include/funciones.php";
    $db = conectarDB();

        $errores = [];


        $id = filter_var(intval($_GET['id']),FILTER_VALIDATE_INT);
        $query="SELECT * FROM productos WHERE id = '${id}' LIMIT 1;";
        $resultado = mysqli_query($db,$query);
        $producto = mysqli_fetch_assoc($resultado);




        $marca = $producto['marca'];
        $modelo = $producto['modelo'];
        $precio = $producto['precio'];
        $imagen = $producto['imagen'];
        $stock = $producto['stock'];
        $detalles = $producto['detalles'];
        $cantidadStock = "2";
        $precioReal ="110";
        $proveedor= "Sin registro";
        $otrosDetalles = "Sin Detalles";


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




        if(empty($errores)){

             $nombreImagen = "";

         if($imagen['name'] !== ""){
                unlink(CARPETA_IMAGENES . $producto['imagen']);
                $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";
                 move_uploaded_file($imagen['tmp_name'],CARPETA_IMAGENES . $nombreImagen);
        }else{

               $nombreImagen = $producto['imagen'];

            }

            $query = "UPDATE productos SET marca='${marca}', modelo = '${modelo}' ,precio='${precio}' ,imagen = '${nombreImagen}' ,stock='${stock}', detalles='${detalles}' WHERE id = ${id};";





            $resultado = mysqli_query($db,$query);


     if($resultado){

                header("Location: /pagina-web/admin/index.php?id=3");

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
                <form method="POST" action="/pagina-web/admin/productos/actualizar.php?id=<?php echo $id ?>" enctype="multipart/form-data">
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