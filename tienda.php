<?php

   require "include/funciones.php";

    $db = conectarDB();

   incluírTemplate("header");


 $query = "SELECT * FROM productos LIMIT 9 ";

$resultado = mysqli_query($db, $query);



?>





            <div class="galeria">
        <p class="anterior oculto mover-galeria">
        &lt;
        </p>


        <p class="siguiente oculto mover-galeria">
        &gt;
        </p>

            </div>

  <section class="seccion-productos contenedor">

  <h2>Productos...</h2>

    <div class="contenedor-productos">

<?php while($producto = mysqli_fetch_assoc($resultado)){
        $imagen = $producto['imagen']

    ?>

<div class="producto">
    <p class="nombre"><?php echo $producto['modelo'];?></p>
    <img src="<?php echo "imagenes/".$imagen ?>">
    <p class="precio"><?php echo $producto['precio']?></p>


</div>


<?php };?>

    </div>
  </section>

     </div>


<?php

    incluírTemplate("footer");

?>
    <script src="build/js/bundle.min.js"></script>


</body>
</html>