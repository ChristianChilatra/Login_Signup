<?php
require  'conn.php';

    if (!empty($_POST['doc'])) {
        $val = $conn->prepare('SELECT * FROM usuario left join perfil on usuario.mail = perfil.mail WHERE doc=:doc');
        $val->bindParam(':doc',$_POST['doc']);
        $val-> execute();
        $result = $val->fetch(PDO::FETCH_ASSOC);

        $messenge='';

        if (count($result) > 0  && ($result['doc'] == $_POST['doc'])) { 
            echo  " <article align = center >Usuario <strong>$result[nom]</strong> registrado
            con el usuario <strong>$result[user]</strong> <br> Se realiza envio de confirmacion al 
            correo registrado <strong>$result[mail]</strong> 
            <br> donde certifica su viaje a <strong>$result[dest]</strong> en nuestra Aerolinea 
            <strong>$result[arline]</strong></article>";

            header( "refresh:3;url=../public/Confirmacion.html" );
        } else {
            $message = 'No te encuentras registrado';
            echo '<script language="javascript">alert("'.$message.'");</script>';
            header( "refresh:0.1;url= ../public/Registro.html" );
        }
    }else{
        $message = 'Ingrese Documento';
        echo '<script language="javascript">alert("'.$message.'");</script>';
        header( "refresh:0.1;url= ../public/Confirmacion.html" );
    }

?>
