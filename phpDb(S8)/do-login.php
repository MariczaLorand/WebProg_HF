<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'egyetem';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$sql = 'SELECT id, password FROM users WHERE username = ?';

if (!isset($_POST['username'], $_POST['password'])) {
    exit('username and password are required');
}

if ( $stmt = $con->prepare($sql) ) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // $result = $stmt->get_result(); -> $result->num_rows
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if ($_POST['password'] === $password) {
            session_regenerate_id();
            $_SESSION['loggedIn'] = true;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['name'] . '!';
            header("Location: listazas.php");
        } else {
            echo 'incorrect username or password';
        }
    } else {
        echo 'incorrect username or password';
    }

    $stmt->close();
}

