<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pID'])) {
        $id = $_POST['pID'];

        $stmt = $pdo->prepare("DELETE FROM events WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Event deleted successfully!');</script>";
            header("Location: dashboard.php");
        } else {
            echo "<script>alert('Error deleting Event.');</script>";
        }
    }
}
?>
