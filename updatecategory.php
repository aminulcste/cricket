<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $catname = mysqli_real_escape_string($conn, $_POST['catname']);
    
    // Handle file upload
    $current_image = $_POST['current_image'];
    $catimage = $_FILES['catimage']['name'];
    $target_dir = "uploads/"; // Ensure this directory exists

    // Prepare the SQL query
    if ($catimage) {
        // If a new image is uploaded, prepare to update the file
        $target_file = $target_dir . basename($catimage);
        
        // Check if the upload is successful
        if (move_uploaded_file($_FILES['catimage']['tmp_name'], $target_file)) {
            // Remove the old image if it exists
            if ($current_image && file_exists($target_dir . $current_image)) {
                unlink($target_dir . $current_image);
            }

            // Update query with new image
            $sql = "UPDATE categories SET category_name='$catname', category_image='$catimage' WHERE id='$id'";
        } else {
            echo "<div class='alert alert-danger'>Error uploading the file. Please check permissions and try again.</div>";
            exit;
        }
    } else {
        // If no new image is uploaded, keep the old image
        $sql = "UPDATE categories SET category_name='$catname' WHERE id='$id'";
    }

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Category updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating category: " . mysqli_error($conn) . "</div>";
    }

    // Redirect back to the category list page
    header("Location: catname.php");
    exit;
}

// Close connection
mysqli_close($conn);
?>
