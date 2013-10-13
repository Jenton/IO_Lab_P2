<?php
 // connects to my ischool mysql database. username: jenton, password: qwerty, database: jenton
  $con = mysqli_connect("localhost", "jenton", "qwerty", "jenton");
 
 // Failure check
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //the "reviewID" comes from data: in the ajax call
  $reviewID = $_POST["reviewID"];
 
 //this code runs only when the food button is clicked
if ($_POST["action"] == "food") {
   //increments the specified reviewID's food column by 1
   $query=mysqli_query($con,"UPDATE yelp SET food=food + 1 WHERE reviewID=$reviewID  ");
     if($query) {
     //we need to figure out how to pass database values back to the local webpage. In this code, if you use echo, you can call it with 'data' in the script.
     echo "Your comment has been sent<br>";
   }
   else {
    echo "Error in sending your comment<br>";
  }
  //printing out the data in my 'yelp' mysql table.
  $result = mysqli_query($con,"SELECT * FROM yelp");

  while($row = mysqli_fetch_array($result)) {
    echo "reviewID: " . $row['reviewID'] . " food: " . $row['food'] . " service: " . $row['service'];
    echo "<br>";
  }
}

//this code runs only when the service button is clicked. It increments service by one for the reviewID
if ($_POST["action"] == "service") {
//increments the specified reviewID's service column by 1
  $query=mysqli_query($con,"UPDATE yelp SET service=service + 1 WHERE reviewID=$reviewID  ");
  if($query) {
    echo "Your comment has been sent<br>";
  }
  else {
    echo "Error in sending your comment<br>";
  }
  
  //printing out the data in my 'yelp' mysql table.
  $result = mysqli_query($con,"SELECT * FROM yelp");
  while($row = mysqli_fetch_array($result)) {
    echo "reviewID: " . $row['reviewID'] . " food: " . $row['food'] . " service: " . $row['service'];
    echo "<br>";
  }
}

//this runs on page load
if ($_POST["action"] == "pageload") {
//increments the specified reviewID's service column by 1


  $query[=mysqli_query($con,"UPDATE yelp SET service=service + 1 WHERE reviewID=$reviewID  ");
  if($query) {
    echo "Your comment has been sent<br>";
  }
  else {
    echo "Error in sending your comment<br>";
  }
  
  //printing out the data in my 'yelp' mysql table.
  $result = mysqli_query($con,"SELECT * FROM yelp");
  while($row = mysqli_fetch_array($result)) {
    echo "reviewID: " . $row['reviewID'] . " food: " . $row['food'] . " service: " . $row['service'];
    echo "<br>";
  }
}
  //keeping this code in because I may need to reference it.
  //$query=mysql_query("INSERT INTO yelp(reviewID,food,service) values('$name','$message','$service') ");
 
 
?>