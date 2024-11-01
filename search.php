<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchValue = trim($_POST['search']);
    if (!empty($searchValue)) {
        switch ($searchValue) {
            case 'about':
                header("Location: index.php#aboutUsSection");
                break;
            case 'map':
                header("Location: index.php#aboutUsSection");
                break;
            case 'contact':
                header("Location: index.php#contactUsSection");
                break;
            case 'outlet':
                header("Location: index.php#foodOutlet");
                break;
            case 'events':
                header("Location: events.php");
                break;
                case 'education':
                    header("Location: eduProgram.php");
                    break;
            default:
                echo "Section not found.";
                break;
        }
        exit;
    } else {
        echo "Search field is empty.";
    }
} else {
    echo "Invalid request method.";
}
?>
