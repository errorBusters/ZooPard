<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pID']) && isset($_POST['Pname']) && isset($_POST['description'])) {
        $id = $_POST['pID'];
        $name = $_POST['Pname'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "../Uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("UPDATE edu_info SET name = :name, program_text = :description, cover_image = :image WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                echo "<script>alert('Program updated successfully!');</script>";
                header("Location: dashboard.php");
            } else {
                echo "<script>alert('Error updating program.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.');</script>";
        }
    }
}
?>
