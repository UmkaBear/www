<?php
require($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

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
    <title>Регистрация</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div class="container">
            <h1>Регистрация</h1>
            <form class="form_authorization" action="#" method="post">
                <div class="rule">
                        <label for="rule">Вы:</label>
                        <select name="rule">
                            <option value="student">Студент</option>
                            <option value="teacher">Преподователь</option>
                        </select>
                </div>
                <div class="username">
                        <label for="username">Имя:</label>
                        <input type="text" name="username" placeholder="Введите Имя">
                </div>
                <div class="userlastname">
                        <label for="userlastname">Фамилия:</label>
                        <input type="text" name="userlastname" placeholder="Введите Фамилию">
                </div>
                <div class="birthday">
                    <label for="birthday">День рождения:</label>
                    <input type="date" name="birthday">
                </div>
                <div class="login">
                        <label for="userlogin">Логин:</label>
                        <input type="text" name="userlogin" placeholder="Введите логин">
                </div>
                <div class="password">
                    <label for="password">Пароль:</label>
                    <input type="password" name="password" placeholder="Введите пароль">
                </div>
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Введите Email">
                </div>
                <div class="class">
                    <label for="class">Класс:</label>
                    <input type="text" name="class" placeholder="Введите Класс">
                </div>
                <div class="button_form_authorization">
                    <button type="submit">Отправить</button>
                    <a href="/./index.php">Авторизироваться</a>
                </div>
                
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>