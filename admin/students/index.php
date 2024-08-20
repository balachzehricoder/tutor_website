<?php
include('config.php');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tutors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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

        .back-link {
            background-color: #4CAF50;
        }

        .delete-link {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <a href="/tutor_website/admin/index.php" class="back-link">Back</a>
    <h2>View students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Suburb</th>
            <th>Status</th>
            <th>Messages</th>
            <th>Tutoring Mode</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['suburb']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['messages']; ?></td>
                <td><?php echo $row['tutoringmode']; ?></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
