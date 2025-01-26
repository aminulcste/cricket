<?php
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

$m_id = $_POST['mid'];
$m_head = mysqli_real_escape_string($conn, $_POST['mheading']);
$m_news = mysqli_real_escape_string($conn, $_POST['snewss']);
$s_content = mysqli_real_escape_string($conn, $_POST['scontents']);
$m_newss = mysqli_real_escape_string($conn, $_POST['snewsss']);
$current_image = $_POST['current_image'];

$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("connection fail");

// File upload logic
if (isset($_FILES['mimages']) && $_FILES['mimages']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["mimages"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($_FILES["mimages"]["tmp_name"], $target_file)) {
            $s_img = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
    }
} else {
    // If no new image was uploaded, use the current one
    $s_img = $current_image;
}

// Update query with corrected syntax
$sql = "UPDATE midnews SET mhead='$m_head', mnews='$m_news', mcontent='$s_content', snews='$m_newss', mimage='$s_img' WHERE mid='$m_id'";

$result = mysqli_query($conn, $sql) or die("Query failed: " . mysqli_error($conn));

header("Location: http://localhost/a/cricket/newsname.php");
mysqli_close($conn);
?>

