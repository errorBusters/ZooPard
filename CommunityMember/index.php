<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zoo Park</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'; ?>

    <div class="registerForm">
    <h2>Login Community Member</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
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
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['psswd']);

    try {
        $stmt = $pdo->prepare("SELECT password_enc, aproval FROM community_members WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $password_enc = $result['password_enc'];
            $aproval = $result['aproval'];

            if ($aproval == 'approved') {
                if (password_verify($password, $password_enc)) {
                    $loginStat = TRUE;
                    $encodedEmail = urlencode($email);
                    echo "<script>
                        alert('Community Member Login Successful!');
                        window.location.href = 'dashboard.php?uEmail={$encodedEmail}';
                    </script>";
                    exit();
                } else {
                    echo "<script>
                        alert('Community Member Login Failed: Incorrect Password');
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Your Member Request Approval Pending. Try Again Later or Contact Zoo Park');
                </script>";
            }
        } else {
            echo "<script>
                alert('Email Not Found! Register First.');
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
