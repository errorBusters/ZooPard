<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us - Zoo Park</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'; ?>

    <div class="registerForm">
    <h2>Registration Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="first-name">First Name:</label><br>
            <input type="text" id="first-name" name="first_name" required>
            <br>
            <label for="last-name">Last Name:</label><br>
            <input type="text" id="last-name" name="last_name" required>
            <br>
            <label for="contact-number">Contact Number:</label><br>
            <input type="text" id="contact-number" name="contact_number" required>
            <br>
            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob" required>
            <br>
            <label for="psswd">Password:</label><br>
            <input type="password" id="psswd" name="psswd" required>
            <br>
            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <br>
            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>

<?php
    include 'dbCon.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $firstName = htmlspecialchars($_POST['first_name']);
        $lastName = htmlspecialchars($_POST['last_name']);
        $contactNumber = htmlspecialchars($_POST['contact_number']);
        $dob = htmlspecialchars($_POST['dob']);
        $password = htmlspecialchars($_POST['psswd']);
        $gender = htmlspecialchars($_POST['gender']);
    
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
        try {
            $stmt = $pdo->prepare("INSERT INTO community_members 
                (first_name, last_name, contact_number, gender, dob, email, aproval, password_enc) 
                VALUES (:first_name, :last_name, :contact_number, :gender, :dob, :email, 'not-approved', :password_enc)");
    
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':contact_number', $contactNumber);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_enc', $passwordHash);
    
            $stmt->execute();
    
            echo "<script>
                alert('Community Member Registration Successful!');
            </script>";
            header("Location: CommunityMember/index.php");
        } catch (PDOException $e) {
            echo "<script>
                alert('Error: " . addslashes($e->getMessage()) . "');
            </script>";
        }
    }
    $pdo = null;
?> 
