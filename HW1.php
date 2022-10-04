<?php

//1
//$nap = date("l");
//$datum = date("Y/m/d");
//echo "A mai datum: $datum";
//echo "<br>";
//if ($nap == "Monday") {
//    echo "A mai nap hetfo";
//} elseif ($nap == "Tuesday") {
//    echo "A mai nap kedd";
//} elseif ($nap == "Wednesday") {
//    echo "A mai nap szerda";
//} elseif ($nap == "Thursday") {
//    echo "A mai nap csutortok";
//} elseif ($nap == "Friday") {
//    echo "A mai nap pentek";
//} elseif ($nap == "Saturday") {
//    echo "A mai nap szombat";
//} elseif ($nap == "Sunday") {
//    echo "A mai nap vasarnap";
//}

//2
// $elso_szam = $_POST['elso_szam'] ?? null;
// $masodik_szam = $_POST['masodik_szam'] ?? null;
// $muvelet = $_POST['muvelet'] ?? null;
// $eredmeny = '';
//     if (is_numeric($elso_szam) && is_numeric($masodik_szam)) {
//         switch ($muvelet) {
//             case  "Hozzaad":
//                 $eredmeny = $elso_szam + $masodik_szam;
//                 break;
//             case "Kivon":
//                 $eredmeny = $elso_szam - $masodik_szam;
//                 break;
//             case "Szoroz":
//                 $eredmeny = $elso_szam * $masodik_szam;
//                 break;
//             case "Eloszt":
//                 $eredmeny = $elso_szam / $masodik_szam;
//         }
// }

<body>
<div id="page-wrap">

    <form action="" method="post" id="form">
        <p>
            <input type="number" name="elso_szam" id="elso_szam" required="required" value="<?php echo $elso_szam; ?>" /> <b>Elso Szam</b>
        </p>
        <p>
            <input type="number" name="masodik_szam" id="masodik_szam" required="required" value="<?php echo $masodik_szam; ?>" /> <b>Masodik Szam</b>
        </p>
        <p>
            <input readonly="readonly" name="eredmeny" value="<?php echo $eredmeny; ?>"> <b>Eredmeny</b>
        </p>
        <input type="submit" name="muvelet" value="Hozzaad" />
        <input type="submit" name="muvelet" value="Kivon" />
        <input type="submit" name="muvelet" value="Szoroz" />
        <input type="submit" name="muvelet" value="Eloszt" />
    </form>
</div>
</body>
</html>

//3
echo "<table border='2', bgcolor='rgba(180,40,110,0.2)'><br />";

for ($sor = 1; $sor <= 10; $sor ++) {
    echo "<tr>";

    for ($oszlop = 1; $oszlop <= 10; $oszlop ++) {
        echo "<td> $oszlop / $sor<br>", number_format((float)($oszlop / $sor), 2, '.', ''), "</td>";
    }

    echo "</tr>";
}

echo "</table>";
?>