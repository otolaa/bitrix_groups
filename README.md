## complex component in /local/bitrix/ for group user
```
# complex component
groups

# list group
groups.line

# detail group
groups.detail
```

## include complex component for index in page /groups/index.php
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

## add array in urlrewrite.php

```
array (
    'CONDITION' => '#^/groups/#',
    'RULE' => '',
    'ID' => 'bitrix:groups',
    'PATH' => '/groups/index.php',
    'SORT' => 100,
  )
```