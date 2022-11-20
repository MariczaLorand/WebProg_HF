<?php
//session_start();

include 'listazas.php';
include 'connection.php';

if (isset($_POST['submit'])) {
    if (!empty($_POST['nev'] && $_POST['szak'] && $_POST['atlag'])) {

//        $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('" . $_POST['nev'] . "','" . $_POST['szak'] . "', '" . $_POST['atlag'] . "')";
        $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)";

//        if ($GLOBALS['conn']->query($sql)) {
//            echo "success";
//        } else {
//            echo "something wrong: " . $GLOBALS['conn']->error;
//        }
        if($stmt = $GLOBALS['conn']->prepare($sql)) {
            $stmt->bind_param('sss', $_POST['nev'], $_POST['szak'], $_POST['atlag']);
            $stmt->execute();
        }

        $GLOBALS['conn']->close();
        header("Location: listazas.php");
    } else {
        header("Location: listazas.php");
    }
}

?>
<form action="" method="post">
 <p>Nev: <input type="text" name="nev" /></p>
 <p>Szak: <input type="text" name="szak" /></p>
 <p>Atlag: <input type="number" name="atlag" /></p>
 <input type="submit" name="submit"/>
</form>






