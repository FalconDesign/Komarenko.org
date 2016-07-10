<h1>Контакты</h1>

<?php

$lang         = $_SESSION['lang'];
$get_contacts = mysql_query("SELECT orders_and_advice,
									suggestions_and_complaints,
									social_network,
									top_{$lang},
									address_{$lang},
									bottom_{$lang}
							FROM contacts WHERE id = 1");

$contacts     = mysql_fetch_array($get_contacts);

?>

<p>
	<?= $contacts[3] ?>
</p>

<div class="contacts">
	<div class="left-col">
		<div class="header">Заказы и консультация</div>
		<p>
			<?= $contacts['orders_and_advice'] ?>
		</p>
		<div class="header">Предложения и жалобы</div>
		<p>
			<?= $contacts['suggestions_and_complaints'] ?>
		</p>
		<div class="header">Соц.сети</div>
		<p>
			<?= $contacts['social_network'] ?>
		</p>
	</div>
	<div class="right-col">
		<label>Как Вас зовут?</label>
		<input type="text" placeholder="Как к Вам обращаться?">
		<label>Контактная информация (E-Mail, Spype, ICQ, телефон):</label>
		<input type="text" placeholder="Мы свяжемся с вами через данные контакты">
		<label>Что нужно сделать?</label>
		<textarea name="" id="" cols="30" rows="10" placeholder="Детально распишите вашу задачу"></textarea>
		<label>С каким <a href="#">уровнем исполнителя</a> вы хотите работать:</label>
		<select name="executor-level" id="executor-level">
			<option value="">Выбрать...</option>
			<option value="option">Специалист</option>
			<option value="option">Опытные</option>
			<option value="option">VIP</option>
			<option value="option">Не могу определиться</option>
		</select>
		<div class="buttons">
			<div class="attach-brief">
				<input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
				<label for="file"><span>Прикрепить бриф</span></label>
			</div>
			<div class="btn">Отправить</div>
		</div>
	</div>
</div>

<div class="trigger" data-arrow="briefs">
	<h2><img src="img/ico/minus_black.svg" alt="minus"> <span>Свернуть брифы</span></h2>
</div>
<div class="files" data-target="briefs">
	<div class="left-col">
		<a href="#">
			<img src="img/ico/word.jpg" alt="word icon">
			Бриф - копирайтинг для главной
		</a>
	</div>
	<div class="right-col">
		<a href="#">
			<img src="img/ico/word.jpg" alt="word icon">
			Бриф - копирайтинг для главной
		</a>
	</div>
</div>

<h2>Карта проезда</h2>
<p>
	<?= $contacts[4] ?>
</p>

<div class="map" id="map"></div>

<p>
	<?= $contacts[5] ?>
</p>
