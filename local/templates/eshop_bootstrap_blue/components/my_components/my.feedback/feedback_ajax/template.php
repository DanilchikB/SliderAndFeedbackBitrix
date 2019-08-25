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
<?php
$isRequired = function($field) use ($arParams) {
    return (empty($arParams["REQUIRED_FIELDS"]) || in_array($field, $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"]);
};
?>

<div class="mfeedback" >
<form id="feedback_form">
    <div class="mf-name">
        <div class="mf-text">
            <?=GetMessage("MFT_NAME")?>
            <?php if($isRequired('NAME')):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_name" name="user_name">
    </div>
    <!--Сообщение об ошибке-->
    <?php if($isRequired('NAME')):?>
        <div id ="no_name" class="error-message" hidden="true"><?=GetMessage("NO_NAME")?></div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?=GetMessage("MFT_PHONE")?>
            <?php if($isRequired('PHONE')):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_phone" name="user_phone">
    </div>
    <!--Сообщение об ошибке-->
    <?php if($isRequired('PHONE')):?>
        <div id="no_phone" class="error-message" hidden="true"><?=GetMessage("NO_PHONE")?></div>
        <div id="wrong_phone" class="error-message" hidden="true"><?=GetMessage("WRONG_PHONE")?></div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?=GetMessage("MFT_EMAIL")?>
            <?php if($isRequired('EMAIL')):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_email" name="user_email">
    </div>
     <!--Сообщение об ошибке-->
    <?php if($isRequired('EMAIL')):?>
        <div id="no_email" class="error-message" hidden="true"><?=GetMessage("NO_EMAIL")?></div>
        <div id="wrong_email" class="error-message" hidden="true"><?=GetMessage("WRONG_EMAIL")?></div>
     <?php endif;?>
     
    <div class="mf-message">
        <div class="mf-text">
            <?=GetMessage("MFT_MESSAGE")?>
            <?php if($isRequired('MESSAGE')):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <textarea id="message" rows="5" cols="40" name="message"></textarea>
    </div>
    <!--Сообщение об ошибке-->
    <?php if($isRequired('MESSAGE')):?>
        <div id="no_massage" class="error-message" hidden="true"><?=GetMessage("NO_MESSAGE")?></div>
    <?php endif;?>
    
    <?php if($arParams["USE_CONSENT"] == "Y"):?>
        <div>
            <div>
            <input type="checkbox" id ="consent">
            <?=GetMessage("MFT_CONSENT")?><span class="mf-req">*</span>
            </div>
        </div>
        <!--Сообщение об ошибке-->
            <div id="no_consent" class="error-message" hidden="true"><?=GetMessage("NO_CONSENT")?></div>
    
    <?php endif;?>
    
    <input type="hidden" id="iblock_type" name="iblock_type" value="<?=$arParams["IBLOCK_TYPE"]?>">
    <input type="hidden" id="iblock_id" name="iblock_id" value="<?=$arParams["IBLOCK_ID"]?>">
    <input type="hidden" id="email_to" name="email_to" value="<?=$arParams["EMAIL_TO"]?>">
    <input type="hidden" id="event_name" name="event_name" value="<?=$arParams["EVENT_NAME"]?>">
    <input type="submit" value="<?="Отправить"?>">
</form>
<div>
    <div id="success" class="success-message" hidden="true"><?=GetMessage("SUCCESS")?></div>
    <div id="error" class="error-message" hidden="true"><?=GetMessage("ERROR")?></div>
</div>
</div>