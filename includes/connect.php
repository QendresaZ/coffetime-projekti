<?php 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=coffetime", "root", "27111997");
    } catch (PDOException $e) {
        $e->getMessage();
    }
?> 