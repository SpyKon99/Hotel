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
		
		<?php
        
        include_once('db_conn.php');
    
        $userid = $_SERVER['QUERY_STRING'];
        $userid = substr($userid,3);
        // echo $userid;
       
        $sql = "SELECT * FROM users WHERE id='".$userid."' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($document = $result->fetch_assoc()) {
                echo '<form action="FinalEditUser.php" method="POST"style="padding-right:30%; padding-left:30%;">
                <div class="form-group">								
                    <input type="text" class="form-control" name="userid" id="userid" value="'.$document['id'] .'" readonly> 
                </div>
                <div class="form-group">								
                    <input type="text" class="form-control" name="userfname" id="userfname" value="'.$document['firstname'] .'"> 
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="usersname" id="usersname" value="'.$document['lastname'] .'">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="country" id="country" value="'.$document['country'] .'">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" id="city" value="'.$document['city'] .'">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address" id="address" value="'.$document['address'] .'">
                </div>
                <div class="form-group">								
                    <input type="text" class="form-control" name="email" id="email" value="'.$document['email'] .'" >  
                </div>
                <div class="form-group">								
                    <input type="text" class="form-control" name="username" id="username" value="'.$document['username'] .'" >  
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" id="phone" value="'.$document['phone'] .'">  
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="userpassword" id="userpassword" value="'.$document['password'] .'" >  
                </div>
                <div class="form-group">
                    <select name="role[]"class="form-select form-control">
                        <option selected disabled> '.$document['role'] .'</option>
                        <option value="0">Απλή εγγραφή</option>
                        <option value="1">Επιβεβαίωση Στοιχείων</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
                <div class="text-center ">
                    <button onclick="getData()" type="edit" name="edit" id="edit" class="btn btn-block text-white" value="Edit" style="background-color: #ff9900;">Edit</button>								
                </div>	
            </form>';
            }
        }
    
        ?>		
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
