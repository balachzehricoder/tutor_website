<?php
include('config.php');

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
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
    <a href="/tutor_website/admin/index.php" class="back-link">&lt; Back</a>
    <h2>View messages</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Sender ID</th>
            <th>Receiver ID</th>
            <th>Sender Name</th>
            <th>Sender Message</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Approved</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['sender_id']; ?></td>
                <td><?php echo $row['resiver_id']; ?></td>
                <td><?php echo $row['sender_name']; ?></td>
                <td><?php echo $row['sender_message']; ?></td>
                <td><?php echo $row['sender_email']; ?></td>
                <td><?php echo $row['sender_phone']; ?></td>
                <td><?php echo $row['sender_location']; ?></td>
                <td><?php echo $row['approved']; ?></td>
                <td><a href="approve.php?id=<?php echo $row['id']; ?>" class="approve-link">Approve</a><a href="disapprove.php?id=<?php echo $row['id']; ?>" class="disapprove-link">Disapprove</a></td>
               
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
