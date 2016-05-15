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

function storeClient() {
    var formData = new FormData($("#storeClient")[0]);

    $.ajax({
        type: "POST",
        url: "/client/store",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            alertRequests('success', data, 'alert-client', true);
        },
        error: function (data) {
            clearColorFields();
            alertRequests('error', data, 'alert-client');
            colorRequiredFields(data.responseJSON.fields);
        }
    });
}

function storeStudent() {
    var formData = new FormData($("#storeStudent")[0]);

    $.ajax({
        type: "POST",
        url: "/ead/student/store",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            alertRequests('success', data, 'alert-student', true);
        },
        error: function (data) {
            clearColorFields();
            alertRequests('error', data, 'alert-student');
            colorRequiredFields(data.responseJSON.fields);
        }
    });
}

function authenticate(){
    var formData = new FormData($("#login")[0]);

    $.ajax({
        type:"POST",
        url:"/auth/verifyCredentials",
        data:formData,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            window.location.href = data.redirect;
        },
        error:function(data){
            alertRequests('error', data, 'alert-login', true);
        }
    });
}

function clearColorFields() {
    $("input[type='text']").removeAttr("style");
    $("input[type='email']").removeAttr("style");
    $("input[type='number']").removeAttr("style");
    $("textarea").removeAttr("style");
}
function colorRequiredFields(data) {
    $.each(data, function (k, v) {
        $("#" + v).css({"background-color": "rgb(255, 214, 214)"});
    });
}

function alertRequests(type, data, id, clear) {
    console.log(data);
    if (type == 'success') {
        $("#" + id).empty();
        $("#" + id).append('<div class="alert alert-success" role="alert">' + data.messages + '</div>');
        if (clear) {
            clearFields();
        }
    } else {
        $("#" + id).empty();
        $("#" + id).append('<div class="alert alert-warning" role="alert">' + data.responseJSON.messages + '</div>');
    }
}

function clearFields() {
    $("input[type='text']").val("");
    $("input[type='email']").val("");
    $("input[type='number']").val("");
    $("textarea").val("");

}