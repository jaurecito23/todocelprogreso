<?php

    require "../../include/funciones.php";
    $db = conectarDB();


    incluírTemplate("header");

    debuguear($db);
        $marca = "";
        $modelo = "";
        $precio = "";
        $imagen = "";
        $stock = "";
        $detalles = "";
        $cantidadStock = "";
        $precioReal ="";
        $proveedor= "";
        $otrosDetalles = "";





    if($_SERVER['REQUEST_METHOD']==="POST"){


        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];
        $stock = $_POST['stock'];
        $detalles = $_POST['detalles'];
        $cantidadStock = $_POST['cantidad-stock'];
        $precioReal = $_POST['precio-real'];
        $proveedor= $_POST['proveedor'];
        $otrosDetalles = $_POST['otros-detalles'];






    }



?>

     <main>
        <div>
                <form method="POST">
                    <fieldset>
                        <legend> Ingrese las características </legend>
                        <div>
                        <label> Marca </label>
                        <input name="marca" type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Modelo </label>
                        <input  name="modelo" type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio </label>
                        <input  name="precio" type="number" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Imagen </label>
                        <input name="imagen" type="file" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Stock </label>
                        <input name="stock" type="number" placeholder="Ej.: Samsung">
                        </div>

                          <div>
                        <label> Otros detalles </label>
                       <textarea name="fetalles" >Sin Detalles</textarea>
                        </div>


                    </fieldset>
                    <fieldset>
                        <legend> Otros datos </legend>
                        <div>
                        <label> Cantidad en stock </label>
                        <input name="cantidad-stock" type="number" min="1" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio Real </label>
                        <input  name ="precio-real" type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Proveedor </label>
                        <input type="number" name="proveedor" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Otros detalles </label>
                       <textarea name="otros-detalles">Sin Detalles</textarea>
                        </div>


                    </fieldset>
                        <input value="ENVIAR" type="submit">
                </form>



        </div>


     </main>





<?php

incluírTemplate("footer");

?>