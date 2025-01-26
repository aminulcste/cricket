<?php
include 'header.php';
include 'matches.php';
include 'featurematch.php';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "cricpoint");
$m_id = $_GET['id'];
$sql = "SELECT * FROM midnews WHERE mid={$m_id}";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Update News</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
      <form class="card p-4 shadow-sm" action="updatenews.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="mheading">News Heading</label>
        <input type="hidden" name="mid" value="<?php echo $row['mid']; ?>"/>
        <input type="text" class="form-control" id="mheading" name="mheading" value="<?php echo $row['mhead']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="snewss">News Summary</label>
        <input type="text" class="form-control" id="snewss" name="snewss" value="<?php echo $row['mnews']; ?>" required/>
    </div>
    <div class="form-group">
        <label for="scontents">News Content</label>
        <textarea class="form-control" id="scontents" name="scontents" rows="4" required><?php echo $row['mcontent']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="snewsss">Other news</label>
        <textarea class="form-control" id="snewsss" name="snewsss" rows="4" required><?php echo $row['snews']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="mimage">Upload Image</label>
        <input type="file" class="form-control-file" id="mimage" name="mimages"/>
        <input type="hidden" name="current_image" value="<?php echo $row['mimage']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
        <?php
            }
        } else {
            echo "<div class='alert alert-danger'>No news found with this ID.</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
