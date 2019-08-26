<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent(
    "my_components:my.feedback", 
    "feedback_ajax", 
    array(
        "EMAIL_TO" => "maximv201@mail.ru",
        "EVENT_MESSAGE_ID" => "7",
        "IBLOCK_ID" => "5",
        "IBLOCK_TYPE" => "feedback",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "PHONE",
        ),
        "USE_CONSENT" => "Y",
        "COMPONENT_TEMPLATE" => "feedback_ajax"
    ),
    false
);