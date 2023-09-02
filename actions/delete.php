<?php

require_once __DIR__ ."/../core/functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $pdo = connectDataBase();
    deleteNote($pdo);
    redirect("/");
}