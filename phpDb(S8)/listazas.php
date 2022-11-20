<?php
session_start();

include 'connection.php';

$sql = "SELECT * FROM hallgatok";

if($res = $GLOBALS['conn']->query($sql)) {
    if ($res->num_rows > 0) {
        echo "<h1>Hello {$_SESSION['name']}!</h1>";
        echo "<button><a href='bevitel.php'>Uj hallgato</a></button>";
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nev</th>";
        echo "<th>Szak</th>";
        echo "<th>Atlag</th>";
        echo "<th>Update</th>";
        echo "<th>Delete</th>";
        echo "</tr>";
        while ($row = $res->fetch_array())
        {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nev']."</td>";
            echo "<td>".$row['szak']."</td>";
            echo "<td>".$row['atlag']."</td>";
            echo "<td><a href='frissit.php?id=".$row['id']."'>update</a>";
            echo "<td><a href='delete.php?id=".$row['id']."'>delete</a>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
    } else {
        echo "No matching records are found.";
    }
}

$GLOBALS['conn']->close();

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        a {
            text-decoration: none !important;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
</html>
