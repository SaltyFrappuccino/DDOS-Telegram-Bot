<?php


$servername = "localhost";
$database = "ividivma_vot";
$username = "ividivma_vot";
$password = "6s97AR&y";


// Устанавливаем соединение
$bd = mysqli_connect($servername, $username, $password, $database);

		
$data = json_decode(file_get_contents('php://input'), TRUE);
//пишем в файл лог сообщений
//file_put_contents('file.txt', '$data: '.print_r($data, 1)."\n", FILE_APPEND);

$data = $data['callback_query'] ? $data['callback_query'] : $data['message'];

define('TOKEN', '5794286027:AAG1JIls4P0Uz6UTW6Otv0U74LFtQhml3ZY');
$tokens ='5794286027:AAG1JIls4P0Uz6UTW6Otv0U74LFtQhml3ZY';
$admin_id = '';
$domain = $_SERVER['SERVER_NAME'];



$message = ($data['text'] ? $data['text'] : $data['data']);

$send_data['chat_id'] = $data['chat'] ['id'];
$sid = $send_data['chat_id'];


$sql = "SELECT * FROM users WHERE user_id = $sid";
		try {
            $result = $bd->query($sql);
        }
        catch (mysqli_sql_exception $e) {
            var_dump($e);
            exit;
        }
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()){
			    
		   $message_dos       = $row["message"];
           $method       = $row["method"];
           $command    = $row["command"];
           $target    = $row["target"];
           $thread   = $row["thread"];     
           $time   = $row["time"];
           $contentssss = $row["tgservers"];
				
        		   $activate   = $row["activate"];	   
			}
		
		}

?>