<?php
    include ('../connection/connection.php');
    $email = $_POST['email'];
    $identification = $_POST['identification'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $pass_new = md5($_POST['pass_new']);
    $pass_old = md5($_POST['pass_old']);
    $validation_user = $connection ->query ("SELECT * FROM users WHERE identification = '$identification'") or die ("Error ". $connection ->error);
    while ($row = $validation_user ->fetch_assoc()) {
        $password_old = $row['password'];
    }
    if ($password_old == $pass_old) {
        $sql = $connection ->query ("UPDATE users SET name='$name', last_name='$last_name', password='$pass_new' WHERE identification= '$identification'") or die ($connection ->error);
        echo "<script type='text/javascript'>
        alert ('El usuario se ha editado correctamente');
        location = '../../frontend/form/index.php';
        </script>";
    }
    else {
        echo "<script type='text/javascript'>
            alert ('la contraseña actual es incorrecta');
            location = '../../frontend/form/index.php';
            </script>";
    }
?>