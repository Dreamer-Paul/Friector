<?php

$sites = file_get_contents("site.json");
$sites = json_decode($sites, true);

if(isset($_GET["id"])){
    $_GET["id"] = intval($_GET["id"]);

    $site = $sites[$_GET["id"]];

    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL => str_replace("#", "", $site["url"]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Powered-By: Friector"
        ),
    ));

    $output = curl_exec($ch);
    $error = curl_error($ch);

    $curl_info = curl_getinfo($ch);

    curl_close($ch);
}

if($error){
    echo json_decode(array(
        "err" =>  $error
    ), 320);
}
else{
    echo json_encode($curl_info, 320);
}
