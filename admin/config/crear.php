<?php

    require "../../include/funciones.php";


    incluírTemplate("header");



?>

     <main>
        <div>
                <form>
                    <fieldset>
                        <legend> Ingrese las características </legend>
                        <div>
                        <label> Marca </label>
                        <input type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Modelo </label>
                        <input type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio </label>
                        <input type="number" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Imagenes </label>
                        <input type="file" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Stock </label>
                        <input type="number" placeholder="Ej.: Samsung">
                        </div>

                          <div>
                        <label> Otros detalles </label>
                       <textarea>Sin Detalles</textarea>
                        </div>


                    </fieldset>
                    <fieldset>
                        <legend> Otros datos </legend>
                        <div>
                        <label> Cantidad en stock </label>
                        <input type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Precio Real </label>
                        <input type="text" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Proveedor </label>
                        <input type="number" placeholder="Ej.: Samsung">
                        </div>

                        <div>
                        <label> Otros detalles </label>
                       <textarea>Sin Detalles</textarea>
                        </div>


                    </fieldset>

                </form>



        </div>


     </main>





<?php

incluírTemplate("footer");

?>