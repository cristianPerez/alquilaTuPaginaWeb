<?php
include ("../Conexion/Conexion.php");
/**
 * Description of WebService
 *
 * @author Cristian
 */
class GuardarInformacion{
    
    
 function registrarContacto() {
        $sql = "INSERT INTO `contacto`(`nombre`, `correo`)"
                . "VALUES ('" . $_REQUEST["nombre"]. "','".$_REQUEST["correo"]."')"
                ."ON DUPLICATE KEY UPDATE nombre = '" . $_REQUEST["nombre"] . "';";
        
        /*$sql = "INSERT INTO `contacto`( `nombre`, `correo`) VALUES ('carlos','ejemplo@hotmail.com')";*/
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"]="no";
            echo json_encode($tabla);
        }
    }
}