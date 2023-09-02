<?php
require_once __DIR__ . "/../config/db.php";
function connectDataBase(){
    try{
    $pdo = new PDO("mysql:host=". DB_HOST . ";dbname=" . DB_NAME . ";", DB_USER, DB_PASSWORD);
    return $pdo;
    }catch (PDOException $e){
        return $e->getMessage();
    }
}

function getNotes($pdo){
    $sql = "SELECT * FROM notes";
    $stmt = $pdo->query($sql);
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $notes;
}

function addNote($pdo){
    $sql = "INSERT INTO `notes`(`note`) VALUES(?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["note"]]);

    redirect("/");
}


function redirect(string $path):void{
    header("Location: $path");
}

function deleteNote($pdo){
    $sql = "DELETE FROM `notes` WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([key($_POST)]);
}