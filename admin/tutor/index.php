<?php
include('config.php');

$sql = "SELECT * FROM tutor_info";
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

        .delete-link {
            background-color: #e74c3c;
        }

        .approve-link {
            background-color: #27ae60;
        }

        .disapprove-link {
            background-color: #f39c12;
        }

        .back-link {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <a href="/tutor_website/admin/index.php" class="back-link">&lt; Back</a>
    <h2>View Tutors</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>Address</th>
            <th>I_am_a</th>
            <th>Tutoring_Mode</th>
            <th>Experience</th>
            <th>MajorSubject</th>
            <th>bio</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['I_am_a']; ?></td>
                <td><?php echo $row['Tutoring_Mode']; ?></td>
                <td><?php echo $row['Experience']; ?></td>
                <td><?php echo $row['MajorSubject']; ?></td>
                <td><?php echo $row['QExperience']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
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
