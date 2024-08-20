<?php
include('config.php');

$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);
?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reviews</title>
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

        .approve-link {
            background-color: #3498db;
        }

        .disapprove-link {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <a href="/tutor_website/admin/index.php" class="back-link">Back</a>
    <h2>View reviews</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Message</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['approved']; ?></td>
                <td>
                    <a href="approve.php?id=<?php echo $row['id']; ?>" class="approve-link">Approve</a>
                    <a href="disapprove.php?id=<?php echo $row['id']; ?>" class="disapprove-link">Disapprove</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
