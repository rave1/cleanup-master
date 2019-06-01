<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<html>
<body>
<form action="" method="POST">
        <div class="container d-flex flex-column justify-content-center login">
                <div class="form-group">
                        <label for="exampleInputEmail1">Adres Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">Srogie hacjendy przed tobą</small>
                </div>
                <div class="form-group">
                        <label for="exampleInputPassword1">Hasło</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Hasło" name="password">
                        <small id="emailHelp" class="form-text text-muted"><a href="forgot.php">Przypomnij hasło</a></small>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Wyślij</button>
                </div>
    </form>
<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: frontpage.php");
    exit;
}

$email = $password = "";
$email_err = $password_err = "";

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //email validation
    if (empty(trim($_POST["email"]))) {
        $email_err = '<div class="alert alert-danger" role="alert">
            Proszę podać email.
          </div>';
        echo $email_err;
    } else {
        $email = trim($_POST["email"]);
    }

    //password validation
    if (empty(trim($_POST["password"]))) {
        $password_err = '<div class="alert alert-danger" role="alert">
                        Proszę podać hasło.
                      </div>';
        echo $password_err;

    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a activation validation
        $sql = "SELECT id, email,active, password FROM users WHERE email = ?";

    }
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_email);

        // Set parameters
        $param_email = $email;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();
            //bind result to vars
            $stmt->bind_result($id, $result_email, $result_active, $hashed_password);
            if ($stmt->fetch()) {
                if ($result_active == 1) {
                    // Check if email exists, if yes then verify password
                    if ($stmt->num_rows == 1) {

                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: frontpage.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = '<div class="alert alert-danger" role="alert">
                                                        Hasło jest niepoprawne.
                                                </div>';
                            echo $password_err;

                        }

                    } else {
                        // Display an error message if username doesn't exist
                        $username_err = '<div class="alert alert-danger" role="alert">
                                                Nie ma takiego maila. <a href="index.php"> Zarejestruj się</a>
                                        </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                                            Konto nie zostało aktywowane
                                    </div>';
                }

            }

        } else {
            echo "Błąd";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
}

?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>