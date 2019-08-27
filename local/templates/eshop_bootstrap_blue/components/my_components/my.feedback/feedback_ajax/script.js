$(document).ready(function(){
    $("#feedback_form").submit(function(event){
        event.preventDefault();
        $('.success-message, .error-message').hide();
        // собираем данные для отправки
        var form_data    = $("#feedback_form").serialize();
        var user_name    = $("#user_name").val();
        var user_phone   = $("#user_phone").val();
        var user_email   = $("#user_email").val();
        var massage      = $("#message").val();
        //Собираем данные для проверки на обязательные поля
        var no_name      = $("#no_name").attr("id");
        var no_phone     = $("#no_phone").attr("id");
        var no_email     = $("#no_email").attr("id");
        var no_massage   = $("#no_massage").attr("id");
        var no_consent   = $("#no_consent").attr("id");
        var check_consent= $("#consent").prop("checked");
        var nofail       = true;
        var check_email  = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (no_name !== undefined && user_name.length == 0){
            $("#no_name").show();
            nofail = false;
        }
        if (no_phone !== undefined && user_phone.length == 0){
            $("#no_phone").show();
            nofail = false;
        }else if(no_phone !== undefined && (user_phone.length != 11 || !isFinite(user_phone))){
            $("#wrong_phone").show();
            nofail = false;
        }
        if (no_email !== undefined && user_email.length == 0){
            $("#no_email").show();
            nofail = false;
        }else if(no_email !== undefined && !check_email.test(user_email)){
            $("#wrong_email").show();
            nofail = false;
        }
        if (no_massage !== undefined && massage.length == 0){
            $("#no_massage").show();
            nofail = false;
        } 
        if (no_consent !== undefined && !check_consent){
            $("#no_consent").show();
            nofail = false;
        }
        if(nofail){
            $.ajax({
                url: "/ajax/callback.php", 
                method: "POST",
                cache: false,
                data: form_data,
                dataType: "html",
                success: function (data){
                        $("#feedback_form")[0].reset();
                        $.fancybox.close();
                        alert("Отправлено!");
                },
            });
        }    
            
        
    });
});

