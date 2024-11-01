<?php
include '../dbCon.php';
$username='admin';
$password = '1234';
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

try {
    $stmt = $pdo->prepare("INSERT INTO admins (username, password_enc) VALUES (:username, :password_enc)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password_enc', $hashedPassword);
    
    $username = 'admin';

    if ($stmt->execute()) {
        echo "Admin added successfully!";
    } else {
        echo "Error adding admin.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
