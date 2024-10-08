<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?$APPLICATION->IncludeComponent(
	"alexobyn:complexGroup.list",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"PAGE_TITLE" => "Список групп",
		"SEF_FOLDER" => "/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("groups"=>"groups/","element"=>"groups/#ELEMENT_ID#/")
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>