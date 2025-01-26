<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint") or die("Connection failed");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $m_id = mysqli_real_escape_string($conn, $_POST['mid']);
    $teamname = mysqli_real_escape_string($conn, $_POST['teamname']);
    $playername = mysqli_real_escape_string($conn, $_POST['playername']);
    $birth = mysqli_real_escape_string($conn, $_POST['birth']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $batting_style = mysqli_real_escape_string($conn, $_POST['batting_style']);
    $bowling_style = mysqli_real_escape_string($conn, $_POST['bowling_style']);
    $matches_played = mysqli_real_escape_string($conn, $_POST['matches_played']);
    $runs_scored = mysqli_real_escape_string($conn, $_POST['runs_scored']);
    $wickets_taken = mysqli_real_escape_string($conn, $_POST['wickets_taken']);
    $profile = mysqli_real_escape_string($conn, $_POST['profile']);
    $current_image = mysqli_real_escape_string($conn, $_POST['current_image']);

    // Default to the current image if no new image is uploaded
    $s_img = $current_image;

    if (isset($_FILES['mimages']) && $_FILES['mimages']['error'] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["mimages"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["mimages"]["tmp_name"], $target_file)) {
                $s_img = $file_name; // Use the new image file name
            } else {
                die("Sorry, there was an error uploading your file.");
            }
        } else {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
    }

    // Update query using prepared statements
    $stmt = $conn->prepare("UPDATE players SET teamname=?, playername=?, birth=?, role=?, batting_style=?, bowling_style=?, matches_played=?, runs_scored=?, wickets_taken=?, profile=?, image=? WHERE id=?");
    $stmt->bind_param("ssssssiiissi", $teamname, $playername, $birth, $role, $batting_style, $bowling_style, $matches_played, $runs_scored, $wickets_taken, $profile, $s_img, $m_id);

    if ($stmt->execute()) {
        header("Location: http://localhost/a/cricket/playername.php");
    } else {
        die("Query failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
