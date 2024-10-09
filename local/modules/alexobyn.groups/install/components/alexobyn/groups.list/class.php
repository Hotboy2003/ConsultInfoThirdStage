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
			$groupsObject = CGroup::GetList();
			$groups = [];

			while ($group = $groupsObject->Fetch())
			{
				$groups[] = $group;
			}

			$this->arResult["GROUPS"] = $groups;
	}
}