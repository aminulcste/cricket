<?php
include 'header.php';
include 'matches.php';

// Database connection (update with your credentials)
$host = 'localhost';
$db = 'cricpoint';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the content ID from the URL
$headline_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the content from the database
$sql = "SELECT mhead, mimage, mnews, mcontent, snews FROM midnews WHERE mid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $headline_id);
$stmt->execute();
$stmt->bind_result($mhead, $mimage, $mnews, $mcontent, $snews);
$stmt->fetch();
$stmt->close();
$conn->close();

// Check if data was fetched
if (!$mhead) {
    echo "No content found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($mhead); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="img/cricket-logo-png-7553.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
 <!-- Link to your custom CSS file -->
 <style>
    /* Custom Styles */
/* Custom Styles */
body {
    font-family: 'Georgia', serif; /* Classic serif font for a newspaper look */
    background-color: #f4f4f4; /* Light grey background for the page */
    color: #333; /* Dark text color for readability */
    margin: 0;
    padding: 0;
}

header {
    background-color: #fff; /* White background for header */
    padding: 1rem; /* Padding around the header */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for header */
}

header h1 {
    color: #222; /* Darker color for the header */
    text-align: center; /* Center-align the header */
    margin: 0; /* Remove default margin */
    font-size: 3rem; /* Larger font size for the header */
    font-weight: bold; /* Make the text bold */
}

.news-item {
    border: 1px solid #ccc; /* Light border color */
    border-radius: 0.25rem; /* Slightly rounded corners for a modern look */
    padding: 1rem; /* Standard padding */
    background-color: #fff; /* White background for the news item */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow around news item */
    margin: 1rem auto; /* Space around each news item */
    max-width: 800px; /* Max width for content */
}

.news-image {
    max-width: 100%; /* Ensure the image scales responsively */
    height: auto; /* Maintain aspect ratio */
    border: 1px solid #ddd; /* Light border around the image */
    margin-bottom: 1rem; /* Space below the image */
    border-radius: 0.25rem; /* Slightly rounded corners for the image */
}

.news-content {
    margin-top: 1rem; /* Space above the content */
}

.news-content p.lead {
    font-size: 1.25rem; /* Slightly larger font size for lead paragraph */
    color: #555; /* Slightly lighter gray for the lead paragraph */
    margin-bottom: 1rem; /* Space below the lead paragraph */
    line-height: 1.5; /* Increased line height for readability */
}

.related-news h6 {
    margin-top: 1rem; /* Space above related news */
}

.related-news .btn {
    text-decoration: none; /* Remove underline from the button */
    color: #fff; /* White text color */
    background-color: #007bff; /* Bootstrap primary button color */
    border-color: #007bff; /* Match border color with button color */
    border-radius: 0.25rem; /* Rounded corners */
    padding: 0.5rem 1rem; /* Padding for the button */
}

.related-news .btn:hover {
    background-color: #0056b3; /* Darker shade on hover */
    border-color: #004085; /* Darker border on hover */
}

</style>

</head>
<body>
<header>
        <h1 class="display-4"><?php echo htmlspecialchars($mhead); ?></h1>
    </header>
    <main class="container">
        <article class="news-item">
            <?php if (!empty($mimage)): ?>
                <img class="news-image" src="<?php echo htmlspecialchars($mimage); ?>" alt="News Image">
            <?php else: ?>
                <img class="news-image" src="default-image.jpg" alt="Default Image">
            <?php endif; ?>
            <div class="news-content">
                <p class="lead"><?php echo nl2br(htmlspecialchars($mnews)); ?></p>
                <p><?php echo nl2br(htmlspecialchars($mcontent)); ?></p>
            </div>
            <div class="related-news">
                <h6>
                    <a href="content.php?id=<?php echo htmlspecialchars($headline_id); ?>" class="btn">
                        <?php echo htmlspecialchars($snews); ?>
                    </a>
                </h6>
            </div>
        </article>
    </main>
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'footer.php';
?>