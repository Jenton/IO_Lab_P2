$(document).ready(function(){
/*
  //when the page loads, make a call to the database and get the food and service tags
  $("div").each(function())
  $.ajax({
    type:"post",
    url:"phpScript.php",
    data:"action=pageload",
    success:function(data){
     $("#info").html(data);
     //console.log(data);
   } 
 });*/

  // When you click the food button, this code goes
  $(".foodButton").on("click", function(){
  //pass the number in the reviewID textbox into a variable
  var reviewID = $(this).parent().attr("id");
  console.log(reviewID);

  //Ajax call. The data: passes in whatever information you want into the foodButton.php file. You can type in whatever you key you want and you can reference it in the php file

  $.ajax({
    type:"post",
    url:"./phpScript.php",
    data:"action=food"+"&reviewID="+reviewID,
    success:function(data){
     $("#info").html(data);
       //console.log(data);
     }

   });

  });

  $(".serviceButton").on("click", function(){

                          //unused variables
                          //var name=$("#name").val();
                          //var message=$("#message").val();

                          var reviewID = $(this).parent().attr("id");

                          $.ajax({
                            type:"post",
                            url:"phpScript.php",
                            data:"action=service"+"&reviewID="+reviewID,
                            success:function(data){
                             $("#info").html(data);
                           }

                         });

                        });

});