<?php
use \Bitrix\Main\Data\Cache;

class GroupList extends CBitrixComponent
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

			$this->includeComponentTemplate();
		}
	}

	protected function fetchGroupList()
	{
		$selectFields = ['ID', 'NAME', 'DESCRIPTION'];

			$groupsObject = CGroup::GetList(($by = "id"), ($order = "asc"), ['SELECT' => $selectFields]);
			$groups = [];

			while ($group = $groupsObject->Fetch())
			{
				$groups[] = $group;
			}

			$this->arResult["GROUPS"] = $groups;
	}
}