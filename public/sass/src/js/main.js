$(document).ready(function(){

});

function clearColor(id)
{
    var val = $("#" + id).val();
    if(val != null && val != '' && val != 'undefined'){
        $("#" + id).removeAttr('style');
    }
}
