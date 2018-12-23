<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AuctionPro CP</title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
    
  </style>

  <?php

  session_start();
  $conn = mysqli_connect('localhost','root','','userdata');
  $email = $_SESSION['email'];
  $u_id = $_SESSION['u_id'];

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
            <a class="navbar-item is-active" href="welcome.php">Home</a>
            <a class="navbar-item" href="place_bids.php">Place Bids</a>
            <a class="navbar-item" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-light">
  <div class="hero-body">

    <div class="container">
      



    <p><b>Welcome, <?php echo $email ?></b></p>
    <br><br>
    <p>Your products: </p><br>


    
    <?php

    $sql = "SELECT p.p_id,p.name, p.description, c.name AS c_name, p.price, p.date, p.sold
        FROM products p, categories c 
        WHERE p.Category = c.c_id AND u_id = $u_id
        ORDER BY p.sold Desc"; 

    $result = mysqli_query($conn, $sql);

    echo "<table class='table is-fullwidth is-striped is-bordered'>
        <tr>
          <th>p_id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Category</th>
          <th>Price</th>
          <th>Date</th>
          <th>Sold</th>
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
          "<td>" . $row['sold'] . "</td>" .
          "</tr>" ;
    }


    /*while ($row = mysqli_fetch_assoc($result))
    {
      echo $row['email'] . " ". $row['p_id'] . " ". $row['name'] . " " . $row['description']. " ". $row['c_name'] . " ". $row['price'] . " ". $row['date'] . " ". $row['sold'] ;
      echo "<br/>";
    }  */

    echo "</table>";
    ?>
    

    <br>


    <a class="button is-primary" href="insert_product.php">Add new products</a>


    <br><br>

    <p>Your item's bids: </p><br>

    <?php
    $sql = "SELECT b.b_id, b.u_id AS u_id2, b.p_id AS p_id2,p.name AS p_name, p.description, c.name AS c_name, MAX(b.amount) AS highest, b.date AS bid_date
        FROM products p, categories c, bids b 
        WHERE p.Category = c.c_id AND b.p_id = p.p_id AND p.sold='No' AND b.u_id<>$u_id AND p.u_id=$u_id
            GROUP BY b.p_id 
            "; 

    $result = mysqli_query($conn, $sql);
    echo "<table class='table is-fullwidth is-striped is-bordered'>
        <tr>
          <th>b_id</th>
          <th>Bid_Userid</th>
          <th>p_id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Category</th>
          <th>Highest bid</th>
          <th>Date</th>
          <th></th>
        </tr>"; 

        
    while ($row = mysqli_fetch_assoc($result))
    {
      echo "<tr>
          <td>" . $row['b_id'] . "</td>" .
          "<td>" . $row['u_id2'] . "</td>" . 
          "<td>" . $row['p_id2'] . "</td>" .
          "<td>" . $row['p_name'] . "</td>" .
          "<td>" . $row['description'] . "</td>" .
          "<td>" . $row['c_name'] . "</td>" .
          "<td>" . $row['highest'] . "</td>" .
          "<td>" . $row['bid_date'] . "</td>" .
          "<td><a href='accept_bid.php?pid=" . $row['p_id2']. "&bid=". $row['b_id'] ."'><u>Accept bid</u></a></td>" .
          "</tr>";
    }

    echo "</table>";

    ?>

    <br>

    <p>Bids you've placed on other items: </p>

    <?php
    $sql = "SELECT b.b_id, b.u_id AS u_id2, b.p_id AS p_id2,p.name AS p_name, p.description, c.name AS c_name, b.amount, b.accepted, p.sold
        FROM products p, categories c, bids b 
        WHERE p.Category = c.c_id AND b.p_id = p.p_id AND b.u_id=$u_id"; 

    $result = mysqli_query($conn, $sql);
    echo "<table class='table is-fullwidth is-striped is-bordered'>
        <tr>
          <th>b_id</th>
          <th>Bid_Userid</th>
          <th>p_id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Category</th>
          <th>Amount</th>
          <th>Status</th>
        </tr>"; 


        
    while ($row = mysqli_fetch_assoc($result))
    {
      echo "<tr>
          <td>" . $row['b_id'] . "</td>" .
          "<td>" . $row['u_id2'] . "</td>" . 
          "<td>" . $row['p_id2'] . "</td>" .
          "<td>" . $row['p_name'] . "</td>" .
          "<td>" . $row['description'] . "</td>" .
          "<td>" . $row['c_name'] . "</td>" .
          "<td>" . $row['amount'] . "</td>" .
          "<td>"; 

        if($row['accepted']==1) $temp=1;
    	else if($row['accepted']==0 && $row['sold']=='Yes') $temp=2;
		else if($row['accepted']==0 && $row['sold']=='No') $temp=3;

          switch($temp)
          {
          	case 1:
          		echo "Accepted, sold";
          		break;
          	case 2: 
	          	echo "Not accepted, sold";
	          	break;
	        case 3: 
	        	echo "Not accepted, unsold";
	        	break;
          } 

          echo "</td>" .
          "</tr>";
    }

    echo "</table>";

    ?>

    <br><br><br>




  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>



