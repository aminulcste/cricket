<?php
include 'config.php';

// Retrieve form data
$newshead = $_POST['newsHead'];
$newstitle = $_POST['newsTitle'];
$newscontent = $_POST['newsContent'];
$othernews = $_POST['othernewsContent'];

// Handle file upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["newsImage"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["newsImage"]["tmp_name"]);
if($check !== false) {
    if (move_uploaded_file($_FILES["newsImage"]["tmp_name"], $target_file)) {
        $newsimage = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }
} else {
    echo "File is not an image.";
    exit();
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO midnews (mhead, mnews, mcontent, snews, mimage) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $newshead, $newstitle, $newscontent, $othernews, $newsimage);

// Execute the statement
if ($stmt->execute()) {
    header("Location: http://localhost/a/cricket/newsname.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
mysqli_close($conn);
?>
