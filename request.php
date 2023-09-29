<?php
error_reporting(0);
if (!isset($_GET["name"])) exit;
$name = $_GET["name"];
$data = json_decode(file_get_contents("https://rest.bandsintown.com/artists/$name/events?app_id=0"), 1);
$result = array();
foreach ($data as $item) {
  $venue = $item["venue"];
  $result[] = array(
    "lat" => $venue["latitude"],
    "lng" => $venue["longitude"],
    "city" => $venue["city"],
    "datetime" => $item["datetime"],
    "url" => $item["url"]
  );
}
echo json_encode($result);
