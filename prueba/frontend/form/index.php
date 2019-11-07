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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/inicio.css">
    <title>Inicio</title>
</head>
<body>
    <div class="header">
        <div class="options">
            <h2><?php echo $user; ?></h2>
            <h3>Menú</h3>
            <form action="" method="post">
                <input type="submit" name="insert" value="Agregar">
                <input type="submit" name="edit" value="Editar">
                <input type="submit" name="delete" value="Eliminar">
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <a class="retun" href="../../index.php">Cerrar sesion</a>
            </form>
        </div>
        <?php
            if (isset($_POST['insert'])) {
                ?>
                    <div class="insert">
                        <form action="../../controllers/insert/insert_user.php" method="post" encype="multipart/form-data">
                            <h1>AGREGAR UN NUEVO USUARIO</h1>    
                            <p>Documento de identificacion</p>
                            <input type="number" name="identification" required>
                            <p>Nombre</p>
                            <input type="text" name="name" required>
                            <p>Apellidos</p>
                            <input type="text" name="last_name" required>
                            <p>Email</p>
                            <input type="email" name="email" required>
                            <!-- <p>Foto de usuario</p>
                            <input type="file" name="photo" accept="image/*"> -->
                            <br><input type="submit" value="Guardar" id="save">
                        </form>
                    </div>
                <?php
            }
            else {
                ?>
                    <div class="see_data"><center>
                        <table class="table">
                            <tr>
                                <!-- <td class="title">FOTO</td> -->
                                <td class="title" id="title_left">IDENTIFICACION</td>
                                <td class="title">NOMBRES</td>
                                <td class="title">APELLIDOS</td>
                                <td class="title">EMAIL</td>
                                <td class="title" id="title_right">OPCIONES</td>
                            </tr>
                            <?php
                                $select = $connection ->query ('SELECT * FROM users') or die ($connection ->error);
                                while ($row = $select ->fetch_assoc()){
                                    // <tr><td class='data'>". $row['photo'] ."</td>
                                    echo "<td class='data' id='identification'>". $row['identification'] ."</td>
                                    <td class='data'>". $row['name'] ."</td>
                                    <td class='data'>". $row['last_name'] ."</td>
                                    <td class='data'>". $row['email'] ."</td>
                                    <td class='data'>";
                                    if (isset($_POST['edit'])) {
                                        ?>
                                            <a href="edit_user.php?id=<?php echo $row['id_user'];?>&id_user=<?php echo $user_active; ?>"><img src="../../img/ii.jpg" alt="" width="120">Editar</a>
                                        <?php
                                    }
                                    elseif (isset($_POST['delete'])) {
                                        ?>
                                            <a href="../../controllers/delete/delete.php?id=<?php echo $row['id_user']; ?>"><img src="../../img/ii.jpg" alt="" width="120">Eliminar</a>
                                        <?php
                                    }
                                    else {
                                        ?>
                                            <a href="../../controllers/select/see_data.php"><img src="../../img/ii.jpg" alt="" width="120">Ver</a>
                                        <?php
                                    }
                                    echo "</td></tr>";
                                }
                            ?>
                        </table></center>
                    </div>
                <?php
            }
        ?>
    </div>
</body>
</html>