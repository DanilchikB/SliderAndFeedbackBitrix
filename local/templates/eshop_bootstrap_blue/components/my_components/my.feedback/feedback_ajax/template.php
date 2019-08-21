<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>

<div class="mfeedback" >
    <div class="mf-name">
        <div class="mf-text">
            <?=GetMessage("MFT_NAME")?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_name">
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id ="no_name" class="mf-req" hidden="true"><?=GetMessage("MFT_NAME")?></div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?=GetMessage("MFT_PHONE")?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_phone">
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_phone" class="mf-req" hidden="true"><?=GetMessage("NO_PHONE")?></div>
        <div id="wrong_phone" class="mf-req" hidden="true"><?=GetMessage("WRONG_PHONE")?></div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?=GetMessage("MFT_EMAIL")?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_email">
    </div>
     <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_email" class="mf-req" hidden="true"><?=GetMessage("NO_EMAIL")?></div>
        <div id="wrong_email" class="mf-req" hidden="true"><?=GetMessage("WRONG_EMAIL")?></div>
     <?php endif;?>
     
    <div class="mf-message">
        <div class="mf-text">
            <?=GetMessage("MFT_MESSAGE")?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <textarea id="message" rows="5" cols="40"></textarea>
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_massage" class="mf-req" hidden="true"><?=GetMessage("NO_MESSAGE")?></div>
    <?php endif;?>
    
    <?php if($arParams["USE_CONSENT"] == "Y"):?>
        <div>
            <div>
            <input type="checkbox" id ="consent">
            <?=GetMessage("MFT_CONSENT")?><span class="mf-req">*</span>
            </div>
        </div>
        <!--Сообщение об ошибке-->
            <div id="no_consent" class="mf-req" hidden="true"><?=GetMessage("NO_CONSENT")?></div>
    
    <?php endif;?>
    
    <input type="hidden" id="iblock_type" value="<?=$arParams["IBLOCK_TYPE"]?>">
    <input type="hidden" id="iblock_id" value="<?=$arParams["IBLOCK_ID"]?>">
    <input type="hidden" id="email_to" value="<?=$arParams["EMAIL_TO"]?>">
    <input type="hidden" id="event_name" value="<?=$arParams["EVENT_NAME"]?>">
    <input id="feedback_submit" type="submit" value="<?="Отправить"?>">

<div>
    <div id="success" class="mf-ok-text" hidden="true"><?=GetMessage("SUCCESS")?></div>
    <div id="error" class="mf-req" hidden="true"><?=GetMessage("ERROR")?></div>
</div>
</div>