$(document).ready(function(){

  // When you click the food button, this code goes
  $("#foodButton").on("click", function(){
                          
                          //pass the number in the reviewID textbox into a variable
                          var reviewID=$("#reviewID").val();

                          //Ajax call. The data: passes in whatever information you want into the foodButton.php file. You can type in whatever you key you want and you can reference it in the php file

                          $.ajax({
                            type:"post",
                            url:"foodButton.php",
                            data:"action=food"+"&reviewID="+reviewID,
                            success:function(data){
                             $("#info").html(data);
                             console.log($re)
                           }

                         });

                        });

  $("#serviceButton").on("click", function(){

                          //var name=$("#name").val();
                          //var message=$("#message").val();
                          var reviewID=$("#reviewID").val();

                          $.ajax({
                            type:"post",
                            url:"foodButton.php",
                            data:"action=service"+"&reviewID="+reviewID,
                            success:function(data){
                             $("#info").html(data);
                           }

                         });

                        });

  $("#button").click(function(){

    var name=$("#name").val();
    var message=$("#message").val();

    $.ajax({
      type:"post",
      url:"process.php",
      data:"name="+name+"&message="+message,
      success:function(data){
       $("#info").html(data);
     }

   });
  });
});