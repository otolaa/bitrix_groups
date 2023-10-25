<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arCurrentValues */

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;

$arComponentParameters = [
	"GROUPS" => [],
	"PARAMETERS" => [
		"HEADER_TITLE" => ["DEFAULT"=>'Группы пользователей', "NAME" => GetMessage("T_HEADER_TITLE")],
		"CACHE_TIME" => ["DEFAULT"=>300],
	],
];
