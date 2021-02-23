<!DOCTYPE html>
<html lang="ES">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="author" value="Alex Santana"/>
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form name='datos' action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='POST'>
        <label for="username">User</label>
        <input type="text" name="usuario" required/><br><br>

        <label for="passcode">Password</label>
        <input type="text" name="contra" required/><br><br>

        <input type="submit" value="Iniciar sesión"/>
    </form>
</body>
</html>


