<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Perform basic validation - ensure title and content are not empty
    if (empty($title) || empty($content) || empty($blog_id)) {
        echo "Blog ID, title, and content are required";
    } else {
        // Prepare the SQL query to update the blog post in the database
        $sql = "UPDATE blogs SET title=?, content=? WHERE id=?";

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $content, $blog_id);

        if ($stmt->execute()) {
            echo "Blog post updated successfully";
        } else {
            echo "Error updating blog post: " . $conn->error;
        }

        $stmt->close();
    }
} else {
    echo "Invalid request or missing data";
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Create/Update Blog Post</title>
</head>
<body>
    <h2>Create/Update Blog Post</h2>
    <form action="update_blog.php" method="POST">
        <input type="hidden" name="blog_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo isset($blog['title']) ? $blog['title'] : ''; ?>"><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content"><?php echo isset($blog['content']) ? $blog['content'] : ''; ?></textarea><br><br>
        <input type="submit" value="Update Blog">
    </form>
</body>
</html>
