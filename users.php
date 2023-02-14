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
		
		<div class="d-flex justify-content-center"><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal2" style="border:none;"><i class="bi bi-plus"></i></button></div>
		<br/>
		
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Όνομα</th>
                    <th scope="col">Επίθετο</th>
                    <th scope="col">Χώρα</th>
                    <th scope="col">Πόλη</th>
                    <th scope="col">Διεύθυνση</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Τηλέφωνο</th>
                    <th scope="col">Κωδικός</th>
                    <th scope="col">Ρόλος</th>
                    <th scope="col">Επεξεργσία</th>
                    <th scope="col">Διαγραφή</th>
                </tr>
            </thead>
            <tbody>
                    
               
		<?php
           $sql = "SELECT * FROM users";
           $result = $conn->query($sql);


           if ($result->num_rows > 0) {
            while($document = $result->fetch_assoc()) {
                echo '<tr>
                <th scope="row">'.$document['id'].'</th>
                <td>'.$document['firstname'].'</td>
                <td>'.$document['lastname'].'</td>
                <td>'.$document['country'].'</td>
                <td>'.$document['city'].'</td>
                <td>'.$document['address'].'</td>
                <td>'.$document['email'].'</td>
                <td>'.$document['username'].'</td>
                <td>'.$document['phone'].'</td>
                <td>'.$document['password'].'</td>
                <td>'.$document['role'].'</td>
                <td><button onclick="editUser(\''.$document['id'].'\')" class="btn btn-warning" style="border:none;"><i class="bi bi-pencil"></i></button></td>
                <td><button onclick="deleteUser(\''.$document['id'].'\')" class="btn btn-danger" style="border:none;"><i class="bi bi-trash"></i></button></td>
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