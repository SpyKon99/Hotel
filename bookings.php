<!DOCTYPE html>
<html>
  <head>
  </head>
  <body class ="bg-light">
    <!-- load the navbar menu -->
    <?php include_once 'navbar.php';?>

    <br/><br/>
    <?php
      $userid = $_SESSION['id'];
      echo '<input id="text" type="text" class="font-weight-bold" value="'.$userid.'" disabled style="display:none; "></input>
      <div id="bookings"></div>';

    ?>
   
    <script>
        let user = $("#text").val();
        // alert(user);
        $.get(
                "http://localhost/Unipihotel/api/bookings/reservations.php",
                {
                  userid: user
                },
                function (response) {
                  
                  var json = JSON.parse(response);
                  document.getElementById("bookings").outerHTML =  `<div class="rooms"><div class="container"><div class="row"><table class="table table-hover">
                         <thead>
                           <tr>
                             <th scope="col">Δωματιο(id)</th>
                             <th scope="col">Checkin</th>
                             <th scope="col">Checkout</th>
                             <th scope="col">Ατομα</th>
                             <th scope="col">Συνολο(€)</th>
                             <th scope="col">Ημερα κρατησης</th>
                           </tr>
                         </thead><tbody>`+

                         (json.reservations.map(reservation => `<tr>
                             <th scope="row"><a href="room.php?id=${reservation.roomid}">${reservation.roomid}</a></th>
                             <td>${reservation.checkin}</td>
                             <td>${reservation.checkout}</td>
                             <td>${reservation.numberofguests}</td>
                             <td>${reservation.totalprice}</td>
                             <td>${reservation.created}</td>
                            
                             </tr>`))+`</div></div></div></table>`;

                }
        );

    </script>
     
    <br/><br/><br/>

  <!-- load the footer -->
  <?php include_once 'footer.php';?>

  </body>
</html>