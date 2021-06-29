$(document).ready(function() {
    $.ajax({ 
        url: notifyURL,
        success: function(data){
            $("#countNotification").text(data.count);
            $("#notification-list").html(data.html);
    }, dataType: "json"});
});
setInterval(function(){
    $.ajax({ 
        url: notifyURL,
        success: function(data){
            $("#countNotification").text(data.count);
            $("#notification-list").html(data.html);
    }, dataType: "json"});
}, 5000);
