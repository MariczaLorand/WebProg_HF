<?php
$url1 = 'https://fakestoreapi.com/products/';
$url2 = 'https://fakestoreapi.com/carts/user/';

function fetchJSON($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res_json = curl_exec($ch);
    curl_close($ch);
    return json_decode($res_json, true);
}

function getProductPriceById($url, $productId) {
    $productJSON = fetchJSON($url.$productId);
    return $productJSON['price'];
}

function sumPriceProducts($userCartsJSON) {
    $sumPrice = 0;
    foreach ($userCartsJSON as $cart) {
        foreach ($cart['products'] as $product) {
            global $url1;
            $sumPriceProduct = (getProductPriceById($url1, $product['productId']) * $product['quantity']);
            $sumPrice += $sumPriceProduct;
        }
    }
    return $sumPrice;
}

if (isset($_POST['query']) && isset($_POST['userId'])) {
    $userCartsJSON = fetchJSON($url2.$_POST['userId']);
    echo 'summed price: ' . sumPriceProducts($userCartsJSON);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW8</title>
</head>
<body>
    <h1>user kosár összérték számláló</h1>
    <form action=<?php echo $_SERVER['PHP_SELF']?> method="post">
        <label for="userId">user id: </label>
        <input type="text" name="userId"/>
        <input type="submit" name="query" value="lekérdez"/>
    </form>
</body>
</html>

<!--<pre>-->
<!--    --><?php
//        print_r($res);
//    ?>
<!--</pre>-->
