<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Pname']) && isset($_POST['description'])) {
        $name = $_POST['Pname'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "../Uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("INSERT INTO edu_info (name, program_text, cover_image) VALUES (:name, :description, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                echo "<script>alert('Program added successfully!');</script>";
                header("Location: dashboard.php");
            } else {
                echo "<script>alert('Error adding program.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.');</script>";
        }
    }
}
?>
