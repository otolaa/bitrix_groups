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
        'select'  => ['NAME','ID','STRING_ID','C_SORT'], // выберем название, идентификатор, символьный код, сортировку
    ]);

    while ($arGroup = $result->fetch()) {
        $arGroup['DETAIL_PAGE_URL'] = str_replace('#ID', $arGroup['ID'], $arParams['SEF_FOLDER'].'#ID/');
        $arResult['ITEMS'][] = $arGroup;
    }

	$this->setResultCacheKeys([
		"ITEMS",
	]);

	$this->includeComponentTemplate();
}

if ($arParams['HEADER_TITLE'] && strlen($arParams['HEADER_TITLE']) > 0)
    $APPLICATION->SetTitle($arParams['HEADER_TITLE']);
