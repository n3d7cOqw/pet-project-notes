<?php
require __DIR__ . "/../core/functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $pdo = connectDataBase();
    addNote($pdo);
}
