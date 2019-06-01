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
                        <label for="exampleInputPassword1">Potwierdź hasło</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Hasło" name="confirm_password">
                      </div>

                      <button type="submit" class="btn btn-primary">Wyślij</button>
                        <a href="login.php">Login</a>
                        test


<?php
require_once "config.php";
$email_err = $password_err = $confirm_password_err = $param_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //email validation
    if (empty(trim($_POST["email"]))) {
        $email_err = '<div class="alert alert-danger" role="alert">
                Proszę podać email.
              </div>';
        echo $email_err;
    } else {
        //prepare select
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            //bind vars to parameters
            $stmt->bind_param("s", $param_email);

            //set params
            $param_email = trim($_POST["email"]);

            //execution attempt
            if ($stmt->execute()) {
                //store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $email_err = "Ten email jest już zajęty.";
                    echo '<div class="alert alert-danger" role="alert">
                            Ten email jest już zajęty. <a href="remind.php">Przypomnij hasło</a>
                          </div>';

                } else {
                    $email = trim($_POST["email"]);
                }

            } else {
                echo "Błąd";
            }
        }

        //close statement
        $stmt->close();
    }

    //password validation
    if (empty(trim($_POST["password"]))) {
        $password_err = '<div class="alert alert-danger" role="alert">
                Proszę podać hasło.
              </div>';
        echo $password_err;

    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = '<div class="alert alert-danger" role="alert">
                Hasło musi mieć przynajmniej 6 znaków.
              </div>';
        echo $password_err;

    } else {
        $password = trim($_POST["password"]);
    }

    //confirm password validation
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = '<div class="alert alert-danger" role="alert">
                Proszę potwierdzić hasło.
              </div>';
        echo $confirm_password_err;

    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = '<div class="alert alert-danger" role="alert">
                    Hasła się nie zgadzają.
                  </div>';
            echo $confirm_password_err;
        }
    }

    //Check for errors before insertion
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        //prepare an insert
        $sql = "INSERT INTO users (email,password,active) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            //bind var to params

            $stmt->bind_param("ssi", $param_email, $param_password, $param_active);

            //set params

            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //hashes the password
            $param_active = 0;

            //execute
            if ($stmt->execute()) {

                //send a activation link

                $subject = "Email aktywacyjny sprzątando";
                $body = "Kliknij w link aby aktywować twoje konto: http://localhost/clean/activate.php?username=$email";

                mail($email, $subject, $body);

                //show success
                echo '<div class="alert alert-success" role="alert">
                        Rejestracja zakończona pomyślnie, link aktywujący twoje konto został wysłany na podany email
                      </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                Błąd przy rejestracji, proszę spróbować ponownie.
              </div>';
            }
        }

        //close
        $stmt->close();
    }

    //close database
    $mysqli->close();
}

?>
        </div>

    </form>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>