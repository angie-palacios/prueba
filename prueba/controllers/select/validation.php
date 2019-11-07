<?php
    include ('../connection/connection.php');
    session_start();
    $email = stripslashes($_POST['email']);
    $pass = stripslashes(md5($_POST['pass']));
    $count = 0;
    $sql = $connection ->query("SELECT * FROM users WHERE email = '$email'") or die ("Error ". $connection ->error);
    while ($row = $sql->fetch_assoc()) {
        $count ++;
        $id_user = $row['id_user'];
        $user = $row['email'];
        $password = $row['password'];
    }
    if ($count == 1) {
        if ($password == $pass) {
            $_SESSION['user_active'] = $id_user;
            $user_active = $_SESSION['user_active'];
            echo "<script type='text/javascript'>
            alert ('Welcome');
            location = '../../frontend/form/index.php?id_user=". $user_active. "';
            </script>";
        }
        else {
            echo "<script type='text/javascript'>
            alert ('La contraseña es incorrecta');
            location = '../../index.php';
            </script>";
        }
    }
    else {
        echo "<script type='text/javascript'>
            alert ('El email no es valido');
            location = '../../index.php';
            </script>";
    }
?>