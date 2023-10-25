<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\Loader,
	Bitrix\Main,
	Bitrix\Iblock;

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 300;

if ($this->startResultCache(false, false))
{
	if(!Loader::includeModule("iblock"))
	{
		$this->abortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}

    $result = \Bitrix\Main\GroupTable::getList([
        'select'  => ['*'],
        'filter'  => ['ID'=>intval($arParams['ELEMENT_ID'])]
    ]);

    while ($arGroup = $result->fetch())
        $arResult['ITEMS'] = $arGroup;

	$this->setResultCacheKeys([
		"ITEMS",
	]);

	$this->includeComponentTemplate();
}

if ($arParams['ELEMENT_ID'] && !empty($arResult['ITEMS'])) :
    $APPLICATION->SetTitle($arResult['ITEMS']['NAME']);
    $APPLICATION->AddChainItem($arResult['ITEMS']['NAME']);
endif;
