<?php

    $firstName = $lastName = $email = "";
    $firstNameErr = $lastNameErr = $emailErr = $attendErr = $fileErr = $termsErr = $submitErr = "";
    $valid_formats = array("application/pdf");

if (isset($_POST['submit'])) {

        if (empty($_POST['firstName'])) {
            $firstNameErr = "First name is required";
        } else {
            $firstName = test_input($_POST['firstName']);
        }

        if (empty($_POST['lastName'])) {
            $lastNameErr = "Second name is required";
        } else {
            $lastName = test_input($_POST['lastName']);
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST['email'];
        }

        if (!isset($_POST['attend'])) {
            $attendErr =  "Select at least one event";
        }

        if (!isset($_POST['terms'])) {
            $termsErr =  "Terms agreement required";
        }

        if ($_FILES['abstract']['error'] != 0) {
            $fileErr = "sth went wrong with the file upload process";
        } else if ($_FILES['abstract']['name'] == "") {
            $fileErr = "select a file";
        } else if (!in_array($_FILES['abstract']['type'], $valid_formats)) {
            $fileErr = "invalid file";
        } else if (!$_FILES['abstract']['size'] < 3145728) {
            $fileErr = "too big file size";
        } else {
            echo "successfull file upload";
        }
    }

    function test_input($data) {
        return htmlspecialchars($data);
    }

?>

<h3>Online conference registration</h3>

<form method="post" action="">
    <label for="firstName"> First name:
        <input type="text" name="firstName" value="<?php echo $firstName; ?>">
        <span class="error">*<?php echo $firstNameErr; ?></span>
    </label>
    <br><br>
    <label for="lastName"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastName; ?>">
        <span class="error">*<?php echo $lastNameErr; ?></span>
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">*<?php echo $emailErr; ?></span>
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
        <span class="error"><?php echo $attendErr; ?></span>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
        <span class="error"><?php echo $fileErr; ?></span>
    </label>
    <br><br>
    <input type="checkbox" name="terms">I agree to terms & conditions.<br>
    <span class="error"><?php echo $termsErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

<?php

if (isset($_POST['submit'])) {

    echo "<h2>input data: <h2>";

    echo "submitted data:" .
        "<br>first name: " . $firstName .
        "<br>last name: " . $lastName .
        "<br>email: " . $email .
        "<br>events: ";

    foreach ($_POST['attend'] as $item) {
        echo "<br>$item";
    }

    echo "<br>t-shirt size: " . $_POST['tshirt'] .
        "<br>uploaded file: " . $_FILES['abstract']['name'];
}

?>