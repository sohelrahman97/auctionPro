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

  <?php

  	session_start();
	$conn = mysqli_connect('localhost','root','','userdata');
	$u_id = $_SESSION['u_id'];
	$category = $_POST['cat'];


	?>

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
            <a class="navbar-item is-active">
              Home
            </a>
            <a class="navbar-item" href="place_bids.php">
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
      
    	<p><b>Available items: </b></p><br>

      <?php

		

		$sql = "SELECT p.p_id,p.name, p.description, c.name AS c_name, p.price, p.date, p.sold
				FROM products p, categories c 
				WHERE p.category = c.c_id AND u_id <> $u_id AND sold='No' AND p.category=$category"; 

		$result = mysqli_query($conn, $sql);

		echo "<table class='table is-fullwidth is-striped is-bordered'>
				<tr>
					<th>p_id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Category</th>
					<th>Price</th>
					<th>Date Posted</th>
					<th></th>
				</tr>";
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>
					<td>" . $row['p_id'] . "</td>" .
					"<td>" . $row['name'] . "</td>" . 
					"<td>" . $row['description'] . "</td>" .
					"<td>" . $row['c_name'] . "</td>" .
					"<td>" . $row['price'] . "</td>" .
					"<td>" . $row['date'] . "</td>" .
					"<td><a href='place_bids3.php?pid=" . $row['p_id']. " '><u>Place bid</u></a></td>" .
					"</tr>" ;
		}



		echo "</table>";
		?>
		<br>
		<a href="place_bids.php"><u>Choose another category</u></a>


    </div>


  </div>
<br>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>



