<?php

use \Bitrix\Main\Data\Cache;

class ComplexGroupList extends CBitrixComponent
{
	private $arComponentVariables = ['groups', 'element_id', 'element_code'];
	private $arDefaultUrlTemplates404 = ['groups' => 'groups/', 'element' => 'groups/#ELEMENT_ID#/'];

	public function executeComponent()
	{
		$arDefaultUrlTemplates404 = [
			'groups' => 'groups.php',
			'element' => 'groups/#ELEMENT_ID#',
		];
		$arDefaultVariableAliases404 = [];
		$arComponentVariables = ['ELEMENT_ID'];

		$arVariables = [];

		$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
			$arDefaultUrlTemplates404,
			$this->arParams['SEF_URL_TEMPLATES']
		);

		$arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
			$arDefaultVariableAliases404,
			$this->arParams['VARIABLE_ALIASES']
		);

		$componentPage = CComponentEngine::ParseComponentPath(
			$this->arParams['SEF_FOLDER'],
			$arUrlTemplates,
			$arVariables
		);

		if (strlen($componentPage) <= 0)
		{
			$componentPage = 'groups';
		}

		CComponentEngine::InitComponentVariables(
			$componentPage,
			$arComponentVariables,
			$arVariableAliases,
			$arVariables
		);

		$SEF_FOLDER = $this->arParams['SEF_FOLDER'];

		$this->arResult = [
			'FOLDER' => $SEF_FOLDER,
			'URL_TEMPLATES' => $arUrlTemplates,
			'VARIABLES' => $arVariables,
			'ALIASES' => $arVariableAliases,
		];

		$this->IncludeComponentTemplate($componentPage);
	}
}
?>