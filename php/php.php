<?php 
   $conexion = mysqli_connect("sql305.infinityfree.com", "	if0_37464139", "UEs3385ZmbsJa", "if0_37464139_tutorial");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta formulario</title>
    <style type="text/css">
    body {
        font-size: 24px;
        font-family: sans-serif;
        background-color: #eafaf1;
        margin: 1em 4em;
    }
    h1 {
        text-align: center;
        font-size: 2em;
    }
    </style>
</head>
<body>
<?php
$destinatario = $_POST["e-mail"]; // dirección "real" destinataria del correo

$asunto ="Ia Respuesta";

// el mensaje de correo enviado será en formato HTML, construyamoslo poco a poco...
$cuerpo="<style>\n";
$cuerpo.="ul li { color: green; }\n";
$cuerpo.="</style>\n";

$cuerpo.="<ul>\n";
$cuerpo.="<li><u>Nombre completo</u>: " . $_POST["nombre"] . "</li>\n";
$cuerpo.="<li><u>E-mail</u>: " . ( empty($_POST["e-mail"]) ? "-" : $_POST["e-mail"] ) . "</li>\n";
$cuerpo.="<li><u>telefono:</u>: " . ( empty($_POST["telefono"]) ? "-" : $_POST["telefono"] ) . "</li>\n";
$cuerpo.="</ul>\n";

// Las 2 primeras cabeceras indicarán que el mensaje de correo será formato HTML
$cabeceras="MIME-Version: 1.0\r\n";
$cabeceras.="Content-type: text/html; charset=utf-8\r\n";
$cabeceras.="From: Inteligencia.Artificial@gmail.com\r\n"; // necesario añadir una dirección de correo x10hosting para que la función mail() funcione bien en el servivio de alojamiento x10hosting ---quiere evitar envios de correos spam desde sus servidores---
$cabeceras.=( empty($_POST["e-mail"]) ?"":"Reply-to: " . $_POST["e-mail"] . "\r\n");

$enviado_exito=mail($destinatario,$asunto,$cuerpo,$cabeceras);
if($enviado_exito)
    print("<h1>¡Correo electrónico enviado con éxito!</h1>");
else
    print("<h1>¡Correo electrónico no ha podido ser enviado!</h1>");

print($cuerpo);
?>
</body>
</html>