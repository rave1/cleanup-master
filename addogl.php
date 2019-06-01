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
                      <a class="nav-link" href="#">Start <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="browse.php">Przeglądaj ogłoszenia</a>
                    </li>
                    <li class="nav-item active">
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
            
        <!-- FORMULARZ -->
    <form action="" method="POST">
        <div class="formularz"> 
            <p> Tytuł ogłoszenia: </p>
            <div class="row">
               <div class="col-lg-6">
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fas fa-file"></i></span>
                       </div>
                   <input type="text" class="form-control" placeholder="Nazwa ogłoszenia" aria-label="Title" aria-describedby="basic-addon1" name="ad_name">
               </div>
               </div>
           </div>

            <p> Do zrealizowania zgłoszenia musisz podać swoją nazwę uzytkownika </p>
             <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control" placeholder="Imię i nazwisko" aria-label="Username" aria-describedby="basic-addon1" name="name">
                </div>
                </div>
            </div>

            <p> Adres dotyczący ogłoszenia: </p>
             <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span>
                        </div>
                    <input type="text" class="form-control" placeholder="Miejscowość" aria-label="Username" aria-describedby="basic-addon1" name="city">
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                        </div>
                    <input type="text" class="form-control" placeholder="Ulica i nr domu" aria-label="Username" aria-describedby="basic-addon1" name="adress">
                </div>
                </div>
            </div>

            <p> Dane kontaktowe: </p>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Numer Telefonu" aria-label="Username" aria-describedby="basic-addon1" name="telephone">
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="mail" class="form-control" placeholder="Adres e-mail" aria-label="Username" aria-describedby="basic-addon1" name="email">
                            </div>
                </div>
            </div>

        
            <p> Wybierz pokoje do wykonania usługi: </p>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="kitchen" value="1">
                              </div>
                            </div>
                                <div class="form-control">
                                    Kuchnia
                                </div>
                          </div>
                </div>

               <div class="col-lg-6">
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                         <div class="input-group-text">
                           <input type="checkbox" aria-label="Checkbox for following text input" name="bathroom">
                         </div>
                       </div>
                       <div class="form-control">
                               Łazienka
                       </div>
                       <select class="custom-select" id="p-lazieniki-ile" name="ile_lazienek">
                               <option selected> Ile? </option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                       </select>
                   </div>
              </div>
                
                <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="bedroom">
                              </div>
                            </div>
                            <div class="form-control">
                                    Sypialnia
                            </div>
                            <select class="custom-select" id="p-sypialnia-ile" name="ile_sypialni">
                                    <option selected> Ile? </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="garage" value="1">
                                      </div>
                                    </div>
                                        <div class="form-control">
                                            Garaż
                                        </div>
                                  </div>
                    </div>

        
            <p> Wybierz dodatkowe usługi do wykonania: </p>     
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="window" value="1">
                              </div>
                            </div>
                                <div class="form-control">
                                    Mycie okien
                                </div>
                          </div>
                </div>

                <div class="col-lg-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="podloga" value="1">
                                  </div>
                                </div>
                                    <div class="form-control">
                                        Mycie podłóg
                                    </div>
                              </div>
                </div>

                <div class="col-lg-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="pranie_zaslon" value="1">
                                  </div>
                                </div>
                                    <div class="form-control">
                                        Pranie zasłon
                                    </div>
                        </div>
                </div>
            
          


                <p> Forma płatności: </p>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Wybierz</label>
                        </div>
                            <select class="custom-select" id="inputGroupSelect01" name="payment_method">
                              <option value="1">Gotówka</option>
                              <option value="2">Płatność przelewem</option>
                        </select>
                    </div>
                </div>
            </div>    
                
              <div class="row">
                  <div class="col-lg-6">
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-money-bill-wave"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Cena" aria-label="Username" aria-describedby="basic-addon1" name="price">
                      </div>
                  </div>
              </div>
     

              <div class="row">
                  <div class="col-lg-6">
                      <input type="submit" class="btn btn-light submit-btn" value="Zatwierdz">
                  </div>
              </div>

              
        </div>
        
        </form>
        <?php
    require "config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $field_value = new stdClass();

        foreach ($_POST as $key => $value) {
            # code...
            $field_value->$key =$value;
        }
        echo $field_value->podloga;

        $sql = "INSERT INTO ogloszenia (ad_id,  ad_name, username, city, adress,telephone,email,kitchen,bathroom,bedroom,garage,window,podloga,pranie_zaslon, payment, price) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ssssisiiiiiiiii", $field_value->ad_name,$field_value->name,$field_value->city,$field_value->adress,$field_value->telephone, $field_value->email,$field_value->kitchen, $field_value->ile_lazienek,$field_value->ile_sypialni, $field_value->garage, $field_value->window, $field_value->podloga, $field_value->pranie_zaslon, $field_value->payment_method, $field_value->price);

            if ($stmt->execute()){
                $stmt->store_result();
            }else{
                echo $stmt->error;
            }

        }else{
            echo " błąd po prepare";
        }

        // $sql1 = "INSERT INTO ogloszenia (podloga) VALUES (?)";
        // if($stmt = $mysqli->prepare($sql1)){
        //     $stmt->bind_param("i", $field_value->podloga);

        //     if($stmt->execute()){
        //         $stmt->store_result();
        //     }else {
        //         echo "jd blad";
        //     }
        // }


        //    $missing = array();
        //    foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
        //    if (count($missing) > 0) {
        //     echo '<div class="alert alert-danger" role="alert">
        //                     Proszę wypełnić wszystkie pola
        //                   </div>';
        //                   exit;
        //     } else {
        //     unset($missing);

        //     $ad_name = $_POST["ad_name"];
        //     $name =  $_POST["name"];
        //     $city =  $_POST["city"];
        //     $address = $_POST["adress"];
        //     $phone = $_POST["telephone"];
        //     $email =  $_POST["email"];
        //     $kitchen =  $_POST["kitchen"];
        //     $bathroom =  $_POST["bathroom"];
        //     $number_of_bathrooms =  $_POST["ile-lazienek"];
        //     $bedroom =  $_POST["bedroom"];
        //     $number_of_bedrooms = $_POST["ile-sypialni"];
        //     $garage =  $_POST["garage"];
        //     $window =  $_POST["window"];
        //     $washing =  $_POST["pranie-zaslon"];
        //     $payment =  $_POST["payment-method"];
        //     $price =  $_POST["cena"];


            
    
        }
        ?>
    </div>
        





    <!-- INCLUDE BOOTSTRAP JS ECT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>