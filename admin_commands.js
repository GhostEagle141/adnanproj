$(document).ready(function(){

    $(".Delete").on("click", function() {


        var user_ID = $(this).attr("id");
        $("#hidden").attr("value",user_ID);
    
      });
    



});