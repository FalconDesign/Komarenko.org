<?php

foreach ($_POST as $key => $value) {
	${$key} = trim($value);
}

$to       = "eight.alex@gmail.com";
$subject  = "Новое письмо";
$message  = "Имя: {$name}<br>Контакты: {$contacts}<br>Сообщение: {$message}";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: info@komarenko.org \r\n";

if (mail($to, $subject, $message, $headers)) {
	echo 1;
} else {
	echo 0;
}

?>