<?php
include '../dbCon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Pname']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['time'])) {
        $name = $_POST['Pname'];
        $description = $_POST['description'];
        $eventDate = $_POST['date'];
        $eventTime = $_POST['time'];
        $image = $_FILES['image']['name'];
        $target_dir = "../Uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $datetimeEvent=$eventDate.' '.$eventTime;
        

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("INSERT INTO events (name, event_text, event_datetime, event_image) VALUES (:name, :description, :eventDate, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':eventDate', $datetimeEvent);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                echo "<script>alert('Event added successfully!');</script>";
                header("Location: dashboard.php");
                exit(); 
            } else {
                echo "<script>alert('Error adding event.');</script>";
            }
        } else {
            echo "<script>alert('Error uploading file.');</script>";
        }
    }
}
?>
