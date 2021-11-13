<?php
// include "edit.php";
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function insertIntoDB($key, $val){
  $servername = "localhost";
  $username = "admin";
  $password = "";
  $dbname = "data";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }  echo gettype('$key');
  echo gettype('$val');
  $sql = "INSERT INTO data (keyy, val)
  VALUES ('$key', '$val')";
  
  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }$conn->close();
}
// UPDATE
function updateInDb($key, $val){
  $servername = "localhost";
  $username = "admin";
  $password = "";
  $dbname = "data";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }  $sql = "UPDATE data SET val='$val' WHERE keyy='$key'";

if ($conn->query($sql) === TRUE) {
  // echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}$conn->close();
}

function fetchFromDb($key){
  $servername = "localhost";
  $username = "admin";
  $password = "";
  $dbname = "data";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }  $sql = "SELECT val from data WHERE keyy='$key'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // echo "id: " . $row["val"]."<br>";
      return $row["val"];
    }
  } else {
    // echo "0 results";
    return false;
  }$conn->close();
}

function replaceString($str) {
   
   preg_match_all("/#(.*?)\#/",$str,$newarray);
      //  echo '<pre>';
      //  print_r($newarray);
       foreach($newarray[1] as $key=>$value){
        //  print_r($value);
           if(fetchFromDb($value)) {
            //  print_r(fetchFromDb($value));
               $str = str_replace("#".$value."#",ucfirst(fetchFromDb($value)),$str);
           } else {
               $str = str_replace("#".$value."#","",$str);
           }
      
  
          }return $str;   
  }
   //echo "<pre>"; print_r($str); exit;
  //  fetchFromDb('ss');
  function fetchAllDb(){
    $servername = "localhost";
    $username = "admin";
    $password = "";
    $dbname = "data";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  $sql = "SELECT * from data";
    $result = $conn->query($sql);
    $arr = array();
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["val"]."<br>";
        // return $row["val"];
        $arr[$row['keyy']] = $row['val'];
      }
      return $arr;
    } else {
      // echo "0 results";
      return false;
    }$conn->close();
  }

  // Delete

  function deletefromDB($key){
    $servername = "localhost";
    $username = "admin";
    $password = "";
    $dbname = "data";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }  
    $sql = "DELETE FROM data WHERE keyy='$key'";
  if ($conn->query($sql) === TRUE) {
    // echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }$conn->close();
  }

?>