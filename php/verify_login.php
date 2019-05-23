<?php

require  'conn.php';

session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: ../public/home.html');
}else{
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $val = $conn->prepare('SELECT  id,user, pass FROM perfil WHERE user=:usuario');
        $val->bindParam(':usuario',$_POST['user']);
        $val-> execute();
        $result = $val->fetch(PDO::FETCH_ASSOC);


        $messenge='';

        if (count($result) > 0 && password_verify($_POST['pass'], $result['pass'])) {
            $_SESSION['user_id'] = $result['id'];
            header( "location: verify_login.php" );
        } else {
            $message = 'Credenciales incorrectas';
            echo '<script language="javascript">alert("'.$message.'");</script>';
            header( "refresh:0.1;url= ../index.html" );
        }
    }else{
        $message = 'Complete campos vacios';
        echo '<script language="javascript">alert("'.$message.'");</script>';
        header( "refresh:0.1;url= ../index.html" );
    }
}

?>
