<?php
include '../../includes/connect.php';
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: ../login/php");
}

if($_SESSION['isAdmin'] == 0) {
    echo 'Not Authorized';
    exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = "DELETE FROM about WHERE id = :id";
$query = $pdo->prepare($query);

$query->execute(['id' => $id]);

header("Location: about.php");
