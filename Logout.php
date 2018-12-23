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
        

	    <?php
		session_start();
		session_destroy();
		?>
    
    	<article class="message">
		  <div class="message-header">
		    <p>Logged out successfully!</p>
		  </div>
		  <div class="message-body">
		    <a href="index.php"><u>Login again</u></a>
		  </div>
		</article>

        </div>
      </div>
    </div>
  </div>
  </section>


</body>
</html>


