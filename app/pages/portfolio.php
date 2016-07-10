<?php

require_once 'scripts/connect.php';

$lang      = $_SESSION['lang'];
$get_boxes = mysql_query("SELECT type, position, text_{$lang} FROM portfolio_page");
$i         = 0; // 'id' and 'for' number of checkboxes (should be incremented in cycle)

while ($box = mysql_fetch_array($get_boxes)) {
	switch ($box['type']) {

		case 'checkbox':
			switch ($box['position']) {
				case 'top_box':
					$top_box[]    = $box[2];
					break;
				case 'middle_box':
					$middle_box[] = $box[2];
					break;
				case 'bottom_box':
					$bottom_box[] = $box[2];
					break;
			}
			break;
		
		case 'header':
			switch ($box['position']) {
				case 'header':
					$head           = $box[2];
					break;
				case 'top_box':
					$top_head       = $box[2];
					break;
				case 'middle_box':
					$middle_head    = $box[2];
					break;
				case 'bottom_box':
					$bottom_head    = $box[2];
					break;
				case 'random-portfolio':
					$portfolio_head = $box[2];
					break;
			}
			break;
		
		case 'link':
			switch ($box['position']) {
				case 'random-portfolio':
					$portfolio_link = $box[2];
					break;
				case 'button':
					$display = $box[2];
					break;
			}
			break;
		
		case 'text':
			switch ($box['position']) {
				case 'top':
					$top_text = $box[2];
					break;
				case 'bottom':
					$bottom_text = $box[2];
					break;
			}
			break;
		
		case 'indicator':
			switch ($box['position']) {
				case 'top_box':
					$no_choosen = $box[2];
					break;
			}
			break;
	}
}

?>

<h1><?= $head ?></h1>

<div class="checkbox-header">
	<h2><?= $top_head ?></h2>
	<span><?= $no_choosen ?></span>
</div>
<div class="checkbox-wrapper">
	<?php

	foreach ($top_box as $value) {
		echo <<<HTML
			<div>
				<input type="checkbox" id="option-{$i}">
				<label for="option-{$i}">
					{$value}
				</label>
			</div>
HTML;
		$i++;
	}

	?>
</div>
<div class="checkbox-header">
	<h2><?= $middle_head ?></h2>
</div>
<div class="checkbox-wrapper">
	<?php

	foreach ($middle_box as $value) {
		echo <<<HTML
			<div>
				<input type="checkbox" id="option-{$i}">
				<label for="option-{$i}">
					{$value}
				</label>
			</div>
HTML;
		$i++;
	}

	?>
</div>
<div class="checkbox-header">
	<h2><?= $bottom_head ?></h2>
</div>
<div class="checkbox-wrapper">
	<?php

	foreach ($bottom_box as $value) {
		echo <<<HTML
			<div>
				<input type="checkbox" id="option-{$i}">
				<label for="option-{$i}">
					{$value}
				</label>
			</div>
HTML;
		$i++;
	}

	?>
</div>

<div class="render-portfolio">
	<div class="btn" id="render-portfolio"><?= $display ?></div> <!-- ZALUPA -->
</div>

<div class="trigger" data-arrow="random-portfolio">
	<h2><img src="img/ico/plus_black.svg" alt="minus"> <span><?= $portfolio_head ?></span></h2>
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
					<div class="name">{$name}</div>
					<img src="img/portfolio/{$photo}">
				</div>
HTML;
		}

		?>
	</div>
	<div class="all-portfolio">
		<a href="#"><?= $portfolio_link ?></a>
	</div>
</div>

<?= $top_text ?>
<?= $bottom_text ?>