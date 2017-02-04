<?php

require('simple_html_dom.php');

	$city = $_GET['city'];

	/* === Make sure there is no white space in user's input ==== */
	$city = str_replace(' ', '', $city);
	$error ="";
	/* === Get url ==== */
	$url = "http://www.weather-forecast.com/locations/".$city."/forecasts/latest";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Weather App</title>

	  <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	


</head>
<body>

<div class="jumbotron">
  <h1 class="display-3 hidden-lg-down">What's the weather?</h1>
  <h1 class="display-5 hidden-sm-up">What's the weather?</h1>
  <p class="lead">Enter the name of a city to check its weather.</p>
  
 <div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-8">
		<form method="get">
			  <div class="form-group">

			    <label for="city"></label>
			    <input type="text" class="form-control" name ="city" id="city" placeholder="London, Istanbul, Sydney" value="<?php echo $_GET['city'];?>">
			   
			  </div>

			  </div>
			  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
		</form>
		</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-8 col-sm-12">
						<div id="message"><?php 

			/* === Once city is typed in ==== */

					if ($city) {

		/* == Get html content from url == */
						$html= file_get_html($url);

	/* == Find span with class of read-more-content == */	
						foreach($html->find('span.read-more-content') as $e)

	/* == Append its innerHTML within a bootstrap alert div == */
				    	print '<div class="alert alert-info" role="alert">
  						'.$e->plaintext.'</div>';

								} 


					if ($city) {

						$page = file_get_contents("http://time.is/$city");
						$pattern = '#id="twd">(.*)<#U';

						preg_match_all($pattern, $page, $matches); 
						


				foreach($html->find('p.local-time-line') as $t)

	/* == Append its innerHTML within a bootstrap alert div == */
				    	print '<div class="alert alert-success" role="alert">
  						'.$t->plaintext.''.$matches[1][0].'</div>';

								} 				

							?></div> <!-- End messsage -->
							</div> <!-- End col-->
						</div> 	<!-- End row -->
					</div>	<!-- End Container -->
</div>
</div>


	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



	

</body>
</html>