//价格验证
$(".checkprice").blur(function(){
    var price_reg = /(^[1-9]\d*(\.\d{1,2})?$)|(^0(\.\d{1,2})?$)/;
    if(!price_reg.test($(this).val()) || $(this).val().length > 10){
        $(this).val("0.00");
    }
});

//0和正整数验证
$(".checkstock").blur(function(){
    var stock_reg = /^(0|[1-9][0-9]*)$/;
    if(!stock_reg.test($(this).val()) || $(this).val().length > 10){
        $(this).val("0");
    }
});