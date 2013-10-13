
<?php
  $con = mysqli_connect("localhost", "jenton", "qwerty", "jenton");
 
 // Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  /*$test = mysql_select_db("yelp");
  if (!$test) {
    echo "Didn't Work";
    echo mysql_error();
  }*/



  $name=$_POST["name"];
  echo $name;
  $message=$_POST["message"];
  $service="2";
 


  //$query=mysql_query("INSERT INTO yelp(reviewID,food,service) values('$name','$message','$service') ");
 
  $query=mysqli_query($con,"INSERT INTO yelp (reviewID,food,service) VALUES ('$name', '$message', '$service') ");
  if($query){
    echo "Your comment has been sent";
  }
  else{
    echo "Error in sending your comment";
  }

$result = mysqli_query($con,"SELECT * FROM yelp");

while($row = mysqli_fetch_array($result))
  {
  echo $row['reviewID'] . " " . $row['food'] . " " . $row['service'];
  echo "<br>";
  }
?>