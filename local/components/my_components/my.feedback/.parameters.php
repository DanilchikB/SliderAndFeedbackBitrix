<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//Инфоблок
if(!CModule::IncludeModule("iblock"))//Проверяем и подключаем модуль информационные блоки
    return;


$arIBlockType = CIBlockParameters::GetIBlockTypes();//Типы инфоблоков

$arIBlock = array();//инфоблоки
$rsIBlock = CIBlock::GetList(
                                Array("SORT"=>"ASC"), 
                                Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], 
                                      "ACTIVE"=>"Y")
                            );
while($arr=$rsIBlock->Fetch())
{
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}
//Почтовое событие
$arFilter = Array("ACTIVE" => "Y");

$arEvent = Array();
$dbType = CEventMessage::GetList($by="ID", $order="DESC", $arFilter);
while($arType = $dbType->GetNext())
    $arEvent[$arType["ID"]] = "[".$arType["ID"]."] ".$arType["SUBJECT"];

//Параметры компонентаы
$arComponentParameters = Array(
    "PARAMETERS" => Array(
        "IBLOCK_TYPE" => Array(
            "PARENT" => "BASE",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arIBlockType,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => Array(
            "PARENT" => "BASE",
            "NAME" => "Инфобок для сохранения(поля инфоблока должны совпадать с полями формы)",
            "TYPE" => "LIST",
            "VALUES" => $arIBlock,
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "USE_CONSENT" => Array(
            "NAME" => "Согласие на обработку персональных данных", 
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y", 
            "PARENT" => "BASE",
        ),
        "EMAIL_TO" => Array(
            "NAME" => "Email на который будут отправлятся сообщения", 
            "TYPE" => "STRING",
            "DEFAULT" => htmlspecialcharsbx(COption::GetOptionString("main", "email_from")), 
            "PARENT" => "BASE",
        ),        
        "EVENT_MESSAGE_ID" => Array(
            "NAME" => "Почтовое событие", 
            "TYPE"=>"LIST", 
            "VALUES" => $arEvent,
            "DEFAULT"=>"FEEDBACK_FORM", 
            "MULTIPLE"=>"N", 
            "COLS"=>25, 
            "PARENT" => "BASE",
        ),
        "REQUIRED_FIELDS" => Array(
            "NAME" => "обязательные поля", 
            "TYPE"=>"LIST", 
            "MULTIPLE"=>"Y", 
            "VALUES" => Array("NONE" => "(все необязательные)", 
                              "NAME" => "[NAME] Ваше имя",
                              "PHONE" =>"[PHONE] Телефон", 
                              "EMAIL" => "[EMAIL] E-mail", 
                              "MESSAGE" =>"[MESSAGE] Сообщение"),
            "DEFAULT"=>"", 
            "COLS"=>25, 
            "PARENT" => "BASE",
        ),
    ),
);
