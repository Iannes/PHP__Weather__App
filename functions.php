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
    
function showContent($input, $url)
{
        
    /* ===  Once city is typed in get the
            contents and show it back to the user
                                                      ==== */
    if (!empty($input)) {
        $urlContents = curl($url);
        
        $weatherArray = json_decode($urlContents, true);
        
        $weather = $input." currently has ".$weatherArray['weather'][0]['description'].".";
        
        echo $weather;
    }
}
