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
        if(fail == ""){
            $.ajax({
                url: "local/templates/eshop_bootstrap_blue/components/my_components/my.feedback/feedback_ajax/ajax/feedback.php", 
                method: "POST",
                cache: false,
                data: { 
                    "user_name":    user_name,
                    "user_phone": user_phone,
                    "user_email":user_email,
                    "message":massage,
                    "iblock_type":iblock_type,
                    "iblock_id":iblock_id,
                    "email_to":email_to,
                    "event_name":event_name,
                },
                dataType: "html",
                success: function (data){
                    if(data == "success")
                        $("#success").show();
                    else $("#error").show();
                },
            });
        }    
            
        
    });
});

