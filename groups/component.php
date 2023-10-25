<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

$arDefaultUrlTemplates404 = [
	"index" => "",
	"detail" => "#ELEMENT_ID#/",
];
$arDefaultVariableAliases404 = [];
$arDefaultVariableAliases = [];
$arComponentVariables = [
	"ELEMENT_ID",
	"ELEMENT_CODE",
];

/* $arParams["SEF_MODE"] == "Y" */
$arVariables = [];

$arUrlTemplates = CComponentEngine::makeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
$arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

$engine = new CComponentEngine($this);

if (CModule::IncludeModule('iblock'))
{
    $engine->addGreedyPart("#SECTION_CODE_PATH#");
    $engine->setResolveCallback(array("CIBlockFindTools", "resolveComponentEngine"));
}

$componentPage = $engine->guessComponentPath(
    $arParams["SEF_FOLDER"],
    $arUrlTemplates,
    $arVariables
);

$b404 = false;
if (!$componentPage)
{
    $componentPage = "index";
    $b404 = true;
}

if ($b404 && CModule::IncludeModule('iblock'))
{
    $folder404 = str_replace("\\", "/", $arParams["SEF_FOLDER"]);
    if ($folder404 != "/")
        $folder404 = "/".trim($folder404, "/ \t\n\r\0\x0B")."/";
    if (substr($folder404, -1) == "/")
        $folder404 .= "index.php";

    if ($folder404 != $APPLICATION->GetCurPage(true))
    {
        \Bitrix\Iblock\Component\Tools::process404(
            ""
            ,($arParams["SET_STATUS_404"] === "Y")
            ,($arParams["SET_STATUS_404"] === "Y")
            ,($arParams["SHOW_404"] === "Y")
            ,$arParams["FILE_404"]
        );
    }
}

CComponentEngine::initComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

$arResult = [
    "FOLDER" => $arParams["SEF_FOLDER"],
    "URL_TEMPLATES" => $arUrlTemplates,
    "VARIABLES" => $arVariables,
    "ALIASES" => $arVariableAliases,
];
/* end $arParams["SEF_MODE"] == "Y" */

$this->includeComponentTemplate($componentPage);