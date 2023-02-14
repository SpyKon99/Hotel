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

		<title>Unipihotel.gr</title>

	</head>
	<body class="bg-light">
		<!-- example 6 - center on mobile -->
		
		<?php include_once('adminNavbar.php')?>
		<?php include_once('db_conn.php')?>
		
		
        <div class="container">
		    <div class="text-center ">
		    	<h1 class="mt-5 " style="font-family: fantasy; "><a href="admin.php" style="text-decoration: none; color:#ff9900;">Σελίδα Διαχείρισης Unipihotel</a></h1>
		    </div>
            <?php
                if(isset($_SESSION['loggedin'])==FALSE) {
                    echo'<div class="text-center ">
		    	        <h1 class="mt-5 ">Για να συνεχίσετε θα πρέπει να συνδεθείται</h1>
		            </div>';
                }else {
					echo '<div class="row">';
						echo'<div class="col-sm-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title"><i class="bi bi-people"></i> Χρήστες</h5>
								<p class="card-text">Συνολικοί χρήστες: ';
									
										$sql = "SELECT COUNT(*) as total FROM users";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											while($document = $result->fetch_assoc()) {
												echo ($document['total']);
											}

										}
								
								echo'</p>
								<a href="users.php" class="btn btn-primary">Περισσότερα</a>
							</div>
						</div>
					</div>';
					echo'<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><i class="bi bi-shop"></i> Δωμάτια</h5>
							<p class="card-text">Συνολικά δωμάτια: ';
								
									$sql = "SELECT COUNT(*) as total FROM rooms";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										while($document = $result->fetch_assoc()) {
											echo ($document['total']);
										}

									}
								
				   			echo'</p>
							<a href="adminRooms.php" class="btn btn-primary">Περισσότερα</a>
						</div>
					</div>
				</div>
			</div>';
			echo'<br/>
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><i class="bi bi-file-bar-graph"></i> Κρατήσεις</h5>
							<p class="card-text">Συνολικές κρατήσεις: ';
								
									$sql = "SELECT COUNT(*) as total FROM bookings";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										while($document = $result->fetch_assoc()) {
											echo ($document['total']);
										}

									}
							
				   			echo'</p>
							<a href="adminBookings.php" class="btn btn-primary">Περισσότερα</a>
						</div>
					</div>
				</div>
			</div>	

        </div>';
				}
            ?>
			
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>