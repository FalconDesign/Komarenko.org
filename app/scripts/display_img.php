<?php

function displayimg($path) {

	$result = '';
	$images = scandir($path);

	if (false !== $images) {
		$images = preg_grep('/\\.(?:png|jpe?g)$/', $images);

		foreach ($images as $image) {
			$result .= "<img src='{$path}{$image}' alt='partner'>";
		}
	}

	echo $result;
}

?>