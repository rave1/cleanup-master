<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
require_once "config.php";

$username = $_GET["username"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "UPDATE users SET active = '1' WHERE users.email = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        //bind var to params

        $stmt->bind_param("s", $param_email);

        //set params

        $param_email = $username;

        //execute
        if ($stmt->execute()) {

            //show success
            echo '<div class="alert alert-success" role="alert">
            Konto zostało aktywowane, możesz sie teraz zalogować. Nastąpi przekierowanie na strone logowania.
          </div>';
            sleep(1);
            header("login.php");
        } else {
            echo "error: " . $stmt->error;
        }
    }
    $mysqli->close();
}

?>

Test
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>