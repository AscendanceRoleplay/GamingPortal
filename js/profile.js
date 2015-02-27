$("myLink").click(function(){
    var href = $(this).attr("href"),
        message = $(this).attr("data-message");
    myFunc();
    alert(message);
    window.location.href = href;
});