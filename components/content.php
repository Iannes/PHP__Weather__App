<?php require_once 'config.php' ?>

<div class="jumbotron">
  <h1 class="display-4 hidden-xs-down">What's the weather?</h1>
  <p class="lead">Enter the name of a city to check its weather.</p>

  <div class="container">
   <div class="row">
     <div id="weather-icon" class="col-lg-12 col-md-8 col-sm-12">
       <?php getContents($city, $urlWithCity, $png, $imageUrl);?>
     </div>

 <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-8">
        <form method="get">
            <div class="form-group">
                <label for="city"></label>
                <input type="text" class="form-control" name ="city" id="city" placeholder="London, Rome, Sydney" value="<?php echo $city;?>">
            </div>
          <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </form>
 </div>