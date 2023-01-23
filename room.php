<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/room.css">
    <script src="js/room.js"></script>

  </head>
  <body class ="bg-light">
    <!-- load the navbar menu -->
    <?php include_once 'navbar.php';?>
    <?php
      $roomId = $_SERVER['QUERY_STRING'];
      $id = substr($roomId,3);
      echo '<input type="text" id="text" value=" '.$id.' " style="display:none;"></input>
            <div id="room"> </div>';
    ?> 
    <script>
      // let roomid = $("#text").val();
      // $.get(
      //       "http://localhost/Unipihotel/api/rooms/room.php",
      //       {
      //         id: roomid
      //       },
      //       function (response) {
      //           var json = JSON.parse(response);
      //           var type = Object.keys(json).join();
              


      //           document.getElementById("room").innerHTML =  `<section class="py-5" id="roomCard">`+
      //           `<div class="container px-4 px-lg-5 my-5">`+
      //           `<div class="row gx-4 gx-lg-5 align-items-center">
      //           <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="${json.image}"/></div>
      //           <div class="col-md-6"><div class="small mb-1">Room id: ${json.id}</div>
      //           <h1 class="display-5 fw-bolder">${json.room}</h1>
      //           <div class="fs-5 mb-5">
      //           <span>${json.price}€</span>
      //           </div>
      //           <p class="lead">${json.description}</p>
      //           <div class="list-group">
      //           <a class="list-group-item"><strong><u>Υπηρεσιες</u></strong></a>`+
                // if(${json.breakfast} == 0){
                // <a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-x"></i></a>
                // } 
                // else{
                // <a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-check"></i></a>
                // }
                // if(${json.breakfast} == 0){
                // <a class="list-group-item">Πρωινό <i class="bi bi-x"></i></a>
                // } else{
                // <a class="list-group-item">Πρωινό <i class="bi bi-check"></i></a>
                // }
                // if(${json.parking} == 0){
                // <a class="list-group-item">Parking <i class="bi bi-x"></i></a>
                // } else{
                // <a class="list-group-item">Parking <i class="bi bi-check"></i></a>
                // }
                // if(${json.wifi} == 0){
                // <a class="list-group-item">Wifi <i class="bi bi-x"></i></a>
                // } else{
                // <a class="list-group-item">Wifi <i class="bi bi-check"></i></a>
                // }
                // `</div>
                //   <br/>
                // <form>
                // <div class="row">
                // <div class="col">
                // <label>Άφιξη</label>
                // <input type="date" id="checkin" class="dateInput" required/>
                // </div>
                // <div class="col">
                // <label>Αναχώρηση</label>
                // <input type="date" id="checkout" class="dateInput"/>
                // </div>
                // <div class="col">
                // <label>Άτομα</label>
                // <select class="custom-select my-1 mr-sm-2" id="numberofguests">
                // <option selected disabled>Επιλογή...</option>
                // for($i=1; $i <= ${json.numberOfGuests} ;$i++){
                //   <option value=.$i.>.$i.</option>
                // }
                // </select>
                // </div>
                // </div>
                // </form>
                // <br/>
                // <div class="d-flex">`;
                // if(isset($_SESSION[loggedin])) {
                // <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="book(\${json.id}\,\.$_SESSION[id].\,\${json.price}\)">
                // }else{
                // <button class="btn btn-outline-dark flex-shrink-0" type="button" data-toggle="modal" data-target="#exampleModal">
                // }
                // `<i class="bi-cart-fill me-1"></i>
                // Κάνε κράτηση
                // </button>
                // </div>
                // </div>
                // </div>
                // </div>
                // </section>`;
         
        //     }
        // );
</script>

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

    $roomId = $_SERVER['QUERY_STRING'];
    $id = substr($roomId,3);

    $sql = "SELECT * FROM rooms WHERE id= $id";
    $result = $conn->query($sql);
    
   
   
    if ($result->num_rows > 0) {
        // output data of each row
        while($room = $result->fetch_assoc()) {
        echo'<section class="py-5" id="roomCard">';
        echo'    <div class="container px-4 px-lg-5 my-5">';
        echo'        <div class="row gx-4 gx-lg-5 align-items-center">';
        echo'            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="'.$room['image'].'"/></div>';
        echo'            <div class="col-md-6">';
        echo'                <div class="small mb-1">Room id: '.$room['id'].'</div>';
        echo'                <h1 class="display-5 fw-bolder">'.$room['roomName'].'</h1>';
        echo'                <div class="fs-5 mb-5">';
        echo'                    <span>'.$room['price'].'€</span>';
        echo'                </div>';
        echo'                <p class="lead">'.$room['description'].'</p>';
        echo'                <div class="list-group">';
        echo'                <a class="list-group-item"><strong><u>Υπηρεσιες</u></strong></a>';
        if($room['airportPickup'] == 0){
          echo'                <a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-x"></i></a>';
        } else{
          echo'                <a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-check"></i></a>';
        }
        if($room['breakfast'] == 0){
          echo'                <a class="list-group-item">Πρωινό <i class="bi bi-x"></i></a>';
        } else{
          echo'                <a class="list-group-item">Πρωινό <i class="bi bi-check"></i></a>';
        }
        if($room['parking'] == 0){
          echo'                <a class="list-group-item">Parking <i class="bi bi-x"></i></a>';
        } else{
          echo'                <a class="list-group-item">Parking <i class="bi bi-check"></i></a>';
        }
        if($room['wifi'] == 0){
          echo'                <a class="list-group-item">Wifi <i class="bi bi-x"></i></a>';
        } else{
          echo'                <a class="list-group-item">Wifi <i class="bi bi-check"></i></a>';
        }
        echo'                </div>';
        echo '<br/>';
        echo '<form>';
        echo '              <div class="row">';
        echo '                      <div class="col">';
        echo '                      <label>Άφιξη</label>';
        echo '                      <input type="date" id="checkin" class="dateInput" required/>';
        echo '                      </div>';
        echo '                      <div class="col">';
        echo '                      <label>Αναχώρηση</label>';
        echo '                      <input type="date" id="checkout" class="dateInput"/>';
        echo '                      </div>';
        echo '                      <div class="col">';
        echo '                      <label>Άτομα</label>';
        echo '                      <select class="custom-select my-1 mr-sm-2" id="numberofguests">';
        echo '                          <option selected disabled>Επιλογή...</option>';
                                        for($i=1; $i <= $room['numberOfGuests']; $i++){
                                          echo '<option value='.$i.'>'.$i.'</option>';
                                        }      
        echo '                        </select>';
        echo '                      </div>';
        echo '                    </div>';
        echo '</form>';
        echo '<br/>';                                
        echo'                <div class="d-flex">';
        if(isset($_SESSION['loggedin'])) {
            echo'                    <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="book(\''.$room['id'].'\',\''.$_SESSION['id'].'\',\''.$room['price'].'\')">';
        }else{
            echo'                    <button class="btn btn-outline-dark flex-shrink-0" type="button" data-toggle="modal" data-target="#exampleModal">';
        }
        echo'                        <i class="bi-cart-fill me-1"></i>';
        echo'                        Κάνε κράτηση';
        echo'                    </button>';
        echo'                </div>';
        echo'            </div>';
        echo'        </div>';
        echo'    </div>';
        echo'</section>';
       
        }
      } else {
        echo "0 results";
      }
      $conn->close();
?>      
  <br/><br/><br/>  
  <!-- load the footer -->
  <?php include_once 'footer.php';?>

  </body>
</html>
