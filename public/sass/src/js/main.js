$(document).ready(function(){
    $("#contact_phone_1").mask("(00)0000-0000");
    $("#contact_phone_2").mask("(00)0000-0000");
    $("#client_cpf").mask("000.000.000-00");
    $("#client_cnpj").mask("00.000.000/0000-00");
    $("#address_zipcode").mask("00000-000");

    $("#accordion").accordion({
        heightStyle: "content",
        collapsible: true,
        active: false
    });
    $("#tabs").tabs();

    $(".btn-go-to").click(function () {
        var id = $(this).attr('id');
        var goTo = id.replace("go-to-","");
        $("." + goTo).trigger('click');
    });
    $(".btn-back-to").click(function () {
        var id = $(this).attr('id');
        var backTo = id.replace("back-to-","");
        $("." + backTo).trigger('click');
    });

});

function clearColor(id)
{
    var val = $("#" + id).val();
    if(val != null && val != '' && val != 'undefined'){
        $("#" + id).removeAttr('style');
    }
}
