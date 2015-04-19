<?php
include_once("./smtp_auth.php");
include ("../Conexion/Conexion.php");

/**
 * Description of WebService
 *
 * @author Cristian
 */
class GuardarInformacion {

    function registrarContacto() {
        
        $nombre = $_REQUEST["nombre"];
        $email = $_REQUEST["correo"];
        
        $sql = "INSERT INTO `contacto`(`nombre`, `correo`)"
                . "VALUES ('" . $nombre . "','" . $email . "')"
                . "ON DUPLICATE KEY UPDATE nombre = '" . $nombre . "';";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            //echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"] = "no";
            //echo json_encode($tabla);
        }


        $SMTPservidor = "mail.alquilatupaginaweb.com";
        $SMTPusuario = "contacto@alquilatupaginaweb.com";
        $SMTPclave = "6yhn7ujM";
        $SMTPpuerto = "25";

        $destinatario = "cperez354@gmail.com";
        $asunto = "Nuevo contacto alquila tu pagina";
        $body = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Alquilatupagina</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Contacto Alquila tu pagina</h1>
                                <img src='http://mitanash.com/images/others/logo.png'/>
                                    <p><strong>Contacto a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                            </center>
                            </div>
                        </BODY>
                    </html>";



        $remitente = "Alquila tu pagina web";
        $remitenteemail = "contacto@alquilatupaginaweb.com";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $smtp = new eSmtp("$SMTPservidor", $SMTPpuerto);
        $smtp->setAuth("$SMTPusuario", "$SMTPclave");
        $smtp->setFrom("$remitente", "$remitenteemail");
        $smtp->isHtml = 1;
        $smtp->addRecipient("", "$destinatario", "to");
        $smtp->setSubject("$asunto");
        $smtp->setBody("$body");
        $smtp->isDebug = 0;



        if ($smtp->connect()) {
            $success = $smtp->send();
            $smtp->disconnect();
        }

        $destinatario2 = "$email";
        $asunto2 = "Nuevo contacto alquilaTuPaginaWeb";
        $body2 = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Alquilatupagina</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Nuevo Contacto Alquilatupagina</h1>
                                <img src='http://mitanash.com/images/others/logo.png'/>
                                    <p>Hola gracias por contactarnos</p>
                                    <p>En menos de 24 horas nos</p>
                                    <p>Comunicaremos contigo, gracias por confiar en nosotros.</p>
                                    <p>Estos son tus datos:</p>
                                    <p><strong>Contacto a nombre de:</strong> $nombre </p>
                                    <p><strong>Email:</strong> $email</p>
                            </center>
                            </div>
                        </BODY>
                    </html>";



        $remitente2 = "ALQUILA TU PAGINA WEB";
        $remitenteemail2 = "contacto@alquilatupaginaweb";
        $headers2 = "MIME-Version: 1.0\r\n";
        $headers2 .= "Content-type: text/html; charset=UTF-8\r\n";


        $smtp2 = new eSmtp("$SMTPservidor", $SMTPpuerto);
        $smtp2->setAuth("$SMTPusuario", "$SMTPclave");
        $smtp2->setFrom("$remitente2", "$remitenteemail2");
        $smtp2->isHtml = 1;
        $smtp2->addRecipient("", "$destinatario2", "to");
        $smtp2->setSubject("$asunto2");
        $smtp2->setBody("$body2");
        $smtp2->isDebug = 0;



        if ($smtp2->connect()) {

            $success2 = $smtp2->send();

            $smtp2->disconnect();
        }


        if ($success && $success2) {

            $tabla["respuesta"] = "si";
        } else {

            $tabla["respuesta"] = "no";
        }
        echo json_encode($tabla);
    }

    function registrarContacto2() {
        
        $nombre = $_REQUEST["nombre"];
        $email = $_REQUEST["correo"];
        $asunto = $_REQUEST["asunto"];
        $mensaje = $_REQUEST["mensaje"];
        
        $sql = "INSERT INTO `contacto`(`nombre`, `correo`, `tipo_consulta`, `mensaje`)"
                . "VALUES ('" . $_REQUEST["nombre"] . "','" . $_REQUEST["correo"] . "','" . $_REQUEST["asunto"] . "','" . $_REQUEST["mensaje"] . "');";
        $conn = new Conexion();
        $conn->conectar();
        try {
            $res = $conn->consulta($sql);
            $conn->desconectar();
            $tabla["respuesta"] = "si";
            //echo json_encode($tabla);
        } catch (Exception $e) {
            $tabla["respuesta"] = "no";
            //echo json_encode($tabla);
        }
        
        $SMTPservidor = "mail.alquilatupaginaweb.com";
        $SMTPusuario = "contacto@alquilatupaginaweb.com";
        $SMTPclave = "6yhn7ujM";
        $SMTPpuerto = "25";

        $destinatario = "cperez354@gmail.com";
        $asunto = "Nuevo contacto alquila tu pagina";
        $body = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Alquilatupagina</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Contacto Alquila tu pagina</h1>
                                <img src='http://mitanash.com/images/others/logo.png'/>
                                    <p><strong>Contacto a nombre de:</strong> $nombre </p>
                                        <p><strong>Email:</strong> $email</p>
                                            <p><strong>Ausnto:</strong> $asunto</p>
                                                <p><strong>Mensaje:</strong> $mensaje</p>
                            </center>
                            </div>
                        </BODY>
                    </html>";



        $remitente = "Alquila tu pagina web";
        $remitenteemail = "contacto@alquilatupaginaweb.com";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $smtp = new eSmtp("$SMTPservidor", $SMTPpuerto);
        $smtp->setAuth("$SMTPusuario", "$SMTPclave");
        $smtp->setFrom("$remitente", "$remitenteemail");
        $smtp->isHtml = 1;
        $smtp->addRecipient("", "$destinatario", "to");
        $smtp->setSubject("$asunto");
        $smtp->setBody("$body");
        $smtp->isDebug = 0;



        if ($smtp->connect()) {
            $success = $smtp->send();
            $smtp->disconnect();
        }

        $destinatario2 = "$email";
        $asunto2 = "Nuevo contacto alquilaTuPaginaWeb";
        $body2 = "<html lang='es'>
                    <HEAD>
                            <TITLE>Contacto Alquilatupagina</TITLE>
                     </HEAD>
                        <BODY>
                            <div>
                            <center>
                            <h1>Nuevo Contacto Alquilatupagina</h1>
                                <img src='http://mitanash.com/images/others/logo.png'/>
                                    <p>Hola gracias por contactarnos</p>
                                    <p>En menos de 24 horas nos</p>
                                    <p>Comunicaremos contigo, gracias por confiar en nosotros.</p>
                                    <p>Estos son tus datos:</p>
                                    <p><strong>Nombre:</strong> $nombre</p>
                                        <p><strong>Email:</strong> $email</p>
                                            <p><strong>Ausnto:</strong> $asunto</p>
                                                <p><strong>Mensaje:</strong> $mensaje</p>
                            </center>
                            </div>
                        </BODY>
                    </html>";



        $remitente2 = "ALQUILA TU PAGINA WEB";
        $remitenteemail2 = "contacto@alquilatupaginaweb";
        $headers2 = "MIME-Version: 1.0\r\n";
        $headers2 .= "Content-type: text/html; charset=UTF-8\r\n";


        $smtp2 = new eSmtp("$SMTPservidor", $SMTPpuerto);
        $smtp2->setAuth("$SMTPusuario", "$SMTPclave");
        $smtp2->setFrom("$remitente2", "$remitenteemail2");
        $smtp2->isHtml = 1;
        $smtp2->addRecipient("", "$destinatario2", "to");
        $smtp2->setSubject("$asunto2");
        $smtp2->setBody("$body2");
        $smtp2->isDebug = 0;



        if ($smtp2->connect()) {

            $success2 = $smtp2->send();

            $smtp2->disconnect();
        }


        if ($success && $success2) {

            $tabla["respuesta"] = "si";
        } else {

            $tabla["respuesta"] = "no";
        }
        echo json_encode($tabla);
        
    }

}
