<?php 
include("../includes/config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $delTitle = addslashes($_POST['dtitle']);
    
    $delBooks = "DELETE from books WHERE title='$delTitle'";
    $results = mysqli_query($bd,$delBooks);
    if($results){
    $message = '<div class="alert alert-success"> Successfully deleted. </div>';
    }
    else{
    $message = '<div class="alert alert-danger"> Oops! Something went wrong. Try again. </div>';
    }
    header("location: index.php");
}
?>