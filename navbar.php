<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap Icons-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>UniPiHotel.gr</title>
		<script src="js/navbar.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
	<script>
		//Populate countries select on page load
		$(document).ready(function(){
			//Call restful countries country endpoint
			$.get('https://countriesnow.space/api/v0.1/countries',function(countries){
				//Loop through returned result and populate countries select
				$.each(countries.data,function(key,value){
					$('#country-select')
						.append($("<option></option>")
						.attr("value", value.country)
						.text(value.country));
				});
			});
		});

		//Function to fetch states
		function initStates(){
			//Get selected country name
			let country=$("#country-select").val();

			//Remove previous loaded states
			$('#state-select option:gt(0)').remove();
			$('#district-select option:gt(0)').remove();

			//Call restful countries states endpoint
			$.post('https://countriesnow.space/api/v0.1/countries/cities',{country:country},function(states){

			//Loop through returned result and populate states select
				$.each(states.data,function(key,value){
					for(var i=0; i<states.data.length; i++){
						$('#state-select')
							.append($("<option></option>")
							.attr("value", states.data[i])
							.text(states.data[i]));
					}
				});
			});
		}
	</script>	
	
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap mt-4 mr-5">		
			    <?php
					if(!isset($_SESSION['loggedin'])) {
						echo '<li class="nav-item"><a href="" class="nav-link menu-item border-right mr-2" data-toggle="modal" data-target="#exampleModal" ><i class="bi bi-door-open"></i> Σύνδεση</a></li>';
						echo '<li class="nav-item"><a href="" class="nav-link menu-item border-right mr-2" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-person-plus"></i> Γίνε μέλος</a></li>';
		
					}
				?>
				<li class="nav-item"><a href="index.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-shop"></i> Αρχική σελίδα</a></li>
				<li class="nav-item"><a href="rooms.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-shop"></i> Δωμάτια</a></li>
				<?php 
					if(isset($_SESSION['loggedin'])) {
						echo '<li class="nav-item"><a href="bookings.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-file-bar-graph"></i> Ιστορικό Κρατήσεων</a></li>';
						echo '<li class="nav-item"><a href="logout.php" class="nav-link menu-item border-right mr-2"><i class="bi bi-door-closed"></i> Αποσύνδεση</a></li>';
					}
				?>
			</ul>
		</div>
	</nav>
	
    <!-- Log-in Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Σύνδεση</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="form-group">								
								<input type="text" class="form-control" id="logusername"  name="username" aria-describedby="usernameHelp" placeholder="Username">	
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="logpass" id="logpass" placeholder="Συνθηματικό">
							</div>
							<div class="form-group">
								<a href="" class="text-dark">Έχω ξεχάσει το συνθηματικό μου</a>
							</div>
							<div class="text-center ">
								<button type="submit" name="submit" id="loginbtn" class="btn  btn-block text-white" value="Login" style="background-color: #ff9900;" onclick="login()">Σύνδεση</button>								

							</div>	
						</form>
					</div>
					
					<div class="d-flex justify-content-center">	
						<div class="modal-footer" >									
							<p>Νέος χρήστης; <a href="" data-toggle="modal" data-target="#exampleModal2" data-dismiss="modal">Γίνε μέλος</a></p>	
						</div>
					</div>	
				</div>	
			</div>
		</div>
    <!-- Sign-up Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Εγραφή</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form2" method="post">
							<div class="form-group">								
								<input onkeypress="return /[a-zα-ω]/i.test(event.key)" required type="text" class="form-control" id="registerInputName" name="fname" placeholder="Όνομα">	
							</div>
							<div class="form-group">								
								<input onkeypress="return /[a-zα-ω]/i.test(event.key)" required type="text" class="form-control" id="registerInputSname" name="sname" placeholder="Επίθετο">	
							</div>
                            <div class="form-group">								
								<select onchange="initStates()" id="country-select" class="form-control">
									<option selected disabled>Χώρα</option>
								</select>
							</div>
							<div class="form-group">								
								<select  id="state-select" class="form-control">
									<option selected disabled>Πόλη</option>
								</select>							
							</div>
                            <div class="form-group">								
								<input onkeypress="return /[a-zα-ω0-9]/i.test(event.key)" required type="text" class="form-control" id="registerInputAddress" name="address" placeholder="Διεύθυνση">	
							</div>
							<div class="form-group">								
								<input required type="email" class="form-control" id="registerInputEmail" name="email" placeholder="Email">	
							</div>
                            <div class="form-group">								
								<input onkeypress="return /[a-zα-ω0-9]/i.test(event.key)" required type="text" class="form-control" id="registerInputUsername" name="uname" placeholder="Όνομα χρήστη">	
							</div>
							<div class="form-group">								
								<input onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10" required type="text" class="form-control" id="registerInputTel" name="tel" placeholder="Αριθμός Τηλεφώνου">	
							</div>
							<div class="form-group">
								<input required type="password" minlength="6" class="form-control" id="registerInputPassword" name="password" placeholder="Συνθηματικό">
							</div>
							<div class="form-group">								
								<input required type="password" minlength="6" onfocusout="matchPassword()" class="form-control" id="registerInputPasswordcheck" name="cpassword" placeholder="Επιβεβαίωση Συνθηματικού">	
								<p id="alert" class="text-danger"></p>
							</div>
							<div class="text-center">
								<button required type="submit" class="btn  btn-block text-white" id="registerbtn" style="background-color: #ff9900;" onclick="signup()">Εγγραφή</button>							
							</div>	
						</form>					
					</div>
					
					<div class="d-flex justify-content-center">	
						<div class="modal-footer" >									
							<p>Είσαι ήδη μέλος; <a href="" data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Συνδέσου</a></p>	
						</div>
					</div>	
				</div>	
			</div>
		</div>

</html>
