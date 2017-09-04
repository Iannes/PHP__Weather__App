<?php

function curl($url)
{
    #  HTTP request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}


  $city = $_GET['city'];

    $error ="";
    $key ='apiID';
    /* === Get url ==== */
    $urlWithCity = 'http://api.openweathermap.org/data/2.5/weather?q='.$city.$key;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>

      <!-- Required meta tags -->
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
                <input type="text" class="form-control" name ="city" id="city" placeholder="London, Istanbul, Sydney" value="<?php echo $city;?>">

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

                        if (!empty($city)) {
                            $urlContents = curl($urlWithCity);

                            $weatherArray = json_decode($urlContents, true);

                            $weather = $city." currently has ".$weatherArray['weather'][0]['description'].".";

                            echo $weather;
                        }

                            ?></div> <!-- End messsage -->
                            </div> <!-- End col-->
                        </div>  <!-- End row -->
                    </div>  <!-- End Container -->
</div>
</div>


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>





</body>
</html>
