<?php
// Create and check connection
    $conn = new mysqli("localhost","root","","cleanapp") or die("Connect failed: %s\n". $conn -> error);

    $parameter = "";
    $q = $_GET['q'];
    if($q=="nazwami"){
        $parameter = "ad_name";
    } elseif ($q=="cenyr") {
        $parameter = "price";
    } elseif ($q=="cenym") {
        $parameter = "price DESC";
    } else {
        echo "Error: Zle przekazany parametr sortowania";
    }

    $query = "SELECT ad_id, ad_name, username, kitchen, bathroom, bedroom, garage, price FROM ogloszenia ORDER BY ".$parameter;


    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ad_id, $ad_name, $username, $kitchen, $bathroom, $bedroom, $garage, $price);
        // output card design
        while($stmt->fetch()) {


            echo '<div class="card og-card" style="width: 21rem;">
                    <div class="card-body">
                        <h5 class="card-title" id="card_title">'.$ad_name.'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'.$username.'</h6>
                    </div>    
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kuchnia: '.$kitchen.'</li>
                            <li class="list-group-item">Łazienki: '.$bathroom.'</li>
                            <li class="list-group-item">Sypialnie: '.$bedroom.'</li>
                            <li class="list-group-item">Garaż: '.$garage.'</li>
                        </ul>
                    <div class="card-body">
                        <p class="card-text">Cena: '.$price.'.00 zł</p>
                        <button type="button" class="btn btn-outline-primary open-modal-btn" data-toggle="modal" data-target="#exampleModal" data-id="'.$ad_id.'" style="float: right; margin-bottom: 20px;">Otwórz</button>
                    </div>
                    
                  </div>                                
                  ';
        }
        //nie działa zajmij sie tym jutro usuwa jeden card gdy sortujesz i nie sortuje 
    $stmt->close();

    $conn->close();
?>