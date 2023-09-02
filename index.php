<?php
require_once "core/functions.php";
$pdo = connectDataBase();
$notes = getNotes($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заметки</title>
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <header>
        <h1>Мои Заметки</h1>
    </header>
    <div class="container">
        <form action="/actions/add.php" method="post">
            <input type="text" name="note" placeholder="Введите заметку" required>
            
            <button type="submit">Добавить</button>
        </form>
        
        <!-- Вывод заметок здесь -->
        <?php
        for($i =0; $i < count($notes); $i++){
            echo "<div class='note'>";
            echo "<p>" . $notes[$i]['note']. "</p>";
            echo "<form method='POST' action='actions/delete.php'><button type='submit' value='' name='" . $notes[$i]["id"]. "'>Удалить</form></div>";
        }
        ?>
    </div> 
</body>
</html>