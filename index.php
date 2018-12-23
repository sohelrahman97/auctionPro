<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AuctionPro</title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    

  </head>


<body>

  <section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
        <div class="box">

        <img src="logo1.png">
        <hr>

        <?php
        if(isset($_GET["success"]))
        {
          echo "<div class='notification is-link'>
               Successfully registered! Please login here.
              </div>";
        }
        ?>
        
        <form action="confirmLogin.php" method="post">
        <div class="field">
		  <label class="label">Email</label>
		  <div class="control">
		    <input class="input" name="email" type="text" placeholder="example@gmail.com">
		  </div>
		</div>
        <div class="field">
		  <label class="label">Password</label>
		  <div class="control">
		    <input class="input" name="password" type="text" placeholder="password">
		  </div>
		</div>
        <br>
        <div class="field is-grouped">
		  <div class="control">
		    <button class="button is-success" type="submit">Submit</button>
		  </div>
		</div>
        </form>
        
        
        <hr>
        <p>Not a user yet? <a href="register.php"><u>Sign up here</u></a>
        </div>
        </div>
      </div>
    </div>
  </div>
  </section>


</body>
</html>


