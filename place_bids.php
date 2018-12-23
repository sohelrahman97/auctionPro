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

      <form action="place_bids2.php" method="post">
      

      <div class="field">
      <label class="label">Select category: </label>
      <div class="control">
        <div class="select">
          <select name="cat">
           <?php 
           while ($row = mysqli_fetch_assoc($result))
          {
            echo "<option value =' " . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
          }
          ?>
          </select>
        </div>
      </div>
      </div>

      <div class="field is-grouped">
      <div class="control">
        <button class="button is-link" type="submit">Submit</button>
      </div>
      </div>

    </div>


  </div>
<br>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Built by Sohel using Bulma</p></div></div>

</section>



</body>
</html>



