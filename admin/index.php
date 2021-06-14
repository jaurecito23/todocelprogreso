<?php
 require "../include/funciones.php";


    $db = conectarDB();

    $query = "SELECT * FROM productos";

    $resultado = mysqli_query($db,$query);

    $id="";

    if(isset($_GET['id'])){

        $id= filter_var(intval($_GET['id']),FILTER_VALIDATE_INT);

    }


        if( $_SERVER['REQUEST_METHOD']==="POST"){

            $id="";
                    if(isset($_POST['id'])){
                        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
                    }

            $query =  "DELETE FROM productos WHERE id = '${id}' LIMIT 1";

            $resultado = mysqli_query($db,$query);


                    if ($resultado){

                    header("Location: index.php?id=2");

                    }



        }

 incluírTemplate("header");


?>

<main>
    <div class="">
        <a href='productos/crear.php'> Crear Producto</a>
    </div>

        <?php if($id === 1):?>
        <h2> Creado Correctamente </h2>
        <?php endif;?>
        <?php if($id === 2):?>
        <h2> Borrado Correctamente </h2>
        <?php endif;?>
        <?php if($id === 3):?>
        <h2> Actualizado Correctamente </h2>
        <?php endif;?>


    <div class="tabla__productos">

            <h2> Productos </h2>

        <table>
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <tr>

                <?php while($producto = mysqli_fetch_assoc($resultado)):?>

                    <td><?php echo $producto['id']?></td>
                    <td><?php echo $producto['marca']?></td>
                    <td><img src="../imagenes/<?php echo $producto['imagen']?>"></td>
                    <td><?php echo $producto['modelo']?></td>
                    <td><?php echo $producto['precio']?></td>
                    <td>
                        <form method="POST" action="/pagina-web/admin/index.php">
                            <input  name="id" type="hidden" value="<?php echo $producto['id']?>">
                            <input  type="submit" value="Borrar">
                        </form>
                            <a href="productos/actualizar.php?id=<?php echo $producto['id']?>"> Actualizar </a>
                    </td>
                    <?php endwhile;?>
                </tr>
            </tbody>
        </table>


    </div>

</main>
<?php incluírTemplate("footer") ?>