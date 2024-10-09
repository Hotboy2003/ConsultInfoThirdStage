<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">

<head>
	<? $APPLICATION->ShowHead();  ?>
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<? $APPLICATION->SetAdditionalCSS("https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"); ?>
	<?php $APPLICATION->ShowHead(); ?>
</head>
<body>
<?php $APPLICATION->showPanel(); ?>
<div class="top-left">
	<a href="/groups/" class="btn btn-primary">На главную</a>
</div>