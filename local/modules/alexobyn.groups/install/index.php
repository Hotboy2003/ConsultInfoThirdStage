<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

class alexobyn_groups extends CModule
{
	public $MODULE_ID = 'alexobyn.groups';
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;

	public function __construct()
	{
		$arModuleVersion = [];
		include(__DIR__ . '/version.php');

		if (is_array($arModuleVersion) && $arModuleVersion['VERSION'] && $arModuleVersion['VERSION_DATE'])
		{
			$this->MODULE_VERSION = $arModuleVersion['VERSION'];
			$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
		}

		$this->MODULE_NAME = Loc::getMessage('ALEXOBYN_GROUPS_MODULE_NAME');
		$this->MODULE_DESCRIPTION = Loc::getMessage('ALEXOBYN_GROUPS_MODULE_DESCRIPTION');
	}

	public function installFiles()
	{
		CopyDirFiles(
			__DIR__ . '/components',
			__DIR__ . '/../../../components',
			true,
			true
		);

		CopyDirFiles(
			__DIR__ . '/templates',
			__DIR__ . '/../../../templates',
			true,
			true
		);
	}

	private function recursiveRemoveDir($dir)
	{
		$includes = new FilesystemIterator($dir);

		foreach ($includes as $include)
		{
			if(is_dir($include) && !is_link($include))
			{
				$this->recursiveRemoveDir($include);
			}
			else
			{
				unlink($include);
			}
		}
		rmdir($dir);
	}

	public function uninstallFiles()
	{
		$componentsPath = __DIR__ . '/../../../components/alexobyn';
		$templatesPath = __DIR__ . '/../../../templates/main';

		$this->recursiveRemoveDir($componentsPath);
		$this->recursiveRemoveDir($templatesPath);

		return false;
	}

	public function doInstall()
	{
		global $USER, $APPLICATION;

		if (!$USER->isAdmin())
		{
			return;
		}

		RegisterModule($this->MODULE_ID);

		$this->installFiles();

		$APPLICATION->IncludeAdminFile(
			Loc::getMessage('ALEXOBYN_GROUPS_INSTALL_TITLE'),
			__DIR__ . '/step.php'
		);
	}

	public function doUninstall()
	{
		global $USER, $APPLICATION, $step;

		if (!$USER->isAdmin())
		{
			return;
		}
		$step = (int)$step;

		UnRegisterModule($this->MODULE_ID);
		$this->uninstallFiles();

		if ($step<2)
		{
			$APPLICATION->IncludeAdminFile(
				Loc::getMessage('ALEXOBYN_GROUPS_UNINSTALL_TITLE'),
				__DIR__ . '/unstep1.php'
			);
		}
		elseif ($step===2)
		{
			$APPLICATION->IncludeAdminFile(
				Loc::getMessage('ALEXOBYN_GROUPS_UNINSTALL_TITLE'),
				__DIR__ . '/unstep2.php'
			);
		}
	}
}