<?php
    include ('../../controllers/connection/connection.php');
    $id=$_GET['id'];
    $sql = $connection ->query("SELECT * FROM users WHERE id_user = '$id'") or die ("Error ". $connection ->error);
    while ($row = $sql->fetch_assoc()) {
        $identification=$row['identification'];
        $name=$row['name'];
        $last_name=$row['last_name'];
        $email=$row['email'];
    }
?>
<!DOCTYPE html>
<?php
    include ('../../controllers/connection/connection.php');
    $user_active = $_GET['id_user'];
    $sql = $connection ->query("SELECT * FROM users WHERE id_user = '$user_active'") or die ("Error ". $connection ->error);
    while ($row = $sql->fetch_assoc()) {
        $user = $row['name'] ." ". $row['last_name'];
    }
    if ($user_active == 0) {
        header("Location: ../../index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/inicio.css">
    <title>EDITAR USUARIO</title>
</head>
<body>
    <div class="options">
        <h2><?php echo $user; ?></h2>
        <a class="retun" href="index.php?id_user=<?php echo $user_active; ?> ">Volver</a>
    </div>
    <div class="edit">
        <form action="../../controllers/edit/edit.php" method="post">
            <h1>EDITAR USUARIO</h1>
            <p>Email</p>
            <input type="text" name="email" value="<?php echo $email; ?>" title="este caampo no se puede editar" readonly required>
            <p>Documento de identificacion</p>
            <input type="text" name="identification" value="<?php echo $identification; ?>" title="este caampo no se puede editar" readonly required>
            <p>Nombre</p>
            <input type="text" name="name" value="<?php echo $name; ?>" required>
            <p>Apellidos</p>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>" required>
            <p>Actual password</p>
            <input type="password" name="pass_old" required>
            <p>Nueva password</p>
            <input type="password" name="pass_new" required><br>
            <input type="submit" value="Guardar" id="save">
        </form>
    </div>
</body>
</html>