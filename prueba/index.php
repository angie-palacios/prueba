<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body><center>
    <div class="header">
        <form action="controllers/select/validation.php" method="post">
            <h1 class="title">LOGIN</h1>
            <p>Email</p>
            <input type="text" name="email" id="email" autocomplete="off" required><br>
            <p>Password</p>
            <input type="password" name="pass" id="pass" autocomplete="off" required><br>
            <input type="submit" value="Send" id="send">
        </form>
    </div></center>
</body>
</html>