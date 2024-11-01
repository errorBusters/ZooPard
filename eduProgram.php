<?php include 'dbCon.php'?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Park Events</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.html'?>
    
    <div class='comContent'>
        
        <?php
            $stmt = $pdo->prepare("SELECT id, name, cover_image, program_text FROM edu_info");
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                foreach ($results as $row) {
                    $imagepath = 'Uploads/' . $row["cover_image"];

                    if (file_exists($imagepath)) {
                        $content = $imagepath;
                    } else {
                        $content = 'Uploads/default.png';
                    }

                    echo "<div style='background-color:#ffff; height: 50%; width:30%; margin-top:10px; margin-left: 10px; border: 5x solid #0ec746; border-radius: 20px;'>"
                    ."<img src='" . htmlspecialchars($content, ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . "' style='margin-left:10px; margin-top: 10px; height: 50%; width: 90%;'><br>"
                    ."<h4 style='color: black; font-size:14pt; font-weight: bold;'>" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</h4><br>"
                    ."<p>" . htmlspecialchars($row["program_text"], ENT_QUOTES, 'UTF-8') . "</p>"
                    ."</div>";
                    }
            } else {
                echo "<div style='background-color:#ffff; height: 50%; width:30%; margin-left: 10px; border: none; border-radius: 20px;'>"
                    ."<p>No Events found</p>"
                ."</div>";
            }

        ?>
    </div>