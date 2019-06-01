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
        <div class="formularz"> 
            <p> Tytuł ogłoszenia: </p>
            <div class="row">
               <div class="col-lg-6">
                   <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fas fa-file"></i></span>
                       </div>
                   <input type="text" class="form-control" placeholder="Nazwa ogłoszenia" aria-label="Title" aria-describedby="basic-addon1">
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
                    <input type="text" class="form-control" placeholder="Nazwa Użytkownika" aria-label="Username" aria-describedby="basic-addon1">
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
                    <input type="text" class="form-control" placeholder="Miejscowość" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                        </div>
                    <input type="text" class="form-control" placeholder="Ulica i nr domu" aria-label="Username" aria-describedby="basic-addon1">
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
                            <input type="text" class="form-control" placeholder="Numer Telefonu" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="mail" class="form-control" placeholder="Adres e-mail" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                </div>
            </div>

        
            <p> Wybierz pokoje do wykonania usługi: </p>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" name="p-kuchnia" aria-label="Checkbox for following text input">
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
                           <input type="checkbox" name="p-lazieniki" aria-label="Checkbox for following text input">
                         </div>
                       </div>
                       <div class="form-control">
                               Łazienka
                       </div>
                       <select class="custom-select" id="p-lazieniki-ile">
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
                                <input type="checkbox" name="p-sypialnia" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                            <div class="form-control">
                                    Sypialnia
                            </div>
                            <select class="custom-select" id="p-sypialnia-ile">
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
                                        <input type="checkbox" name="p-garaż" aria-label="Checkbox for following text input">
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
                                <input type="checkbox" aria-label="Checkbox for following text input">
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
                                    <input type="checkbox" aria-label="Checkbox for following text input">
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
                                    <input type="checkbox" aria-label="Checkbox for following text input">
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
                            <select class="custom-select" id="inputGroupSelect01">
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
                          <input type="text" class="form-control" placeholder="Cena" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                  </div>
              </div>
     

              <div class="row">
                  <div class="col-lg-6">
                      <input type="submit" class="btn btn-light submit-btn" value="Zatwierdz"></input>
                  </div>
              </div>

              
        </div>
    </div>
        





    <!-- INCLUDE BOOTSTRAP JS ECT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>