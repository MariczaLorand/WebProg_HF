<?php
session_start();

if(isset($_POST['submit'])) {
    if (isset($_SESSION['gszam'])) {
        logika($_POST['talalgatas'], $_SESSION['gszam']);
    } else {
        $_SESSION['gszam'] = rand(1, 10);
        logika($_POST['talalgatas'], $gszam);
    }
} else {
    echo "first load<br>";
}

function logika($szam, $gszam): void
{
    if ($szam > $gszam) {
        echo "bigger";
    } else if ($szam < $gszam) {
        echo "smaller";
    } else {
        echo "got it";
        unset($_SESSION['gszam']);
    }
}
?>

<form method="POST" action="">
    Melyik számra gondoltam 1 és 10 között?
    <label>
        <input name="talalgatas" type="text">
    </label>
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>
