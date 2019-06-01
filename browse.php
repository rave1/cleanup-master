<!DOCTYPE html>
<html lang="en">
<head>
    <!-- INCLUDE BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- INCLUDE FANCY ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- LOCAL CSS -->
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sprzątando</title>
</head>
<body>
    <div class="container">

        <!-- UPPER PASEK -->
        <div class="row">
            <div class="col-lg-2">
                <a href="sasxca.html" style="color: black"><small>Pomoc i kontakt</small></a>
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
                   
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
        </nav>

    

        <!-- SORTOWANIE i FILTROWANIE -->
        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-9">
                <button type="button" class="btn" style="background: white" id="filtr-btn">Filtrowanie</button>
            </div>

            <div class="col-lg-3 ">
                <select class="custom-select" onchange="sortuj(this.value)">
                        <option selected value=""> Sortuj według </option>
                        <option value="nazwami">Nazwy ogłoszenia (a-z)</option>
                        <option value="cenyr">Ceny (rosnąco)</option>
                        <option value="cenym">Ceny (malejąco)</option>
                </select>
            </div>
        </div>

        <div class="row" id="filtrowanie">
            <form>
                <div class="row">
                    <div class="form-group col-md-1">
                    <label for="inputEmail4">Cena:</label>
                    <input type="text" class="form-control" value="0" id="cenaod">
                    </div>
                    <div class="col-md-1">
                    <p style="margin-top:40px; margin-left: 10px"> od - do </p>
                    </div>
                    <div class="form-group col-md-1">
                    <input type="text" class="form-control" id="cenado" value="9999" style="margin-top: 35px">
                    </div>
                </div>
                <p>Usługi:</p>
                <div class="col-lg-4" style='margin-top: 15px'>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" name="filtr-okna" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                                <div class="form-control">
                                    Mycie okien
                                </div>
                            </div>
                </div>
                <div class="col-lg-4">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input type="checkbox" name="filtr-podlogi" aria-label="Checkbox for following text input">
                                    </div>
                                </div>
                                    <div class="form-control">
                                        Mycie podłóg
                                    </div>
                                </div>
                </div>
                <div class="col-lg-4">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input type="checkbox" name="filtr-zaslony" aria-label="Checkbox for following text input">
                                    </div>
                                </div>
                                    <div class="form-control">
                                        Pranie zasłon
                                    </div>
                        </div>
                </div>

                <div class="col-lg-2 offset-lg-3" style="padding: 10px;">
                    <button type="submit" class="btn btn-primary">Filtruj</button>
                </div>
            </form>
        </div>


        <div class="row" id="oglo">
                <div class="card-columns"id="oglo">
                <?php
                    // Create and check connection
                    $conn = new mysqli("localhost","root","","cleanapp") or die("Connect failed: %s\n". $conn -> error);

                    $query = "SELECT ad_id, ad_name, username, kitchen, bathroom, bedroom, garage, price FROM ogloszenia ORDER BY ad_id";
                    $result = $conn->query($query);


                    if ($result->num_rows > 0) {

                        // output card design
                        while($row = $result->fetch_assoc()) {
                

                            echo '<div class="card og-card" style="width: 21rem;">
                                    <div class="card-body">
                                        <h5 class="card-title" id="card_title">'.$row["ad_name"].'</h5>
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
                                        <button type="button" class="btn btn-outline-primary open-modal-btn" data-toggle="modal" data-target="#exampleModal" data-id="'.$row["ad_id"].'" style="float: right; margin-bottom: 20px;">Otwórz</button>
                                    </div>
                                    
                                  </div>                                
                                  ';
                        }

                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    ?>
                </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content"id="modalcontainer">
                
                <!-- TUTAJ WLATUJE RESPONSE Z AJAXA NA MODAL  -->

                </div>
            </div>
        </div>
        
    </div>

<script>
                $(document).ready(function(){
                    $('#filtr-btn').click(function(){
                        $('#filtrowanie').toggle(500);
                    });
                    
                    $(".open-modal-btn").click(function () {
                    var my_id_value = $(this).data('id');
                        showOgl(my_id_value);
                    });
                
                });


                
                function sortuj(wybrane){
                let xhttp;
                    if(wybrane==""){
                        return;
                    } 
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                             $('#oglo').html("");
                             $('#oglo').html(this.responseText);
                        }
                    };
                    
                xhttp.open("GET", "sortogl.php?q="+wybrane, true);
                xhttp.send();
                }


                //funkcja do wyświetlania modalu
                function showOgl(str) {
                let xhttp;    
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                             $("#modalcontainer").html(this.responseText);
                        }
                    };
                    
                xhttp.open("GET", "getmodal.php?q="+str, true);
                xhttp.send();
                }

</script>

    <!-- INCLUDE BOOTSTRAP JS ECT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>