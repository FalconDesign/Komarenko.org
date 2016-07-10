<?php

require_once 'scripts/connect.php';

$lang        = $_SESSION['lang'];
$get_authors = mysql_query("SELECT id, name_{$lang}, text_{$lang}, photo FROM authors");

while ($author = mysql_fetch_array($get_authors)) {

	if ($author['id'] == 1) {
		echo $author[2];
		continue;
	}

	$name  = $author[1];
	$text  = $author[2];
	$photo = $author['photo'];

	echo <<<HTML
		<div class="author">
			<img src="img/authors/{$photo}" alt="{$name}">
			<div class="info">
				<div class="header">
					{$name}
				</div>
				<p>
					{$text}
				</p>
			</div>
		</div>
HTML;
}

?>