<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/rooms.css">
    <script src="js/rooms.js"></script>

  </head>
  <body class ="bg-light">
    <!-- load the navbar menu -->
    <?php include_once 'navbar.php';?>
    <?php
    $key = $_SERVER['QUERY_STRING'];
    $new = str_replace('%20',' ', $key);

    echo '<div class="text-center">
            <label>Αποτελέσματα για:</label>
            <input id="text" type="text" class="font-weight-bold" value="'.$new.'" disabled style="border:0"></input>
          </div>
          ';

    echo '<div id="result"></div>';
?>      
<script>
  let text = $("#text").val();
  $.get(
        "http://localhost/Unipihotel/api/rooms/search.php",
        {
            roomname: text
        },
        function (response) {
           
            var json = JSON.parse(response);
            document.getElementById("result").innerHTML =  `<div class="rooms"><div class="container"><div class="row">`+
          
             (json.rooms.map(room => `   <div class="col-sm mt-3">
                               <div class="card bg-white text-dark">
                              <div class="card-body">
                                       <div class="imageclass">
                                           <img class="room-img mr-5" src="${room.image}" width="410" height="210">
                                        </div>
                                        <div class="room-info ml-5">
                                           <h4 class="card-title room-name" id="room-name">${room.room}</h4>
                                           <p class="card-description"> ${room.description}</p>

                                         <h5 class="card-room-price"><b> ${room.price}€</b><small>/μέρα</small></h5>
                                         <h5 class="card-numberOfGuests"><small>Για εως ${room.numberofguests} άτομα</small></h5>
                                        <button onclick="book('${room.id}')" type="button" id="bookBtn" class="btn btn-book btn-block text-white mt-3 cartBtn">Κάνε κράτηση</button>
                                    </div>	
                              </div>
                              </div>
                          </div>`))+`</div></div></div>`;            
        }
    );
</script>
  <br/><br/><br/>  
  <!-- load the footer -->
  <?php include_once 'footer.php';?>

  </body>
</html>
