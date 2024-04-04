<?php
require(__DIR__ . '/../vendor/autoload.php');
$db_handler_class = new db_handler();
$row = $db_handler_class->update_student();
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
            <h1>Изменить</h1>
            <form class="form_authorization" action="/../src/submitForm/update.php?id=<?php echo $row['id'] ?>"  method="post">
                <div class="rule">
                        <label for="rule">Вы:</label>
                        <select name="rule" value="<?php echo $row['rule'] ?>">
                            <option value="Студент">Студент</option>
                            <option value="Педагог">Преподователь</option>
                        </select>
                </div>
                <div class="username">
                        <label for="username">Имя:</label>
                        <input type="text" name="username" placeholder="Введите Имя" required value="<?php echo $row['username'] ?>">
                </div>
                <div class="userlastname">
                        <label for="userlastname">Фамилия:</label>
                        <input type="text" name="userlastname" placeholder="Введите Фамилию" required value="<?php echo $row['userlastname'] ?>">
                </div>
                <div class="birthday">
                    <label for="birthday">День рождения:</label>
                    <input type="date" name="birthday" required value="<?php echo $row['birthday'] ?>">
                </div>
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Введите Email" required value="<?php echo $row['email'] ?>">
                </div>
                <div class="class">
                    <label for="class">Класс:</label>
                    <input type="text" name="class" placeholder="Введите Класс" required value="<?php echo $row['class'] ?>">
                </div>
                <div class="button_form_authorization">
                    <button type="submit" name="save_update_student">Сохранить</button>
                    <a href="/pages/workplace.php">Назад</a>
                </div>
                
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>