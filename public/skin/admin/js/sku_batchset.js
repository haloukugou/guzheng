//弹出设置框
$(".batchset a").click(function(){
    var tag = $(this).attr("data-tag");
    var placeholder = $(this).text();
    $(this).parent().children("a").hide();
    $(this).siblings("input,button").show();
    $(this).siblings("input").attr("placeholder",placeholder).attr("data-tag",tag).focus();
});
//取消设置框
$(".batchset .btn-cancle").click(function(){
    $(this).parent().children("input").val('');
    $(this).parent().children("a").show();
    $(this).parent().children("input,button").hide();
    $(this).parent().children("input").removeAttr("data-tag").removeAttr("placeholder");
});
//批量操作
$(".batchset .btn-ok").click(function(){
    var input = $(this).prev();
    var placeholder = input.attr("placeholder");
    var v = input.val();
    var tag = input.attr("data-tag");
    var is_do = true;//执行操作

    if(v.length>0){
        var price_reg = /(^[1-9]\d*(\.\d{1,2})?$)|(^0(\.\d{1,2})?$)/;
        var error = placeholder+"不合法";
        if(tag == "stock"){
            //验证库存
            if(/\D/.test(v) || v.length > 10){
                alert(error);
                is_do = false;
                input.focus();
            }
        }else{
            //验证价格
            if(!price_reg.test(v) || v.length > 10){
                alert(error);
                input.focus();
                is_do = false;
            }
        }
        if(is_do){
            //批量设置价格、库存
            switch(tag){
                case 'sale_price':
                    $(".sku-wrap>.tables_sku .checkprice[name='sku_price[]']").val(v);
                break;
                case 'market_price':
                    $(".sku-wrap>.tables_sku .checkprice[name='sku_marketprice[]']").val(v);
                break;
                case 'cost_price':
                    $(".sku-wrap>.tables_sku .checkprice[name='sku_costprice[]']").val(v);
                break;
                case 'stock':
                    $(".sku-wrap>.tables_sku .checkstock[name='sku_stock[]']").val(v);
                break;
            }
        }
    }
    $(".batchset .btn-cancle").click();
});