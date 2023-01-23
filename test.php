<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipihotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//  Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM bookings WHERE userid= $userid AND roomid= $roomid AND complete= 0 ";
$result = $conn->query($sql);

$ssql = "SELECT * FROM rooms WHERE id= $roomid";
$rresult = $conn->query($ssql);

if ($result->num_rows > 0) {
  while($room = $result->fetch_assoc()) {
    echo'<div class="container" id="cart">
      <div class="py-5 text-center">
          <h2>Φορμα πληρωμης</h2>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Το καλαθι σας</span>
            <span class="badge badge-secondary badge-pill">'.$room['numberofstays'].'</span>
          </h4>
          <ul class="list-group mb-3 sticky-top">';
          if ($rresult->num_rows > 0) {
            while($rroom = $rresult->fetch_assoc()) {
              echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Ονομα δωματιου</h6>
                <small class="text-muted">'.$rroom['roomName'].'</small>
              </div>
              <span class="text-muted">'.$rroom['price'].'€</span>
            </li>';
            }
          }  
            

            echo'<li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Διανυκτερευσεις</h6>
                <small class="text-muted">Απο '.$room['checkin'].' εως '.$room['checkout'].'</small>
              </div>
              <span class="text-muted">'.$room['numberofstays'].'</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Συνολο (EUR)</span>
              <strong>'.$room['totalprice'].'€</strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
                        <form class="needs-validation" novalidate="">
                            <h4 class="mb-3">Πληρωμη</h4>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Ονομα κατοχου</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                    <small class="text-muted">Οπως αναγραφεται στη καρτα</small>
                                    <div class="invalid-feedback"> Υποχρεωτικο </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Αριθμος καρτας</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                    <div class="invalid-feedback"> Υποχρεωτικο </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Ημ/ια ληξης</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                    <div class="invalid-feedback"> Υποχρεωτικο </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                    <div class="invalid-feedback"> Υποχρεωτικο </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="complete(\''.$room['roomid'].'\',\''.$_SESSION['id'].'\')" >Ολοκληρωση αγορας</button>
                        </form>
                    </div>
                </div>
            </div>';

  }  
}
?>