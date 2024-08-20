<?php
include('config.php');
include('image_upload.php'); // Include the image upload file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Check if the file was uploaded without errors
    if (isset($_FILES["uploadimg"]) && !empty($_FILES["uploadimg"])) {
        $fileResult = UploadImage($_FILES["uploadimg"]);

        if (isset($fileResult["uploadedFile"])) {
            $image_path = $fileResult["uploadedFile"];

            // Perform basic validation - ensure title and content are not empty
            if (empty($title) || empty($content)) {
                echo "Title and content are required";
            } else {
                // Prepare the SQL query to insert the blog post into the database
                $sql = "INSERT INTO blogs (title, content, image_path, created_at) VALUES (?, ?, ?, NOW())";

                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $title, $content, $image_path);

                if ($stmt->execute()) {
                    echo "Blog post created successfully";
                } else {
                    echo "Error creating blog post: " . $conn->error;
                }

                $stmt->close();
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "No file uploaded or file input name does not match.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Blog Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: calc(100% - 12px);
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .form-group textarea {
            resize: vertical;
            height: 150px;
        }
        .form-group input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Blog Post</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="uploadimg">Image:</label>
            <input type="file" id="uploadimg" name="uploadimg" required>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Create Blog">
        </div>
    </form>
</div>

</body>
</html>
