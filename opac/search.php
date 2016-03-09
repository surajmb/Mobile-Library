<?php
include("../includes/config.php");
 // if(isset($_POST['submit'])){
//  if(isset($_GET['go'])){
$flag=0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['stitle'])){
  $sertitle=$_POST['stitle'];
  //-query  the database table
//  $sql="SELECT  ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";
  $sql="SELECT  access_no, title, author, isbn, publisher, copies FROM books WHERE title LIKE '%" . $sertitle .  "%'";
  //-run  the query against the mysql query function
  $result=mysqli_query($bd,$sql);
      
  //-create  while loop and loop through result set
  while($row=mysqli_fetch_array($result)){
          $aNo  =$row['access_no'];
          $tit=$row['title'];
          $auth=$row['author'];
          $isbnNo=$row['isbn'];
          $pub=$row['publisher'];
          $cops=$row['copies'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$aNo\">"   .$aNo . " " . $tit .  "" . $auth .  "" . $isbnNo .  "" . $pub .  "" . $cops .  "</a></li>\n";
  echo "</ul>";
      $flag=1;
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
if($flag==1){
        header("location: index.php");
}
?>