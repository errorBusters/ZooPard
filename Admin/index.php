<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Zoo Park</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <?php //header("Location: addAdmin.php"); ?>
    <div class="registerForm">
    <h2>Login Admin</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="username">User Name:</label><br>
            <input type="text" id="uName" name="uName" required>
            <br>
            <label for="psswd">Password:</label><br>
            <input type="password" id="psswd" name="psswd" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>

<?php
include '../dbCon.php';
$loginStat = FALSE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = htmlspecialchars($_POST['uName']);
    $password = htmlspecialchars($_POST['psswd']);

    try {
        $stmt = $pdo->prepare("SELECT password_enc FROM admins WHERE username = :uname");
        $stmt->bindParam(':uname', $uName);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $password_enc = $result['password_enc'];
            
            if (password_verify($password, $password_enc)) {
                $loginStat = TRUE;
                
                echo "<script>
                    alert('Community Member Login Successful!');
                </script>";
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<script>
                    alert('Admin Login Failed: Incorrect Password');
                </script>";
            }
            
        } else {
            echo "<script>
                alert('UserName Not Found!');
            </script>";
        }

    } catch (PDOException $e) {
        echo "<script>
            alert('Error: " . addslashes($e->getMessage()) . "');
        </script>";
    }
}

$pdo = null;
?>
