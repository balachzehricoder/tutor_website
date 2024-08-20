<?php
include('config.php');

$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            margin: 5px;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }

        .edit-link {
            background-color: #3498db;
        }

        .delete-link {
            background-color: #e74c3c;
        }

        .add-new-link {
            background-color: #27ae60;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>View Blogs</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-link">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="create.php" class="add-new-link">Add New Blog</a>
</body>
</html>

<?php
$conn->close();
?>
