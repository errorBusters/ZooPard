<?php include '../dbCon.php'?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'?>
    <div class='comNav'>
        <ul class='comNavList'>
            <li><a href="dashboard.php">Events</a></li>
            <li><a href="member_manage.php" class='mprofile'>Community Members</a></li>
            <li><a href="../index.php">Log Out</a></li>
        </ul>
    </div>
    <div class='comContent'>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Approve</th>
            </tr>
            <?php
                $stmt = $pdo->prepare("SELECT id, first_name, last_name, contact_number,email,dob,gender FROM community_members WHERE aproval='not-approved'");
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($results) > 0) {
                    foreach ($results as $row) {
                        
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["first_name"] . " ".$row["last_name"]."</td>";
                        echo "<td>" . $row["contact_number"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo '<td> 
                            <button id="approveBtn" onclick="approveMember()" style="background-color: #0ec746; height:30px; border-radius: 10px; border: none; padding:5px">Approve</button>
                            <button id="rejectBtn" onclick="rejectMember()" style="background-color: #c70e0e; height:30px; border-radius: 10px; border: none; padding:5px; margin: left 10px;">Reject</button>
                        </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                $pdo=NULL;
            ?>
        </table>
        <script src='../assets/js/script.js'></script>
    </div>
    </div>
</body>
</html>

