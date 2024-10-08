<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
$this->setFrameMode(true);

$APPLICATION->IncludeComponent(
	"alexobyn:element",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"PAGE_TITLE" => "Список групп",
		"ELEMENT_ID" => $arResult['VARIABLES']['ELEMENT_ID'],
	), $component
);