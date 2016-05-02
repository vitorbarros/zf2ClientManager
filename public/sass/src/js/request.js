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