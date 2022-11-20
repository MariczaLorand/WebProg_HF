<?php
include 'listazas.php';
include 'connection.php';

if (isset($_POST['submit'])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];
    $id = $_POST['id'];

//    $sql = "UPDATE hallgatok SET nev = '$nev', szak = '$szak', atlag = '$atlag' WHERE id = '$id'";
    $sql = "UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? WHERE id = ?";

//    if ($res = $GLOBALS['conn']->query($sql)) {
//        echo "success";
//    } else {
//        echo "something went wrong: " . $GLOBALS['conn']->error;
//    }

    if ($stmt = $GLOBALS['conn']->prepare($sql)) {
        $stmt->bind_param('ssss', $nev, $szak, $atlag, $id);
        $stmt->execute();
    }

    $GLOBALS['conn']->close();
    header("Location: listazas.php");
} else {
//    $sql = "SELECT * FROM hallgatok WHERE id= " .$_GET['id'];
    $sql = "SELECT * FROM hallgatok WHERE id = ?";

//    $res = $GLOBALS['conn']->query($sql);
    if ($stmt = $GLOBALS['conn']->prepare($sql)) {
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
    }

    $GLOBALS['conn']->close();
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <p>Nev: <input type="text" name="nev" value="<?php echo $row['nev'] ?>"/></p>
    <p>Szak: <input type="text" name="szak" value="<?php echo $row['szak'] ?>"/></p>
    <p>Atlag: <input type="number" name="atlag" value="<?php echo $row['atlag'] ?>"/></p>
    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
    <p><input type="submit" name="submit"/></p>
</form>