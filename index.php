<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
//if ($_POST["submit"] == TRUE) {
    $numerator = +$_POST["numerator"];
    $denominator = +$_POST["denominator"];
}

class DivideByZeroException extends Exception
{
    public function __toString()
    {
        return "Can't divide by Zero";
    }
}


function divide($numerator, $denominator)
{
    if ($denominator === 0) {
        throw new DivideByZeroException();
    }
    return $numerator / $denominator;
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exception</title>
</head>
<body>
<form action="" method="post">
    <label for="numerator"> Numerator:</label>
    <input type="number" id="numerator" name="numerator" required> <br>
    <label for="denominator"> Denominator:</label>
    <input type="number" id="denominator" name="denominator" required> <br>
    <input type="submit" value="Divide" name="submit">
</form>
<p id="result">
    Result:
    <?php
    try {
        $result = divide($numerator, $denominator);
        echo $result;
    } catch (DivideByZeroException $e) {
        echo "<br>" . "Có lỗi xảy ra: " . $e;
    }
    ?>
</p>

</body>
</html>
