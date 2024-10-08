<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<div class="container mt-5">
	<h2><?= $arResult['PAGE_TITLE'] ?></h2>
	<? if (empty($arResult['GROUPS'])): ?>
	<h3>Такой группы не существует</h3>
	<? else: ?>
	<table class="table table-bordered">
		<thead class="thead-light">
		<tr>
			<th>ID</th>
			<th>Название группы</th>
			<th>Описание группы</th>
		</tr>
		</thead>
		<tbody>
		<? foreach ($arResult['GROUPS'] as $group): ?>
		<tr>
			<td><?= $group['ID'] ?></td>
			<td><?= $group['NAME'] ?></td>
			<td><?= $group['DESCRIPTION'] ?></td>
		</tr>
		<? endforeach;?>
		</tbody>
	</table>
	<? endif; ?>
</div>