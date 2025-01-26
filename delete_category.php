<?php 
include 'config.php';

$cat_id = $_GET['id'];  // Get the category ID from the URL

$sql = "DELETE FROM categories WHERE id={$cat_id}";  // Assuming your table name is `categories`
$result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

header("Location: http://localhost/a/cricket/categorylist.php");  // Redirect to the category list page
mysqli_close($conn);
?>
