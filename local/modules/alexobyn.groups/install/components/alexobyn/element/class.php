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
		$groupId = (int)$this->arParams['ELEMENT_ID'];

		$filter = Array
		(
			"GROUPS_ID"           => Array($groupId)
		);

		$selectFields = ['ID', 'NAME', 'LAST_NAME', 'EMAIL', 'LOGIN'];

		$usersObject = CUser::GetList(($by = "id"), ($order = "asc"), $filter, ['SELECT' => $selectFields]);

		while($user=$usersObject->Fetch())
		{
			$users[] = $user;
		}

		$this->arResult['GROUP'] = $groupId;
		$this->arResult['USERS'] = $users;
		$this->arResult['PAGE_TITLE'] = 'Пользователи группы ' . $groupId;
	}
}