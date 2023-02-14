<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/index.css">
	<script src="js/index.js"></script>
  </head>
  <body class ="bg-light">
    <!-- load the navbar menu -->
    <?php include_once 'navbar.php';?>
  
    <div class="searchArea">
      
      <div class="text-center ">
        <h1 class="mt-5 " id="searchTag"><a href="index.php">UniPiHotel</a></h1>
      </div>

      <form method="POST">
        <div class="input-group mt-3" id="searchSection">
          <input type="search" class="form-control rounded" id="searchText" name="searchText" aria-describedby="search-addon" placeholder="γράψε τον όρο αναζήτησης">	
          <button name="submit" class="btn text-white" value="Search" onclick="search()">Αναζήτηση</button>								
        </div> 
      </form>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide ml-5 mr-5 mt-5" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-dark"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a><img class="d-block w-60" src="carouselimages/first.png" alt="First slide"></a>
				</div>
				<div class="carousel-item">
					<a><img class="d-block w-60" src="carouselimages/second.png" alt="Second slide"></a>
				</div>
				<div class="carousel-item">
					<a><img class="d-block w-60" src="carouselimages/third.png" alt="Third slide"></a>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

    <br/><br/><br/>

    <div class="container mt-5 mb-5">
			<div class="row">				
				<div class="col-sm">
					<div class="card bg-info text-white">
						<div class="card-body">
							<h5 class="card-title"><a class="text-white">Εγγύηση Χαμηλότερης Τιμής</a></h5>
							<p class="card-text">Εγγυόμαστε πως στην UniPiHotel όλες οι καταχωρίσεις προσφέρονται στην χαμηλότερη τιμή της αγοράς.</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-primary text-white">
						<div class="card-body">
							<h5 class="card-title">Εγγύηση Επιστροφής Χρημάτων</h5>
							<p class="card-text">Για να διασφαλίσουμε ότι δε θα λάβετε τίποτα λιγότερο από αυτά που συμφωνήσατε, κρατάμε δεσμευμένο το σύνολο της κράτησής σας μέχρι και την ημέρα άφιξή σας στο ξενοδοχείο.</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-success text-white">
						<div class="card-body">
							<h5 class="card-title">Προσωπικός Βοηθός</h5>
							<p class="card-text">Από την στιγμή της κράτηση σας ένας εκπρόσωπος της UniPiHotel θα γνωρίζει τα πάντα για το ταξίδι σας και θα είναι εκεί να σας εξυπηρετήσει οποιαδήποτε στιγμή τον χρειαστείτε.</p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-danger text-white">
						<div class="card-body">
							<h5 class="card-title">Ακρίβεια Καταχώρησης</h5>
							<p class="card-text">Σας εγγυόμαστε ότι όλες οι καταχωρίσεις στην UniPiHotel είναι ακριβώς όπως παρουσιάζονται. </p>
							<br/>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<div class="card bg-warning text-white">
						<div class="card-body">
							<h5 class="card-title">Υπηρεσίες</h5>
							<p class="card-text">Στο Ξενοδοχείο UniPiHotel, η άνεση και η ικανοποίησή σας αποτελούν προτεραιότητα. Οι άνθρωποι του ξενοδοχείου ανυπομονούν να σας υποδεχθούν.</p>
							<br/>
						</div>
					</div>
				</div>
		</div>
	</div>
    
  <!-- load the footer -->
  <?php include_once 'footer.php';?>

  </body>
</html>