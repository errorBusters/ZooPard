<?php include '../dbCon.php'; ?>

<?php
if (isset($_GET['uEmail'])) {
    $email = htmlspecialchars($_GET['uEmail']);
    echo "<script>
        alert('Welcome, " . $email . "');
    </script>";
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Member Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'?>
    <div class='comNav'>
        <ul class='comNavList'>
        <li class="dashTitle">Community Member Dashboard Dashboard</li>
            <li><a href="#">Educational Programs</a></li>
            <li><a href="#" class='mprofile'>My Profile</a></li>
            <li><a href="../index.php">Log Out</a></li>
        </ul>
    </div>
    <div class='comContent'>
        <table>
            <tr>
                <th>cover Image</th>
                <th>ID</th>
                <th>Program Name</th>
                <th>Description</th>
            </tr>
            <?php
                $stmt = $pdo->prepare("SELECT id, name, cover_image, program_text FROM edu_info");
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($results) > 0) {
                    foreach ($results as $row) {
                        $imagepath = '../Uploads/' . $row["cover_image"];

                        if (file_exists($imagepath)) {
                            $content = $imagepath;
                        } else {
                            $content = '../Uploads/default.png';
                        }

                        echo "<tr>";
                        echo '<td> <img src="' . $content . '" alt="' . $row["id"] . '" style="height: 300px; width: 400px;"> </td>';
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["program_text"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }

            ?>
        </table>
        
    </div>
    <div class="modBtn">
        <a href="#" id="addBtn">Add</i></a>
        <a href="#" id="editBtn">Edit</i></a>
        <a href="#" id="delBtn">Delete</i></a>
        </div>
        <div id="addProgram" class="addProgram">
            <div class="addProgramContent">
                <span id="addCloseBtn" class="closeBtn">&times;</span>
                    <h2>Add Educational Program</h2>
                    <form action="insert_edu.php" method="POST" enctype="multipart/form-data">
                        <label for="name">Program Name:</label>
                        <input type="text" id="Pname" name="Pname" required><br><br>
                        <label for="description">Description</label>
                        <input type="text-area" id="description" name="description" required><br><br>
                        <label for="image">Upload Cover Image:</label>
                        <input type="file" id="image" name="image" required><br><br>
                        <input type="submit" value="Submit">
                    </form>
            </div>
        </div>

        <div id="editProgram" class="editProgram">
            <div class="editProgramContent">
                <span id="editCloseBtn" class="closeBtn">&times;</span>
                    <h2>Edit Educational Program</h2>
                    <form action="update_edu.php" method="POST" enctype="multipart/form-data">
                        <label for="pID">Program ID:</label>
                        <select name="pID" id="pID">
                        <?php
                            include '../dbCon.php';

                            try {
                                $stmt = $pdo->prepare("SELECT id FROM edu_info");
                                $stmt->execute();
                                $programs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            } catch (PDOException $e) {
                                echo "<script>
                                    alert('Error: " . addslashes($e->getMessage()) . "');
                                </script>";
                            }
                            foreach ($programs as $program) {
                                echo "<option value=\"" . htmlspecialchars($program['id']) . "\">" . htmlspecialchars($program['id']) . "</option>";
                            }
                        ?>
                        </select><br><br>
                        <label for="name">Program Name:</label>
                        <input type="text" id="Pname" name="Pname" required><br><br>
                        <label for="description">Description</label>
                        <input type="text-area" id="description" name="description" required><br><br>
                        <label for="image">Upload Cover Image:</label>
                        <input type="file" id="image" name="image" required><br><br>
                        <input type="submit" value="Edit">
                    </form>
            </div>
        </div>

        <div id="delProgram" class="delProgram">
            <div class="delProgramContent">
                <span id="delCloseBtn" class="closeBtn">&times;</span>
                    <h2>Remove Educational Program</h2>
                    <form action="delete_edu.php" method="POST">
                        <label for="pID">Program ID:</label>
                        <select name="pID" id="pID">
                        <?php
                            include '../dbCon.php';

                            try {
                                $stmt = $pdo->prepare("SELECT id FROM edu_info");
                                $stmt->execute();
                                $programs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            } catch (PDOException $e) {
                                echo "<script>
                                    alert('Error: " . addslashes($e->getMessage()) . "');
                                </script>";
                            }
                            foreach ($programs as $program) {
                                echo "<option value=\"" . htmlspecialchars($program['id']) . "\">" . htmlspecialchars($program['id']) . "</option>";
                            }
                        ?>
                        <input type="submit" value="Delete">
                    </form>
            </div>
        </div>


        <div id="myProfile" class="myProfile">
            <div class="myProfile">
                <span id="myProfileCloseBtn" class="closeBtn">&times;</span>
                    <h2>My Profile</h2>
                    <?php
                        if (isset($_GET['uEmail'])) {
                        $email = urldecode($_GET['uEmail']);
    
                        try {
                            $stmt = $pdo->prepare("SELECT id, first_name, last_name, contact_number, dob FROM community_members WHERE email = :email");
                            $stmt->bindParam(':email', $email);
                            $stmt->execute();
        
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($result) {
                                $id = htmlspecialchars($result['id']);
                                $firstName = htmlspecialchars($result['first_name']);
                                $lastName = htmlspecialchars($result['last_name']);
                                $contactNumber = htmlspecialchars($result['contact_number']);
                                $dob = htmlspecialchars($result['dob']);
                                
                                echo "<h3>".$firstName." ".$lastName."</h3>";
                                echo "<p>",$email."</p>";
                                echo "<p><strong>ID:</strong> $id</p>";
                                echo "<p><strong>Contact Number:</strong> $contactNumber</p>";
                                echo "<p><strong>Date of Birth:</strong> $dob</p>";
                            } else {
                                echo "<p>No data found for the provided email.</p>";
                            }
                            } catch (PDOException $e) {
                                echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
                            }
                        } else {
                            echo "<p>Email not provided.</p>";
                        }

                        $pdo = null;
                    ?>
   
            </div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
</body>
</html>

