<?php
//    =========================================================
// 						Variables
//    =========================================================
$city = $_GET['city'];
$error ="";
$key ='__KEY__';
    
/* === Get url ==== */
$urlWithCity = 'http://api.openweathermap.org/data/2.5/weather?q='.$city.$key;

$imageUrl = 'http://openweathermap.org/img/w/'.$png;
    
//    =========================================================
// 						Functions
//    =========================================================

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

function getContents($input, $url, $icon, $theUrl)
{
    /* ===  Once city is typed in get the
            contents and show it back to the user       ==== */
    if (!empty($input)) {
        $urlContents = curl($url);
        $weatherArray = json_decode($urlContents, true);
        $weather = $input." currently has ".$weatherArray['weather'][0]['description'].".";
                $icon = $weatherArray['weather'][0]['icon'];
                $newIconUrl = $theUrl.$icon.'.png';
        // echo $weather;
                echo '<img class="img img-responsive" src='.$newIconUrl.'  alt='.$input.'-'.'Weather >';
    }
}
