<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pID'])) {
        $id = $_POST['pID'];

        $stmt = $pdo->prepare("DELETE FROM edu_info WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Program deleted successfully!');</script>";
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Error deleting program.');</script>";
        }
    }
}
?>
