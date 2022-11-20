<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="login">
    <h1>Login</h1>
    <form action="do-login.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" id="username" required>
        </label>
        <label for="password">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" id="password" required>
        </label>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>