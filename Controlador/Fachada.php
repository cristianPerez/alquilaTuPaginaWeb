<?php

try {
    $clase = $_GET["clase"];
    $metodo = $_GET["metodo"];
    if (load($clase, $metodo)) {
        $obj = new $clase();
        echo $obj->$metodo($_POST);
    }
} catch (Exception $e) {
    echo json_encode(array("mensaje" => $e->getMessage()));
}

/**
 * Incluye en el documento la instancia de la clase.
 * @param type $class
 * @return boolean si el archivo existe
 * @throws Exception
 */
function load($clase, $metodo) {
    $load = "../Modelo/$clase.php";
    if (file_exists($load)) {
        include_once ($load);
        if (!method_exists($clase, $metodo)) {
            throw new Exception("No existe el metodo $metodo");
            return false;
        }
        return true;
    } else {
        throw new Exception("No existe la clase $clase");
        return false;
    }
}