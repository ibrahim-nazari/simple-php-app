
<?php

$db_file = __DIR__ . '/../storage/database.sqlite';
$pdo = null;
$successMessage = "";
$errorMessage   = "";
try {
    $pdo = new PDO("sqlite:{$db_file}");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if not exists
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT,
            position TEXT,
            about TEXT,
            photo_path TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ");
} catch (PDOException $e) {
    $errorMessage = "Database Error: " . $e->getMessage();
}


function timeAgo($datetime)
{

    $now = new DateTime();
    $time = new DateTime($datetime);
    $diff = $now->diff($time);
    $string = "";


    if ($diff->y > 0) {
        $string = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    } elseif ($diff->m > 0) {
        $string = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d > 0) {
        $string = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h > 0) {
        $string = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i > 0) {
        $string = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
    } else {
        $string = 'Just now';
    }


    return $string;
}
