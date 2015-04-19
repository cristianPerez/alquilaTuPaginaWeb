<?php
class Conexion{
    public $conexion;
    public function conectar(){
        $this->conexion = mysql_connect('localhost', 'root', '');
        if (!$this->conexion){
            die('No pudo conectarse: ' . mysql_error());
        }
        mysql_select_db("alquilaTuPaginaWeb", $this->conexion);
    }
    public function consulta($sql){
        if (!$this->conexion){
            die('No existe una conexion');
        }
        else{
            $resultado = mysql_query($sql, $this->conexion);
            if (!$resultado) {
                die('No se obtuvo ningun resultado');
            exit;
            }
            return $resultado;
        }
    }
    public function desconectar(){
        mysql_close($this->conexion);
        $this->conexion=null;
        if ($this->conexion){
            die('No pudo cerrarse la conexion');
        }
    }
}