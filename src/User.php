<?php




function createUser()
{
    global $pdo;

    // Process only if no DB error
    if (empty($errorMessage)) {

        // --- GET FIELDS ---
        $username = $_POST['username'] ?? null;
        $position = $_POST['position'] ?? null;
        $about    = $_POST['about'] ?? null;
        $createdAt = date('Y-m-d H:i:s'); // current timestamp

        // --- HANDLE PHOTO UPLOAD ---
        $photoPath = null;

        if (!empty($_FILES['photo']['name'])) {




            $targetDir = "../uploads/";

            // Create folder if not exists
            if (!is_dir($targetDir)) {

                mkdir($targetDir, 0777, true);
                chmod($targetDir, 0777);
            }

            $fileName  = time() . "_" . basename($_FILES['photo']['name']);
            $photoPath = $targetDir . $fileName;



            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {

                $errorMessage = "Error uploading the photo.";
            }
        }


        // Insert only if no upload error
        if (empty($errorMessage)) {

            // --- INSERT INTO DATABASE ---
            $sql = "INSERT INTO users (username,position, about, photo_path,created_at)
        VALUES (:username,:position, :about, :photo_path,:created_at)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":position", $position);
            $stmt->bindParam(":about", $about);
            $stmt->bindParam(":photo_path", $photoPath);
            $stmt->bindParam(":created_at", $createdAt);

            if ($stmt->execute()) {
                $successMessage = "User created successfully!";
                $errorMessage = "";
            } else {
                $errorMessage = "Failed to save user.";
            }
        }
    }
}


function getUsers()
{
    global $pdo;
    $users = $pdo->query("SELECT * FROM users ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}
