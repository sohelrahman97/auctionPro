<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AuctionPro</title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
    
  </style>


  </head>


<body>

  <section class="hero is-danger">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <img src="testlogo.png" alt="Logo">
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item" href="welcome.php">
              Home
            </a>
            <a class="navbar-item is-active" href="place_bids.php">
              Place Bids
            </a>
            <a class="navbar-item" href="logout.php">
              Logout
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-light">
  <div class="hero-body">

    <div class="container">
      

    	<?php
		session_start();

		$u_id = $_SESSION['u_id'];
		$bid_amount = $_POST['bid_amount'];
		if($_GET["pid"])
		{
			$bid_pid = $_GET['pid'];
		}
		$date = date("Y-m-d H:i:s");

		$conn = mysqli_connect('localhost','root','','userdata');
		if($conn) {
			$sql = "INSERT INTO bids VALUES(NULL,'$u_id','$bid_pid','$bid_amount','$date',0);";
			if(mysqli_query($conn, $sql)) 
				{
					echo '<div class="notification is-success">
						  Bid placed
						</div>';
				}
		}
		else 
		{
			echo "<p>Error</p>";
		}
		?>






      
      

    </div>


  </div>



</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>



