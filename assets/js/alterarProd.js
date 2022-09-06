
$(function(){

    $(".btn").on("click", function(){

        $.ajax({
            url: "php/load.php",
            success: function(result){
                $(".result").html(result);
            },
            error: function(){
                $(".result").html("ERROR");
            }
        });

        
    })
});