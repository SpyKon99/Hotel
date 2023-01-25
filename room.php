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
    
    if(isset($_SESSION['loggedin'])){
        echo '<input type="text" id="text2" value=" '.$_SESSION['id'].' " style="display:none;"></input>';
    }else{
      echo '<input type="text" id="text2" value="0" style="display:none;"></input>';
    }
    ?> 
    <script> 
      let roomid = $("#text").val();
      let userid = $("#text2").val();
      $.get(
            "http://localhost/Unipihotel/api/rooms/room.php",
            {
              id: roomid
            },
            function (response) {
                var json = JSON.parse(response);
                var type = Object.keys(json).join();
              
                var el = document.getElementById("room");
                var LOGGEDIN = <?php echo isset($_SESSION['loggedin']) ? "true":"false" ?>;
              
                el.innerHTML =  `<section class="py-5" id="roomCard">
                <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="${json.image}"/></div>
                <div class="col-md-6"><div class="small mb-1">Room id: ${json.id}</div>
                <h1 class="display-5 fw-bolder">${json.room}</h1>
                <div class="fs-5 mb-5">
                <span>${json.price}€</span>
                </div>
                <p class="lead">${json.description}</p>
                <div class="list-group" id="list">
                <a class="list-group-item"><strong><u>Υπηρεσιες</u></strong></a>`;
                var li = document.getElementById("list");

                if(json.airportPickup === 0){
                  li.innerHTML = li.innerHTML +`<a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-x"></i></a>`;
                }else{
                  li.innerHTML = li.innerHTML +`<a class="list-group-item">Παραλαβή από το αεροδρόμιο <i class="bi bi-check"></i></a>`;
                }
                if(json.breakfast === 0){
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Πρωινό <i class="bi bi-x"></i></a>`;
                }else{
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Πρωινό <i class="bi bi-check"></i></a>`;
                }
                if(json.parking === 0){
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Parking <i class="bi bi-x"></i></a>`;
                
                } else{
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Parking <i class="bi bi-check"></i></a>`;
                }
                if(json.wifi === 0){
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Wifi <i class="bi bi-x"></i></a>`;
                
                } else{
                  li.innerHTML = li.innerHTML + `<a class="list-group-item">Wifi <i class="bi bi-check"></i></a>`;
                }

                li.innerHTML = li.innerHTML +
                `</div>
                  <br/>
                <form>
                <div class="row">
                <div class="col">
                <label>Άφιξη</label>
                <input type="date" id="checkin" class="dateInput" required/>
                </div>
                <div class="col">
                <label>Αναχώρηση</label>
                <input type="date" id="checkout" class="dateInput"/>
                </div>
                <div class="col">
                <label>Άτομα</label>
                <select class="custom-select my-1 mr-sm-2" id="numberofguests">
                <option selected disabled>Επιλογή...</option>`;
                
                for(let i=1; i <= json.numberofguests ;i++){
                  var option = document.createElement("option");
                  option.text = i;
                  option.value = i;
                  var select = document.getElementById("numberofguests");
                  select.appendChild(option);
                  
                }
                `</select>
                </div>
                </div>
                </form>
                <br/>
                <div class="d-flex" id="buttonSec"></div>`;
                if(LOGGEDIN==true) {
                  li.innerHTML= li.innerHTML +`<button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="book('${json.id}',userid,'${json.price}')"><i class="bi-cart-fill me-1"></i>Κάνε κράτηση</button>`;
                }else{
                  li.innerHTML= li.innerHTML +`<button class="btn btn-outline-dark flex-shrink-0" type="button" data-toggle="modal" data-target="#exampleModal"><i class="bi-cart-fill me-1"></i>Κάνε κράτηση</button>`;
                }
                li.innerHTML = li.innerHTML +

                `</div>
                </div>
                </div>
                </section>`;
         
            }
        );
    </script>
     
  <br/><br/><br/>  
  <!-- load the footer -->
  <?php include_once 'footer.php';?>

  </body>
</html>
