<?php
if(isset($_POST['ContactoEnviar']) && !empty($_POST['name']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['message'])){
    
    // Datos enviados desde el formulario modal
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $message= $_POST['message'];
    /* Enviar email al administrador */
    $to     = 'fc.70203828@gmail.com';
    $subject= 'Solicitud de contacto enviada';
    
    $htmlContent= '
    <h4>La solicitud de contacto se ha enviado a Franklin, los detalles se detallan a continuación.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Nombres:</th><td>'.$name.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
            <th>Mensaje:</th><td>'.$message.'</td>
        </tr>
    </table>';
    
    // Establecer encabezado de tipo de contenido para enviar Email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Encabezados adicionales
    $headers .= 'De: Franklin<fc.70203828@gmail.com>' . "\r\n";
    
    // Enviar el Email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'bien';
    }else{
        $status = 'Error';
    }
    
    // Estado de la salida del correo
    echo $status;die;
}