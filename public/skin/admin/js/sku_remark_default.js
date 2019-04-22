$(function(){
    $("#sku_lists").find("li.sku-item").children("label").bind("click", function(e){e.stopPropagation();});
})
function sku_default(obj){
    var ids = obj.val();
    $("input[name=sku_default]").val(ids);
    var specimg = obj.parent().parent().find(".specimg").val();
    $("#specimg").val(specimg);
    var price = obj.parent().parent().find(".price").val();
    $("#price").val(price);
    var marketprice = obj.parent().parent().find(".marketprice").val();
    $("#marketprice").val(marketprice);
    var costprice = obj.parent().parent().find(".costprice").val();
    $("#costprice").val(costprice);
}
function remark_name_keyup(obj){
    var name_remark = obj.val();
    var name = obj.parent().find(".labelname").text();
    if(name_remark == ''){name_remark = name;}
    if (name != name_remark){name_remark = "<span style='color:gray'>(" + name_remark + ")</span>";}
    var sku_id = obj.parent().find(".sku_id").attr("id");
    $(".td_" + sku_id).html(name + name_remark);
    
    var sku_ids = $(".sku_ids").val().split("_");
    var sku_names = $(".sku_names").val().split("_");
    var sku_names_value = "";
    var split = '_';
    for(var i=0;i<sku_ids.length;i++){
        if(i == sku_ids.length-1){split = '';}
        if('sku_'+sku_ids[i] == sku_id){
            sku_names_value += obj.val() + split;
        }else{
            sku_names_value += sku_names[i] + split;
        }
    }
    $(".sku_names").val(sku_names_value);
}