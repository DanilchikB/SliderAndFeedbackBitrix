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
<script>
$(document).ready(function(){
    $("#feedback_submit").click(function(){
        $("#no_name").hide();
        $("#no_phone").hide();
        $("#wrong_phone").hide();
        $("#no_email").hide();
        $("#wrong_email").hide();
        $("#no_massage").hide();
        $("#no_consent").hide();
        $("#success").hide();
        $("#error").hide();
        // собираем данные для отправки
        var user_name    = $("#user_name").val();
        var user_phone   = $("#user_phone").val();
        var user_email   = $("#user_email").val();
        var massage      = $("#message").val();
        var iblock_type  = $("#iblock_type").val();
        var iblock_id    = $("#iblock_id").val();
        var email_to     = $("#email_to").val();
        var event_name   = $("#event_name").val();
        //Собираем данные для проверки на обязательные поля
        var no_name      = $("#no_name").attr("id");
        var no_phone     = $("#no_phone").attr("id");
        var no_email     = $("#no_email").attr("id");
        var no_massage   = $("#no_massage").attr("id");
        var no_consent   = $("#no_consent").attr("id");
        var check_consent= $("#consent").prop("checked");
        var fail         = "";
        var check_email  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (no_name !== undefined && user_name.length == 0){
            $("#no_name").show();
            fail = "yes";
        }
        if (no_phone !== undefined && user_phone.length == 0){
            $("#no_phone").show();
            fail = "yes";
        }else if(no_phone !== undefined && (user_phone.length != 11 || !isFinite(user_phone))){
            $("#wrong_phone").show();
            fail = "yes";
        }
        if (no_email !== undefined && user_email.length == 0){
            $("#no_email").show();
            fail = "yes";
        }else if(no_email !== undefined && !check_email.test(user_email)){
            $("#wrong_email").show();
            fail = "yes";
        }
        if (no_massage !== undefined && massage.length == 0){
            $("#no_massage").show();
            fail = "yes";
        } 
        if (no_consent !== undefined && !check_consent){
            $("#no_consent").show();
            fail = "yes";
        }
        
            $.ajax({
                url: "/ajax/feedback.php", 
                method: "POST",
                cache: false,
                data: { 
                    "user_name":    user_name,
                    "user_phome": user_phone,
                    "user_email":user_email,
                    "massage":massage,
                    "iblock_type":iblock_type,
                    "iblock_id":iblock_id,
                    "email_to":email_to,
                    "event_name":event_name,
                },
                dataType: "html",
                success: function (data){
                    alert(data);
                },
            });
            
            
        
    });
});

</script>
<div class="mfeedback" id="modal-form">
    <div class="mf-name">
        <div class="mf-text">
            <?="Ваше имя"?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_name">
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id ="no_name" class="mf-req" hidden="true">Вы не ввели имя</div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?="Ваш телефон"?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_phone">
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_phone" class="mf-req" hidden="true">Вы не ввели телефон</div>
        <div id="wrong_phone" class="mf-req" hidden="true">Вы не правильно ввели телефон</div>
    <?php endif;?>
    
    <div class="mf-email">
        <div class="mf-text">
            <?="Ваш e-mail"?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <input type="text" id="user_email">
    </div>
     <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_email" class="mf-req" hidden="true">Вы не ввели Email</div>
        <div id="wrong_email" class="mf-req" hidden="true">Вы не правильно ввели Email</div>
     <?php endif;?>
     
    <div class="mf-message">
        <div class="mf-text">
            <?="Сообщение"?>
            <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
                <span class="mf-req">*</span>
            <?php endif;?>
        </div>
        <textarea id="message" rows="5" cols="40"></textarea>
    </div>
    <!--Сообщение об ошибке-->
    <?php if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && !in_array("NONE", $arParams["REQUIRED_FIELDS"])):?>
        <div id="no_massage" class="mf-req" hidden="true">Вы не ввели сообщение</div>
    <?php endif;?>
    
    <?php if($arParams["USE_CONSENT"] == "Y"):?>
        <div>
            <div>
            <input type="checkbox" id ="consent">
            Cогласен с политикой конфиденциальности и обработки персональных данных<span class="mf-req">*</span>
            </div>
        </div>
        <!--Сообщение об ошибке-->
            <div id="no_consent" class="mf-req" hidden="true">Нет согласия на обработкой персональных данных</div>
    
    <?php endif;?>
    
    <input type="hidden" id="iblock_type" value="<?=$arParams["IBLOCK_TYPE"]?>">
    <input type="hidden" id="iblock_id" value="<?=$arParams["IBLOCK_ID"]?>">
    <input type="hidden" id="email_to" value="<?=$arParams["EMAIL_TO"]?>">
    <input type="hidden" id="event_name" value="<?=$arParams["EVENT_NAME"]?>">
    <input id="feedback_submit" type="submit" value="<?="Отправить"?>">

<div>
    <div id="success" class="mf-ok-text" hidden="true">Отправлено</div>
    <div id="error" class="mf-req" hidden="true">Ошибка</div>
</div>
</div>