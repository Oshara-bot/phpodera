<?php
require 'connection.php';

// Fetch user data from database
$users = Database::search("SELECT * FROM users"); // assuming your table is `users`
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Users</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #5c67f2;
            color: white;
        }
    </style>
</head>
<body>

<h1 style="text-align:center;">User List</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users->num_rows > 0) {
            while ($row = $users->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<script>
// Example JavaScript: alert the number of rows
let totalRows = <?php echo $users->num_rows; ?>;
alert("Total Users: " + totalRows);
</script>

</body>
</html>