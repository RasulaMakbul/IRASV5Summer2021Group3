$(".btn").click(function(){
    $("#id-form").submit();
});

$(".chart").css("display", "none");

function showView($i){
    $(".chart").css("display", "none");
    $("#chart"+$i).css("display", "block");
}