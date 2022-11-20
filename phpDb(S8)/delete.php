<?php
include 'listazas.php';
include 'connection.php';

if ($GLOBALS['conn']->connect_error) {
    die("Connection failed: " . $GLOBALS['conn']->connect_error);
}

//$sql = "DELETE FROM hallgatok WHERE id = {$_GET['id']}";
$sql = "DELETE FROM hallgatok WHERE id = ?";

//if ($GLOBALS['conn']->query($sql)) {
//    echo "success";
//} else {
//    echo "something wrong: " . $GLOBALS['conn']->error;
//}
if ($stmt = $GLOBALS['conn']->prepare($sql)) {
    $stmt->bind_param('s', $_GET['id']);
    $stmt->execute();
}

$GLOBALS['conn']->close();
header("Location: listazas.php");
