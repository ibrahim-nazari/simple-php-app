<?php
require_once '../src/db.php';
require_once '../src/User.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createUser();
    header('Location: index.php');
    exit;
}
include '../views/header.php';
include '../views/create_user.php';
include '../views/footer.php';
