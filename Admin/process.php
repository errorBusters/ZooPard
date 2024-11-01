<?php
include '../dbCon.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    
    try {
        if ($_GET['action'] == 'approve') {
            $stmt = $pdo->prepare("UPDATE community_members SET aproval = 'approved' WHERE id = :id");
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "<script>alert('Member approved successfully!'); window.location.href='member_manage.php';</script>";
            } else {
                echo "<script>alert('Error approving member.'); window.location.href='member_manage.php';</script>";
            }
        } elseif ($_GET['action'] == 'reject') {
            $stmt = $pdo->prepare("DELETE FROM community_members WHERE id = :id");
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                echo "<script>alert('Member rejected and deleted successfully!'); window.location.href='your_page.php';</script>";
            } else {
                echo "<script>alert('Error rejecting member.'); window.location.href='your_page.php';</script>";
            }
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location.href='your_page.php';</script>";
    }
}
?>
