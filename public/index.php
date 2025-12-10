<?php
require_once '../src/db.php';
require_once '../src/User.php';
$users = getUsers();

include '../views/header.php';
include '../views/users_list.php';
include '../views/footer.php';
