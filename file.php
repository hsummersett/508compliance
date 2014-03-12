<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://www.google.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser
$response = curl_exec($ch);

$dom = new DOMDocument();

@$dom->loadHTML($response);

$links = $dom->getElementsByTagName("a");

for($i = 0;$i < $links->length;$i++){
    $href = $links->item($i)->attributes;
    for($j = 0;$j < $href->length;$j++){
        echo($href->getNamedItem("href")->nodeValue."<br/>");
    }
}
