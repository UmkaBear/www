<?php
session_start();
require(__DIR__ . '/../vendor/autoload.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
    <title>Удалить?</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div class="container">
            <form class="form_authorization" action="" method="GET">
            <h1>Удалить ученика?</h1>
            <div class="button_form_authorization">
                <a href="/../src/submitForm/delete.php?id=<?php echo $id; ?>">Подтвердить</a>
                <a href="workplace.php" class="close">Закрыть окно</a>
            </div>
        </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>