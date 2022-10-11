<?php

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$data = file_get_contents("http://193.38.235.44:8000/tg?thread=700&time=100&target=lol&method=/start");

$servername = "rigik0j1.beget.tech";
$database = "rigik0j1_bot";
$username = "rigik0j1_bot";
$password = "xS61v&I2";


// Устанавливаем соединение
$bd = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM users WHERE user_id=5522331126";
$slot1 = mysqli_query($bd, $sql);
$result = mysqli_query($bd, "UPDATE users SET $slot3=1 WHERE user_id=5522331126");

echo $slot1->fetch_assoc()['slot1'];
echo $result->fetch_assoc();

?>