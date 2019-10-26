<?php
error_reporting(0);
if (!isset($_GET["term"])) exit;
$searchTerm = $_GET["term"];
$data = json_decode(file_get_contents("https://www.bandsintown.com/searchSuggestions?searchTerm=$searchTerm"), 1);
$result = array();
foreach ($data["artists"] as $item) {
  $result[] = array(
    "name" => $item["name"],
    "icon" => $item["verifiedSrc"],
  );
}
usort($result, function ($a, $b) {
  return ($a["icon"] != null) < ($b["icon"] != null);
});
echo json_encode($result);
