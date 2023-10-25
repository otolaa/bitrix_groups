## include for index in page /groups/
```
<?$APPLICATION->IncludeComponent(
	"bitrix:groups",
	".default",
	array(
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "300",
		"CACHE_GROUPS" => "Y",
		"SEF_FOLDER" => "/groups/",
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_MODE" => "Y",
		"HEADER_TITLE" => "Группы пользователей",
		"SEF_URL_TEMPLATES" => [
			"index" => "",
			"detail" => "#ELEMENT_ID#/",
		]
	),
	false
);?>
```