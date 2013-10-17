<?php
    require('conexion.php');
    if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $error1 = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $error2 = '<span class="error">Ingrese un email correcto</span>';
        }else if($_POST['asunto'] == ''){
            $error3 = '<span class="error">Ingrese un asunto</span>';
        }else if($_POST['mensaje'] == ''){
            $error4 = '<span class="error">Ingrese un mensaje</span>';
        }else{
            $dest = "kevinz@vde.com.mx"; //Email de destino
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $asunto = $_POST['asunto']; //Asunto
            $cuerpo = $_POST['mensaje']; //Cuerpo del mensaje
            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=utf-8' . "\r\n"; //
 
            if(mail($dest, '=?UTF-8?B?'.base64_encode($asunto).'?=', $cuerpo, $headers)){
 
                foreach($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                } 
 
                $sql = "INSERT INTO `cf` (`nombre`,`email`,`asunto`,`mensaje`) VALUES ('{$_POST['nombre']}','{$_POST['email']}','{$_POST['asunto']}','{$_POST['mensaje']}')";
                mysql_query($sql) or die(mysql_error()); 
 
                $result = '<div class="result_ok">Email enviado correctamente</div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                $_POST['asunto'] = '';
                $_POST['mensaje'] = '';
 
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje</div>';
            }
        }
    }
?>