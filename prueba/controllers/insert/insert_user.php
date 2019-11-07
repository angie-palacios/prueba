<?php
    include ('../connection/connection.php');
    // if ($_FILES['photo'] ==null) {
    //     $photo = "sin_photo.jpg";
    // }else {
    //     $photo=$_FILES['photo'] ['tmp_name'];
    //     copy ($photo, "../../img/". $identification . ".jpg");
    // }
    $identification=$_POST['identification'];
    $name=$_POST['name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $password = md5($identification."*");
    $count = 0;
    $count2 = 0;
    $validation_user = $connection ->query ("SELECT * FROM users WHERE identification = '$identification'") or die ("Error ". $connection ->error);
    while ($row = $validation_user ->fetch_assoc()) {
        $count ++;
    }
    $validation_user2 = $connection ->query ("SELECT * FROM users WHERE email = '$email'") or die ("Error ". $connection ->error);
    while ($row2 = $validation_user2 ->fetch_assoc()) {
        $count2 ++;
    }
    if ($count == 0 || $count2 == 0) {
        if ($count2 >= 1) {
            echo "<script type='text/javascript'>
            alert ('Este email ya existe');
            location = '../../frontend/form/index.php';
            </script>";
        }
        else {
            $sql = $connection ->query ("INSERT INTO users (id_user, identification, name, last_name, email, password) VALUE (NULL, '$identification', '$name', '$last_name', '$email', '$password')") or die ($connection->error);
            echo "<script type='text/javascript'>
            alert ('El usuario se ha registrado correctamente');
            location = '../../frontend/form/index.php';
            </script>";
        }
        
    }
    else {
        echo "<script type='text/javascript'>
        alert ('Este documento ya existe');
        location = '../../frontend/form/index.php';
        </script>";
    }
?>