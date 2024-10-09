<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="container mt-5">
	<?php if(!isset($arResult['USERS'])): ?>
	<h2>Такой группы не существует, либо она пустая</h2>
	<?php else: ?>
	<h1><?= $arResult['GROUP'] . ' группа' ?></h1>
	<table class="table table-bordered">
		<thead class="thead-light">
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Логин</th>
			<th>Почта</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($arResult['USERS'] as $user): ?>
		<tr>
			<td><?= $user['ID'] ?></td>
			<td><?= $user['NAME'] ?></td>
			<td><?= $user['LAST_NAME'] ?></td>
			<td><?= $user['LOGIN'] ?></td>
			<td><?= $user['EMAIL'] ?></td>
		</tr>
		<?php
		endforeach;?>
		</tbody>
	</table>
	<?php endif; ?>
</div>