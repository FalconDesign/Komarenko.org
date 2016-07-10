<?php

@$page = $_GET['page'] ?: 'home';
require "pages/{$page}.php";

?>