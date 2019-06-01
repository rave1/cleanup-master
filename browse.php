<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INCLUDE BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- INCLUDE FANCY ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- LOCAL CSS -->
    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sprzątando</title>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    echo "jd";
}
?>
    <div class="container">

        <!-- UPPER PASEK -->
        <div class="row">
            <div class="col-lg-2">
                <small>Pomoc i kontakt</small>
            </div>
            <div class="col-lg-8 align-c">
                <small>Takie allegro ale ze sprzątaniem</small>
            </div>
        </div>
        
        <!-- BOX Z NAPISEM -->
        <div class="row">
            <div class="col-lg-2 logo-theme-box">
            </div>
            <div class="col-lg-8 logo-theme-box">
                    <h2> Sprzątando </h2>
            </div>
            <!-- tymczasowo -->
            <div class="col-lg-2 logo-theme-box-ic ">
                        <img src="icons/user-solid.svg" class="user-ic">
                        <button type="button" id="login-btn" class="btn btn-link">Zaloguj się</button>
            </div>
        </div>    

        <!-- NAWIGACJA -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Start<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="browse.php">Przeglądaj ogłoszenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addogl.php">Dodaj ogłoszenie</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
        </nav>

        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sortuj według
                </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Nazwy ogłoszenia (a-z)</a>
                        <a class="dropdown-item" href="#">Ceny (rosnąco)</a>
                        <a class="dropdown-item" href="#">Ceny (malejąco)</a>
                    </div>
            </div>
            </div>
        </div>


        <div class="row" id="oglo">
                <div class="card-columns">
                <?php
                    require_once "config.php";
                    // Create and check connection
                    

                    $query = "SELECT ad_name, username, kitchen, bathroom, bedroom, garage, price FROM ogloszenia";
                    $result = $mysqli->query($query);


                    if ($result->num_rows > 0) {

                        // output card design
                        while($row = $result->fetch_assoc()) {
                

                            echo '<div class="card og-card" style="width: 21rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row["ad_name"].'</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">'.$row["username"].'</h6>
                                    </div>    
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Kuchnia: '.$row["kitchen"].'</li>
                                            <li class="list-group-item">Łazienki: '.$row["bathroom"].'</li>
                                            <li class="list-group-item">Sypialnie: '.$row["bedroom"].'</li>
                                            <li class="list-group-item">Garaż: '.$row["garage"].'</li>
                                        </ul>
                                    <div class="card-body">
                                        <p class="card-text">Cena: '.$row["price"].'.00 zł</p>
                                        <a href="#" class="card-link" style="float: right; margin-bottom: 20px;">Otwórz</a>
                                    </div>
                                    
                                  </div>';
                        }
                    } else {
                        echo "0 results";
                    }

                    $mysqli->close();
                    ?>
                </div>
        </div>

        
    </div>


    <!-- INCLUDE BOOTSTRAP JS ECT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>