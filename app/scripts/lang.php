<?php

session_start();

if (isset($_POST['set_lang'])) {
	$_SESSION['lang'] = $_POST['set_lang'];
	exit();
}

if (isset($_POST['show_lang'])) {
	echo $_SESSION['lang'];
	exit();
}

if (empty($_SESSION['lang'])) {
	$_SESSION['lang'] = 'ru';
}

$lang = $_SESSION['lang'];

?>