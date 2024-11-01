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
            <li class="dashTitle">Admin Dashboard</li>
            <li><a href="dashboard.php">Events</a></li>
            <li><a href="member_manage.php">Community Members</a></li>
            <li><a href="index.php">Log Out</a></li>
        </ul>
    </div>
    <div class='comContent'>
        <table>
            <tr>
                <th>cover Image</th>
                <th>ID</th>
                <th>Event Name</th>
                <th>Description</th>
                <th>Event Date and Time</th>
            </tr>
            <?php
                $stmt = $pdo->prepare("SELECT id, name, event_image, event_text,event_datetime FROM events");
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($results) > 0) {
                    foreach ($results as $row) {
                        $imagepath = '../Uploads/' . $row["event_image"];

                        if (file_exists($imagepath)) {
                            $content = $imagepath;
                        } else {
                            $content = '../Uploads/default.png';
                        }

                        echo "<tr>";
                        echo '<td> <img src="' . $content . '" alt="' . $row["id"] . '" style="height: 300px; width: 400px;"> </td>';
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["event_text"] . "</td>";
                        echo "<td>" . $row["event_datetime"] . "</td>";
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
                    <h2>Add Event</h2>
                    <form action="insert_event.php" method="POST" enctype="multipart/form-data">
                        <label for="name">Event Name:</label>
                        <input type="text" id="Pname" name="Pname" required><br><br>
                        <label for="description">Description:</label>
                        <input type="text-area" id="description" name="description" required><br><br>
                        <label for="datetime">Event Date and Time:</label>
                        <input type="date" id="date" name="date" required><br><br>
                        <input type="time" id="time" name="time" required><br><br>
                        <label for="image">Upload Cover Image:</label>
                        <input type="file" id="image" name="image" required><br><br>
                        <input type="submit" value="Submit">
                    </form>
            </div>
        </div>

        <div id="editProgram" class="editProgram">
            <div class="editProgramContent">
                <span id="editCloseBtn" class="closeBtn">&times;</span>
                    <h2>Edit Event</h2>
                    <form action="update_event.php" method="POST" enctype="multipart/form-data">
                        <label for="pID">Event ID:</label>
                        <select name="pID" id="pID">
                        <?php
                            include '../dbCon.php';

                            try {
                                $stmt = $pdo->prepare("SELECT id FROM events");
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
                        <label for="name">Event Name:</label>
                        <input type="text" id="Pname" name="Pname" required><br><br>
                        <label for="description">Description</label>
                        <input type="text-area" id="description" name="description" required><br><br>
                        <label for="image">Upload Cover Image:</label>
                        <input type="file" id="image" name="image" required><br><br>
                        <label for="datetime">Event Date and Time:</label>
                        <input type="date" id="date" name="date" required><br><br>
                        <input type="time" id="time" name="time" required><br><br>
                        <input type="submit" value="Edit">
                    </form>
            </div>
        </div>

        <div id="delProgram" class="delProgram">
            <div class="delProgramContent">
                <span id="delCloseBtn" class="closeBtn">&times;</span>
                    <h2>Remove Event</h2>
                    <form action="delete_event.php" method="POST">
                        <label for="pID">Event ID:</label>
                        <select name="pID" id="pID">
                        <?php
                            include '../dbCon.php';

                            try {
                                $stmt = $pdo->prepare("SELECT id FROM events");
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
    </div>
    <script src="../assets/js/script.js"></script>
</body>
</html>

