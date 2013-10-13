<?php
 // connects to my ischool mysql database. username: jenton, password: qwerty, database: jenton
  $con = mysqli_connect("localhost", "jenton", "qwerty", "jenton");
 
 // Failure check
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  
 
 //this code runs only when action == food from the ajax data call
if ($_POST["action"] == "food") {
   //the "reviewID" comes from data: in the ajax call
   $reviewID = $_POST["reviewID"];
  //gets an array of review IDs
  $idArray = $_POST["reviewIDs"];
  $idArray = explode(",", $idArray);

  //increments the specified reviewID's service column by 1
  $query=mysqli_query($con,"UPDATE yelp SET food=food + 1 WHERE reviewID=$reviewID  ");
  
  //updates the page with the new food and service counts
  updateTagCounts($idArray, $con);
}

//this code runs only when the service button is clicked. It increments service by one for the reviewID
if ($_POST["action"] == "service") {
  //the "reviewID" comes from data: in the ajax call
  $reviewID = $_POST["reviewID"];
  //gets an array of review IDs
  $idArray = $_POST["reviewIDs"];
  $idArray = explode(",", $idArray);

  //increments the specified reviewID's service column by 1
  $query=mysqli_query($con,"UPDATE yelp SET service=service + 1 WHERE reviewID=$reviewID  ");
  
  //updates the page with the new food and service counts
  updateTagCounts($idArray, $con);
}

//this code runs only when the atmosphere button is clicked. It increments service by one for the reviewID
if ($_POST["action"] == "atmosphere") {
  //the "reviewID" comes from data: in the ajax call
  $reviewID = $_POST["reviewID"];
  //gets an array of review IDs
  $idArray = $_POST["reviewIDs"];
  $idArray = explode(",", $idArray);

  //increments the specified reviewID's service column by 1
  $query=mysqli_query($con,"UPDATE yelp SET atmosphere=atmosphere + 1 WHERE reviewID=$reviewID  ");
  
  //updates the page with the new food and service counts
  updateTagCounts($idArray, $con);
}

//this runs on page load
if ($_POST["action"] == "pageload") {
//increments the specified reviewID's service column by 1

//gets an array of review IDs
$idArray = $_POST["reviewIDs"];
$idArray = explode(",", $idArray);

//updates the page with the new food and service counts
updateTagCounts($idArray, $con);

}

function updateTagCounts($Array, $con){
 //the following code iterates through every row in yelp and traverses through every item in idArray
//if the ids match, then it will output the food and service counts
//this is possibly the most inefficient way to do this...
$result = mysqli_query($con,"SELECT * FROM yelp");
while($row = mysqli_fetch_array($result)) {
  foreach ($Array as $id) {
    if ($id == $row['reviewID']) {
      //this will return data in the script.js that looks like &ID=1&food=12&service=1
      //maybe we can parse that and do something with it?
      echo "ID=" . $id . "&food=" . $row['food'] . "&service=" . $row['service'] . "&atmosphere=" . $row['atmosphere'] . ";";
      //echo "reviewID: " . $row['reviewID'] . " food: " . $row['food'] . " service: " . $row['service'];
      //echo "<br>";
      }
    }
  } 
} 
 
?>