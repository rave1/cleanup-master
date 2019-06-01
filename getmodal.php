<?php
// Create and check connection
    $conn = new mysqli("localhost","root","","cleanapp") or die("Connect failed: %s\n". $conn -> error);

    $query = "SELECT ad_name, username, city, adress, telephone, email, kitchen, bathroom, bedroom, garage, payment, price FROM ogloszenia WHERE ad_id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ad_name, $username, $city, $adress, $telephone, $email, $kitchen, $bathroom, $bedroom, $garage, $payment,$price);
    $stmt->fetch();
    $stmt->close();

    $hajs="";
    if($payment==0){
        $hajs = "Gotówka";
    } else {
        $hajs = "Przelewem";
    }

    echo '
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">'.$ad_name.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">Adres:</div>
                    <div class="col-lg-6 offset-lg-0">'.$city.' <br/> <small>'.$adress.'</small></div>
            </div>
                <br/>
            <div class="row">
                <div class="col-lg-6">
                    Pomieszczenia do sprzątania:
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small>Kuchnia: '.$kitchen.'</small></li>
                        <li class="list-group-item"><small>Łazienki: '.$bathroom.'</small></li>
                        <li class="list-group-item"><small>Sypialnie: '.$bedroom.'</small></li>
                        <li class="list-group-item"><small>Garaż: '.$garage.'</small></li>
                    </ul>
                </div>
                <div class="col-lg-6 offset-lg-0">
                    Dodatkowe usługi do wykonania: 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small>Mycie okien: wartość</small></li>
                        <li class="list-group-item"><small>Mycie podłóg: wartość</small></li>
                        <li class="list-group-item"><small>Pranie zasłon: wartość</small></li>
                    </ul>
                </div>                     
            </div>
                <br/>
            <div class="row">
                <div class="col-lg-6">Zleceniodawca:</div>
                <div class="col-lg-6 offset-lg-0">'.$username.'</div>
            </div>
                <br/>
            <div class="row">
                <div class="col-lg-4">Kontakt:</div>
                <div class="col-lg-8 offset-lg-0">Email: '.$email.' <br/> <small>Nr telefonu: '.$telephone.'</small></div>
            </div>
                <br/>
            <div class="row">
                <div class="col-lg-6">Wynagrodzenie:</div>
                <div class="col-lg-6 offset-lg-0">'.$price.'<br/> <small>'.$hajs.'</small></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
    </div>
'
?>