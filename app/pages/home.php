<?php

$lang        = $_SESSION['lang'];
$get_filling = mysql_query("SELECT type, text_{$lang} FROM home");

while ($result = mysql_fetch_array($get_filling)) {
	switch ($result['type']) {
		case 'content':
			$text[] = $result[1];
			break;
		case 'header':
			$head[] = $result[1];
			break;
		case 'link':
			$link[] = $result[1];
			break;
	}
}

?>

<?= $text[0] ?>

<div class="trigger" data-arrow="random-portfolio">
	<h2><img src="img/ico/plus_black.svg" alt="minus"> <span><?= $head[0] ?></span></h2>
	<img src="img/ico/reload.svg" alt="reload" class="reload">
</div>
<div class="random-portfolio" data-target="random-portfolio">
	<div class="tags">
		<?php

		$get_tags = mysql_query("SELECT {$lang} FROM tags");

		while ($tag = mysql_fetch_array($get_tags)) {
			echo '<div>' . $tag[0] . '</div>';
		}

		?>
	</div>
	<div class="wrapper">
		<?php

		$get_portfolio = mysql_query("SELECT category, name_{$lang}, photo FROM portfolio ORDER BY RAND() LIMIT 8");

		while ($portfolio = mysql_fetch_array($get_portfolio)) {

			$name  = $portfolio[1];
			$photo = $portfolio['photo'];

			echo <<<HTML
				<div class="item">
					<div class="name">$name</div>
					<img src="img/portfolio/{$photo}">
				</div>
HTML;
		}

		?>
	</div>
	<div class="all-portfolio">
		<a href="#"><?= $link[0] ?></a>
	</div>
</div>

<?= $text[1] ?>

<h2><?= $head[1] ?></h2>
<div class="partners-slider">
	<img src="img/ico/big_slider_arrow_left.svg" alt="arr" class="left-arrow">
	<div class="wrapper">
		<div class="container">
			<?php

			require 'scripts/display_img.php';
			displayimg('img/clients/');

			?>
		</div>
	</div>
	<img src="img/ico/big_slider_arrow_right.svg" alt="arr" class="right-arrow">
</div>

<?= $text[2] ?>

<h2><?= $header[2] ?></h2>
<div class="news-slider">
	<img src="img/ico/big_slider_arrow_left.svg" alt="arr" class="left-arrow">
	<div class="wrapper">
		<div class="container">
			<?php

			$get_news = mysql_query("SELECT header_{$lang}, photo FROM articles WHERE type = 'news'");

			while ($news = mysql_fetch_array($get_news)) {

				$header = $news[0];
				$photo  = $news['photo'];

				echo <<<HTML
					<div class="item">
						<img src="img/articles/{$photo}" alt="slider">
						<div class="text">
							{$header}
						</div>
					</div>
HTML;
			}

			?>
		</div>
	</div>
	<img src="img/ico/big_slider_arrow_right.svg" alt="arr" class="right-arrow">
</div>

<div class="trigger" data-arrow="new-materials">
	<h2><img src="img/ico/minus_black.svg" alt="minus"> <span><?= $head[3] ?></span></h2>
	<img src="img/ico/reload.svg" alt="reload" class="reload" data-reload="new-materials">
</div>
<div class="new-materials" data-target="new-materials">
	<div class="wrapper">
		<?php

		$get_articles = mysql_query("SELECT id, date, header_{$lang}, photo FROM articles ORDER BY id DESC");

		while ($articles = mysql_fetch_array($get_articles)) {

			$id     = $articles['id'];
			$date   = $articles['date'];
			$header = $articles[2];
			$photo  = $articles['photo'];

			echo <<<HTML
				<div class="item">
					<img src="img/articles/{$photo}">
					<div class="title">
						{$header}
						<div class="date">{$date}</div>
					</div>
				</div>
HTML;
		}

		?>
	</div>
	<div class="all-materials">
		<a href="#"><?= $link[1] ?></a>
	</div>
</div>
