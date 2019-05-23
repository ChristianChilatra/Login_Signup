<?php

require 'conn.php';

$dates_post = array(

"doc" => $_POST['doc'],
"nom" => $_POST['nom'],
"edad" => $_POST['edad'],
"mail" => $_POST['mail'],
"fec_nac" => $_POST['fec_nac'],
"dest" => $_POST['dest'],
"acomp" => $_POST['acomp'],
"arline" => $_POST['arline']
);

function verify_dates($dates_post){
    foreach ($dates_post as $key => $value) {
        if (!empty($value)) {
            continue;
        } else {
            return false;
        }
    }
    return true;
}

        $message='';
        $verify = $conn->prepare('SELECT doc FROM usuario');
        $verify-> execute();
        $result = $verify->fetch(PDO::FETCH_ASSOC);

if (verify_dates($dates_post)) {
    if ($result['doc'] != $dates_post["doc"]) {
        $query= ("INSERT INTO usuario (doc,nom,edad,mail,fec_nac,dest,acomp,arline) 
        VALUES (".$dates_post['doc'].",".$dates_post['nom'].",".$dates_post['edad'].",".$dates_post['mail'].",
        ".$dates_post['fec_nac'].",".$dates_post['dest'].",".$dates_post['acomp'].",".$dates_post['arline'].")");
        $var= $conn->prepare($query);
        if ($var->execute()) {
            $message = 'Registro completo';
           echo '<script language="javascript">alert("'.$message.'");</script>';
           header( "refresh:;url= ../public/registro.html" );
        } else {
            $message = 'Error al registrarse';
            echo '<script language="javascript">alert("'.$message.'");</script>';
            header( "refresh:;url= ../public/registro.html" );
        }
    } else {
        $message = 'Ya te encuentras registrado';
            echo '<script language="javascript">alert("'.$message.'");</script>';
            header( "refresh:0.1;url= ../public/registro.html" );
    }
} else {
    echo '<script language="javascript">alert("Complete todos los campos");</script>';
    header( "refresh:0.1;url= ../public/registro.html" );
}
?>