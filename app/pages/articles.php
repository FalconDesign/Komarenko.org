<div class="articles-trigger" data-arrow="news">
	<img src="img/ico/plus.svg" alt="plus">
	Новости
</div>
<div class="articles-wrapper hidden" data-target="news">
	<?php

	require_once 'scripts/connect.php';

	$lang     = $_SESSION['lang'];
	$get_news = mysql_query("SELECT id, date, header_{$lang}, cut_{$lang}, photo FROM articles WHERE type = 'news'");

	while ($news = mysql_fetch_array($get_news)) {

		$id     = $news['id'];
		$date   = $news['date'];
		$header = $news[2];
		$cut    = $news[3];
		$photo  = $news['photo'];

		echo <<<HTML
			<div class="article">
				<div class="header">
					<div class="title">{$header}</div>
					<div class="date">Опубликовано {$date}</div>
				</div>
				<div class="wrapper">
					<img src="img/articles/{$photo}" alt="$header">
					<div class="text">
						{$cut}
						<a href="?page=article&id={$id}" class="more">
							Подробнее...
						</a>
					</div>
				</div>
			</div>
HTML;
	}

	$count_news  = mysql_query("SELECT count(id) as result_count FROM articles WHERE type = 'news'"); 
	$news_length = (int) mysql_result($count_news, 0);

	if ($news_length > 15) {
		echo '<div class="pagination">';

		$pages_length = ceil($news_length / 15);
		$j            = 1;

		for ($i = $pages_length; $i > 0; $i--) {
			if ($j === 1) {
				echo "<span class='active'>{$j}</span>";
				continue;
			}

			echo "<span>{$j}</span>";

			$j++;
		}

		echo '</div>';
	}

	?>
</div>

<div class="articles-trigger" data-arrow="make">
	<img src="img/ico/plus.svg" alt="plus">
	Делаем
</div>
<div class="articles-wrapper hidden" data-target="make">
	<?php

	$get_make = mysql_query("SELECT id, date, header_{$lang}, cut_{$lang}, photo FROM articles WHERE type = 'make'");

	while ($make = mysql_fetch_array($get_make)) {

		$id     = $make['id'];
		$date   = $make['date'];
		$header = $make[2];
		$cut    = $make[3];
		$photo  = $make['photo'];

		echo <<<HTML
			<div class="article">
				<div class="header">
					<div class="title">{$header}</div>
					<div class="date">Опубликовано {$date}</div>
				</div>
				<div class="wrapper">
					<img src="img/articles/{$photo}" alt="$header">
					<div class="text">
						{$cut}
						<a href="?page=article&id={$id}" class="more">
							Подробнее...
						</a>
					</div>
				</div>
			</div>
HTML;
	}

	$count_make  = mysql_query("SELECT count(id) as result_count FROM articles WHERE type = 'make'"); 
	$make_length = (int) mysql_result($count_make, 0);

	if ($make_length > 15) {
		echo '<div class="pagination">';

		$pages_length = ceil($make_length / 15);
		$j            = 1;

		for ($i = $pages_length; $i > 0; $i--) {
			if ($j === 1) {
				echo "<span class='active'>{$j}</span>";
				continue;
			}

			echo "<span>{$j}</span>";

			$j++;
		}

		echo '</div>';
	}

	?>
</div>

<div class="articles-trigger" data-arrow="useful">
	<img src="img/ico/minus.svg" alt="minus">
	Полезное
</div>

<div class="articles-wrapper" data-target="useful">
	<?php

	$get_useful = mysql_query("SELECT id, date, header_{$lang}, cut_{$lang}, photo FROM articles WHERE type = 'useful'");

	while ($useful = mysql_fetch_array($get_useful)) {

		$id     = $useful['id'];
		$date   = $useful['date'];
		$header = $useful[2];
		$cut    = $useful[3];
		$photo  = $useful['photo'];

		echo <<<HTML
			<div class="article">
				<div class="header">
					<div class="title">{$header}</div>
					<div class="date">Опубликовано {$date}</div>
				</div>
				<div class="wrapper">
					<img src="img/articles/{$photo}" alt="$header">
					<div class="text">
						{$cut}
						<a href="?page=article&id={$id}" class="more">
							Подробнее...
						</a>
					</div>
				</div>
			</div>
HTML;
	}

	$count_useful  = mysql_query("SELECT count(id) as result_count FROM articles WHERE type = 'useful'"); 
	$useful_length = (int) mysql_result($count_useful, 0);

	if ($useful_length > 15) {
		echo '<div class="pagination">';

		$pages_length = ceil($useful_length / 15);
		$j            = 1;

		for ($i = $pages_length; $i > 0; $i--) {
			if ($j === 1) {
				echo "<span class='active'>{$j}</span>";
				continue;
			}

			echo "<span>{$j}</span>";

			$j++;
		}

		echo '</div>';
	}

	?>
</div>