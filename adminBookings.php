<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap Icons-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>Unipihotel.gr</title>
	</head>
	
	<body class="bg-light">
		
		<?php include_once('adminNavbar.php')?>
        <?php include_once('db_conn.php')?>
		
		<br/>
		
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Χρήστης</th>
                    <th scope="col">Δωμάτιο</th>
                    <th scope="col">Checkin</th>
                    <th scope="col">Checkout</th>
                    <th scope="col">Άτομα</th>
                    <th scope="col">Ημέρες Διαμονής</th>
                    <th scope="col">Σύνολο</th>
                    <th scope="col">Δημιουργία</th>
                </tr>
            </thead>
            <tbody>
                    
               
		<?php
           $sql = "SELECT * FROM bookings WHERE complete=1 ";
           $result = $conn->query($sql);


           if ($result->num_rows > 0) {
            while($document = $result->fetch_assoc()) {
                echo '<tr>
                <th scope="row">'.$document['id'].'</th>
                <td>'.$document['userid'].'</td>
                <td>'.$document['roomid'].'</td>
                <td>'.$document['checkin'].'</td>
                <td>'.$document['checkout'].'</td>
                <td>'.$document['numberofguests'].'</td>
                <td>'.$document['numberofstays'].'</td>
                <td>'.$document['totalprice'].'</td>
                <td>'.$document['created'].'</td>
                </tr>';
            }
            echo'</tbody>
            </table>';
           }        
        ?>	
  
	</div>
	<script>
		function deleteUser(id){
			var userid = id;
			alert("Επιτυχής διαγραφή του χρήστη "+userid);
			window.location.href = "deleteUser.php?id=" + userid;
		}
		function editUser(id){
			var userid = id;

			// alert("Hey "+userid);
			window.location.href = "editUser.php?id=" + userid;
		}
	</script>

   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>