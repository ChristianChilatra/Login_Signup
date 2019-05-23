<?php

    require'conn.php';

    $messenge='';

    if (!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['mail'])) {
        # code...
        if ($_POST['pass'] == $_POST['pass2']) {
            # code...
            $query = ('INSERT INTO  perfil (user, pass,mail)  VALUES (:user, :pass,:mail)');
            $val= $conn->prepare($query);
            $val->bindParam(':user',$_POST['user']);
            $val->bindParam(':mail',$_POST['mail']);
            $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $val->bindParam(':pass',$password);

            if ($val->execute()) {
                $message = 'Registro completado';
                echo '<script language="javascript">alert("'.$message.'");</script>';
                header( "refresh:0.1;url= ../index.html" );
              } else {
                $message = 'Lo siento, algo salio mal';
                echo '<script language="javascript">alert("'.$message.'");</script>';
              }
        }
        else{
            $message = 'Contraseñas no coinciden';
            echo '<script language="javascript">alert("'.$message.'");</script>';
            header( "refresh:0.1;url= ../public/signup.html" );
        }
    } else {
        # code...
        $message='completa campos vacios';
        echo '<script language="javascript">alert("'.$message.'");</script>';
        header( "refresh:0.1;url= ../public/signup.html" );
    }

?>