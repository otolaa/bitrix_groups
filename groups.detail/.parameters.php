<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arCurrentValues */

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;

$arComponentParameters = [
	"GROUPS" => [],
	"PARAMETERS" => [
		"ELEMENT_ID" => ["DEFAULT"=>'', "NAME" => GetMessage("T_ID_GROUP")],
		"HEADER_TITLE" => ["DEFAULT"=>'Группы пользователей', "NAME" => GetMessage("T_HEADER_TITLE")],
		"CACHE_TIME" => ["DEFAULT"=>300],
	],
];
