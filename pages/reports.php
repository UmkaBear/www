<?php
session_start();
require(__DIR__ . '/../vendor/autoload.php');
$db_handler_class = new db_handler();
if (!$_SESSION['LoggedIn']) {
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/./assets/CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="/./assets/CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <title>Отчеты</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="container">
            <div class="button_place">
                <a class="button_p" href="workplace.php">Назад</a>
            </div>
            <div>
                <table>
                    <p>Педогогический состав:</p>
                    <thead>
                        <tr>
                            <th>Роль</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Дата рождения</th>
                            <th>Класс</th>
                            <th>Email</th>
                            <th>Кол. студентов</th>
                            <?php
                            if ($_SESSION['rule']) {
                                echo "<th>Изменить</th>";
                                echo "<th>Удалить</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_handler_class->show_teacher();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>