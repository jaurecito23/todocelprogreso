<?php

require "app.php";
require "config/database.php";
function incluírTemplate($template){
    include TEMPLATES_URL."${template}.php";
};

function debuguear($var){

    echo "<php>";

    var_dump($var);

    echo "</php>";

exit;
}



?>