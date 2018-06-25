$(document).ready(function(){
    $(".nav-sidebar li").click(function(){
        $(this).children("ul").slideToggle(300);
    });
});