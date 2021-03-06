$(function () {
    //验证hosadmin_name是否超过20个字
    $(".hosadmin_name").blur(function () {
        validateLength(".hosadmin_name",20,".error_hosadmin_name","名字超过20个字,请再次输入");
    });
    //验证hos_name是否超过10个字
    $(".hosadmin_pwd").blur(function () {
        validateLength(".hosadmin_pwd",10,".error_hosadmin_pwd","密码超过10个字,请再次输入");
    });

    //验证hosadmin_tel是否满足手机号格式
    $(".hosadmin_tel").blur(function () {
        validateTel(".hosadmin_tel",".error_hosadmin_tel","手机号格式错误,请再次输入");
    });

    //验证hoslevel_code是否选择
    $(".hos_code").blur(function () {
        validateSelect(".hos_code",".error_hos_code","请选择管辖医院");
    });

    //点击提交按钮，再次验证是否格式正确
    $(".btn-submit").click(function () {
        var result_hosadmin_name=validateLength(".hosadmin_name",20,".error_hosadmin_name","名字超过20个字,请再次输入");
        var result_hosadmin_pwd=validateLength(".hosadmin_pwd",10,".error_hosadmin_pwd","密码超过10个字,请再次输入");
        var result_hosadmin_tel=validateTel(".hosadmin_tel",".error_hosadmin_tel","手机号格式错误,请再次输入");
        var result_hos_code=validateSelect(".hos_code",".error_hos_code","请选择管辖医院");
        if((result_hosadmin_name===0)&&(result_hosadmin_pwd===0)&&(result_hosadmin_tel===0)&&(result_hos_code===0)){
            //格式全对
            //请求新增提交逻辑
            $.ajax({
                type:"POST",
                //在模板html中已经定义好了submitUrl地址
                url:submitUrl,
                data:{
                    hosadmin_name:$(".hosadmin_name").val(),
                    hosadmin_pwd:$(".hosadmin_pwd").val(),
                    hosadmin_tel:$(".hosadmin_tel").val(),
                    hos_code:$(".hos_code").val()
                },
                success:function (data) {
                    if(data==1){
                        //说明新增成功，则跳转到医院管理-医院展示页面
                        window.location.href=GOTOUrl;
                    }else{
                        //alert(data);
                        $(".modal-body").html(data);
                        $("#mymodal").modal("toggle");
                    }
                },
                error:function () {
                    // alert("发生错误!");
                    $(".modal-body").html("发生错误!");
                    $("#mymodal").modal("toggle");
                }
            });

        }else if((result_hosadmin_name===1)||(result_hosadmin_pwd===1)||(result_hosadmin_tel===1)){
            //格式有不正确的,就什么也不做
        }else if((result_hosadmin_name===2)||(result_hosadmin_pwd===2)||(result_hosadmin_tel===2)||(result_hos_code===2)){
            //有没有输入的,就什么也不做
            // alert("请完善信息");
            $(".modal-body").html("请完善您的信息!");
            $("#mymodal").modal("toggle");
        }
    });


});
