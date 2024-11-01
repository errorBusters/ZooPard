<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['pID']) && !empty($_POST['Pname']) && !empty($_POST['description']) && !empty($_POST['date']) && !empty($_POST['time'])) {
        $id = $_POST['id'];
        $name = $_POST['Pname'];
        $description = $_POST['description'];
        $eventDate = $_POST['date'];
        $eventTime = $_POST['time'];
        $datetimeEvent = $eventDate . ' ' . $eventTime;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $target_dir = "../Uploads/";
            $target_file = $target_dir . basename($image);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $stmt = $pdo->prepare("UPDATE events SET name = :name, event_text = :description, event_datetime = :eventDate, event_image = :image WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':eventDate', $datetimeEvent, PDO::PARAM_STR);
                $stmt->bindParam(':image', $image, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    echo "<script>alert('Event updated successfully!');</script>";
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Error updating event.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            $stmt = $pdo->prepare("UPDATE events SET name = :name, event_text = :description, event_datetime = :eventDate WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':eventDate', $datetimeEvent, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "<script>alert('Event updated successfully!');</script>";
                header("Location: dashboard.php");
                exit();
            } else {
                echo "<script>alert('Error updating event.');</script>";
            }
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>
