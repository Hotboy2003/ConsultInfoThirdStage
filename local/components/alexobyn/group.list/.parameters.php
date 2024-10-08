<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
		"CACHE_SETTINGS" => array(
			"NAME" => "Настройки кэширования",
			"SORT" => 2,
		),
		"PAGE_SETTINGS" => array(
			"NAME" => "Настройки страницы",
			"SORT" => 1,
		),
	),
	"PARAMETERS" => array(
		"CACHE_TIME" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => "Время кэширования",
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"ADDITIONAL_VALUES" => "Y",
			"DEFAULT" => "3600",
		),
		"PAGE_TITLE" => array(
			"PARENT" => "PAGE_SETTINGS",
			"NAME" => "Заголовок страницы",
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"MULTIPLE" => "N",
			"ADDITIONAL_VALUES" => "Y",
			"DEFAULT" => "Список групп",
		),
	),
);

?>