<?php

$url = "https://reqres.in/api/users";

$my_data = array(
    'name' => 'Pritti Sunaula',
    'job'  => 'Web Developer'
);

$data = http_build_query($my_data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch))
{
    echo $e;
}else{
    $decoded = json_decode($resp);
    foreach($decoded as $key => $value)
    {
        echo $key . ': ' . $value . '<br>';
    }
}

curl_close($ch);