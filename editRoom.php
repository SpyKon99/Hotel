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
		<br/>
		<?php
        
        include_once('db_conn.php');
    
        $roomid = $_SERVER['QUERY_STRING'];
        $roomid = substr($roomid,3);
        // echo $userid;
       
        $sql = "SELECT * FROM rooms WHERE id='".$roomid."' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($document = $result->fetch_assoc()) {
                echo '
                        <form action="FinalEditRoom.php" id="form2" method="post" style="padding-right:30%; padding-left:30%;">
                            <div class="form-group">								
                                <input type="text" class="form-control" name="roomid" id="roomid" value="'.$document['id'] .'" readonly> 
                            </div>
							<div class="form-group">								
								<input required type="text" class="form-control" id="roomName" name="roomName" value="'.$document['roomName'] .'">	
							</div>
							<div class="form-group">								
                                <textarea class="form-control" id="description" name="description" rows="5">'.$document['description'] .'</textarea>
							</div>
							<div class="form-group">								
								<input required type="text" class="form-control" id="image" name="image" value="'.$document['image'] .'">	
							</div>
                            <div class="form-group">								
								<input onkeypress="return /[0-9]/i.test(event.key)" required type="text" class="form-control" id="price" name="price" value="'.$document['price'] .'">	
							</div>
							<div class="form-group">								
								<input onkeypress="return /[0-9]/i.test(event.key)" required type="text" class="form-control" id="numberOfGuests" name="numberOfGuests" value="'.$document['numberOfGuests'] .'">	
							</div>
							<div class="form-group">								
								<select name="airportPickup[]" class="form-control">
									<option selected disabled>airportPickup: '.$document['airportPickup'] .'</option>
									<option value="0">Όχι</option>
									<option value="1">Ναι</option>

								</select>
							</div>
							<div class="form-group">								
								<select  name="breakfast[]" class="form-control">
									<option selected disabled>breakfast: '.$document['breakfast'] .'</option>
									<option value="0">Όχι</option>
									<option value="1">Ναι</option>
								</select>							
							</div>
							<div class="form-group">								
								<select  name="parking[]" class="form-control">
									<option selected disabled>parking: '.$document['parking'] .'</option>
									<option value="0">Όχι</option>
									<option value="1">Ναι</option>
								</select>							
							</div>
                            <div class="form-group">								
								<select  name="wifi[]" class="form-control">
									<option selected disabled>wifi: '.$document['wifi'] .'</option>
									<option value="0">Όχι</option>
									<option value="1">Ναι</option>
								</select>							
							</div>						
							<div class="text-center">
								<button required type="submit" class="btn  btn-block text-white" id="createbtn" style="background-color: #ff9900;">Δημιουργία</button>							
							</div>	
						</form>';
            }
        }
    
        ?>		
	</div>
    <br/><br/><br/>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
