<p>
	Здесь располагается вступительная часть об авторах. Пишется, какие они молодцы, но в серьёзном стиле, без преувеличений. Здесь располагается вступительная часть об авторах. Пишется, какие они молодцы, но в серьёзном стиле, без преувеличений.
</p>

<?php

require_once 'scripts/connect.php';

$lang        = $_SESSION['lang'];
$get_authors = mysql_query("SELECT name_{$lang}, text_{$lang}, photo FROM authors");

while ($author = mysql_fetch_array($get_authors)) {

	$name  = $author[0];
	$text  = $author[1];
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