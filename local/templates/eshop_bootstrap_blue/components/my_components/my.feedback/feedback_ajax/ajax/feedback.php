<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


    
    $arr = Array(
        $_POST["user_name"],
        $_POST["user_phone"],
        $_POST["user_email"],
        $_POST["message"],
    );//Массив для передачи в поля инфоблока
    CModule::IncludeModule('iblock');
    
    $el = new CIBlockElement;
    $iblock_type = $_POST["iblock_type"];
    $iblock_id = $_POST["iblock_id"];
    $PROP = array();
    $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "id"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$iblock_id));
    $i = 0; //Переменная для перебора массива $arr с полями 
    while ($prop_fields = $properties->GetNext() and $i < count($arr))
    {
        $PROP[$prop_fields["ID"]] = htmlspecialcharsbx($arr[$i]); //Присваиваем значения полям инфоблока для отпраки(Поля свойств инфоблока по должны совпадать с полями обратной свзяи)
        $i++;
    }
    $fields = array(
    "DATE_CREATE" => date("d.m.Y H:i:s"), //Передаем дата создания
    "IBLOCK_ID" => $iblock_id, 
    "PROPERTY_VALUES" => $PROP, // Передаем массив значении для свойств
    "NAME" => date("d.m.Y H:i:s"),
    );
    if($ID = $el->Add($fields)){//Отправляем значения в инфоблок, 
    //если успешно, переходим к отправке почтового шаблона
    
        $rsSites = CSite::GetByID(SITE_ID);//Получаем SERVER_NAME
        $arSite = $rsSites->Fetch();
        
        $viewLink = "http://".$arSite[SERVER_NAME]."/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=".$iblock_id."&type=".$iblock_type."&ID=".$ID."&lang=ru&find_section_section=0&WF=Y";//Ссылка на детальный просмотр - редактирование, без только без использования разделов
        $arFields = Array(
            "AUTHOR" => $_POST["user_name"],
            "PHONE" => $_POST["user_phone"],
            "AUTHOR_EMAIL" => $_POST["user_email"],
            "EMAIL_TO" => $_POST["email_to"],
            "TEXT" => $_POST["message"],
            "VIEW_LINK" =>$viewLink ,
        );
        
        if(CEvent::Send($_POST["event_name"], SITE_ID, $arFields))//отправка в почтовый шаблон
            echo "success";
    }



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php")?>