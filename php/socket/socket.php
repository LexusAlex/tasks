<?php
// если нет обертки по дефолту
header("Content-Type: text/html;charset=utf-8");
// Сокетное соединение
	// Создаем сокет (host+порт)
    // хост, порт , нормер ошибки, описание ошибки, таймаут
	$socket = fsockopen("test-site.loc", 80, $sock_errno, $sock_errmsg, 30);

	// Создаем POST-строку
	$str_query = "name=John&age=25";

	// Посылка HTTP-запроса
	$out = "POST /php/socket/dummy.php HTTP/1.1\r\n";
	$out .= "Host: test-site.loc\r\n";
	$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$out .= "Content-length: " . strlen($str_query). "\r\n\r\n";

	$out .= $str_query;
    // послать запрос в сокетное соединение
	fwrite($socket, $out);
	//fputs($socket, $out); // или так , что тоже самое

	// Получаем и выводим ответ , читаем из сокета
	while (!feof($socket)) {
        
        echo fgets($socket);
    }

	// Закрытие соединения
	fclose($socket);
?>
