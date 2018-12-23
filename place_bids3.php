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
      $conn = mysqli_connect('localhost','root','','userdata');
      $u_id = $_SESSION['u_id'];

      if($_GET["pid"])
      {
        $bid_pid = $_GET['pid'];
      }



      echo "<p>Placing bid on: </p>";



      $sql = "SELECT p.p_id,p.name, p.description, c.name AS c_name, p.price, p.date, p.sold
          FROM products p, categories c 
          WHERE p.Category = c.c_id AND p.p_id=$bid_pid"; 

      $result = mysqli_query($conn, $sql);

      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>p_id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Expected price</th>
            <th>Date</th>
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
            "</tr>" ;
      }

      echo "</table><br>";


      ?>
      <p>Highest current bid on this item: $ 

      <?php 

      $sql = "SELECT MAX(b.amount) AS amount
          FROM bids b
          WHERE b.p_id=$bid_pid"; 

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result))
      {
        $temp = $row['amount'];
      }

      echo $temp;
      ?>

  	  </p>
  	  <br>
      <p>Enter amount: </p>
      <!--<form action='place_bids4.php?pid=$bid_pid' method='post'>
      Amount: <input type='text' name='bid_amount'><br>
      <input type='submit' class='button is-primary'>
      </form>-->
      <?php
      echo "<form action='place_bids4.php?pid=$bid_pid' method='post'>";
      ?>
      <table>
      	<tr>
      		<td>
      			
      		  <div class="field">
			  <div class="control">
			    <input class="input" type="text" name='bid_amount' placeholder="e.g.123">
			  </div>
			  </div>

      		</td>
      		<td>

      			<input type='submit' class='button is-primary'>

      		</td>
      	</tr>
      </table>

      </form>

    </div>


  </div>



</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>



