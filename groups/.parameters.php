<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arCurrentValues */

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;

$arComponentParameters = [
	"GROUPS" => [],
	"PARAMETERS" => [
		"SEF_MODE" =>
        [
            "index" => [
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS"),
                "DEFAULT" => "",
                "VARIABLES" => [],
            ],
            "detail" => [
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_DETAIL"),
                "DEFAULT" => "#ELEMENT_ID#/",
                "VARIABLES" => ["ELEMENT_ID"],
            ],
        ],
		"HEADER_TITLE" => ["DEFAULT"=>'Группы пользователей', "NAME" => GetMessage("T_HEADER_TITLE")],
		"CACHE_TIME" => ["DEFAULT"=>300],
	],
];
