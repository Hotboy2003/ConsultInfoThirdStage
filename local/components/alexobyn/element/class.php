<?php

class Element extends CBitrixComponent
{
	public function executeComponent()
	{
		if ($this->StartResultCache(false))
		{
			$this->fetchGroupList();

			if (empty($this->arResult["GROUPS"]))
			{
				$this->AbortResultCache();
			}

			$this->IncludeComponentTemplate();
		}

	}

	protected function fetchGroupList()
	{
		$arFilter = ['ID' => $this->arParams['ELEMENT_ID']];
		$arSelect = ['ID', 'NAME', 'DESCRIPTION'];
		$groupsObject = CGroup::GetList($by = 'id', $order = 'asc', $arFilter);
		$groups = [];

		while ($group = $groupsObject->Fetch())
		{
			$groups[] = $group;
		}

		$this->arResult['PAGE_TITLE'] = $this->arParams['ELEMENT_ID'].' группа';
		$this->arResult["GROUPS"] = $groups;
	}
}