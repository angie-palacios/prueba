<?php
    include ('../connection/connection.php');
    $id_user = $_GET['id'];
    $sql = $connection ->query("DELETE FROM users WHERE id_user = '$id_user'") or die ($connection ->error);
    echo "<script type='text/javascript'>
    alert ('Ha elininado el usuario Correctamente');
    location = '../../frontend/form/index.php';
    </script>";
?>