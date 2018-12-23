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

		$conn = mysqli_connect('localhost','root','','userdata');
		$sql="SELECT c_id,name AS c_name FROM categories";
		$result = mysqli_query($conn, $sql);
		?>

		<!--<form action="insert_product2.php" method="post">
		Name: <input type="text" name="name"><br>
		Description: <input type="text" name="desc"><br>


		<select name = "cat">
		 <?php 
		 //while ($row = mysqli_fetch_assoc($result))
		{
			//echo "<option value =' " . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
		}
		?>
		  
		</select>
		<br>

		Price: <input type="text" name="price"><br>
		<input type="submit">
		</form>-->


      

      <form action="insert_product2.php" method="post">
      <table class='table is-fullwidth'>
      	<tr>
      		<td><p>Name:  </p></td>
      		<td><div class="field">
			  <div class="control">
			    <input class="input" type="text" name='name' placeholder="name">
			  </div>
			  </div></td>
      	</tr>
      	<tr>
      		<td><p>Description  </p></td>
      		<td><textarea class="textarea" name="desc" placeholder="e.g. used but in good condition"></textarea></td>
      	</tr>
      	<tr>
      		<td><p>Category:  </p></td>
      		<td>
      			

      			<select name = "cat">
				<?php 
				 while ($row = mysqli_fetch_assoc($result))
				{
					echo "<option value =' " . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
				}
				?>
				  
				</select>


      		</td>
      	</tr>
      	<tr>
      		<td><p>Expected price:  </p></td>
      		<td><div class="field">
			  <div class="control">
			    <input class="input" type="text" name='price' placeholder="price">
			  </div>
			  </div></td>
      	</tr>
      </table>
      <input type="submit" class="button is-success">
      </form>
      

    </div>


  </div>



</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>







