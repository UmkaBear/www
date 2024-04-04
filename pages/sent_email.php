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
    <title>Отправить Email</title>
</head>
<body>
    <header>

    </header>
    <main>
        <div class="container">
            <h1>Отравить Email</h1>
            <form class="form_authorization" action="/../src/submitForm/sentEmail.php" method="post">
                <div class="Email">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Кому:">
                </div>
                    <label for="message">Сообщение:</label>
                    <textarea name="message" id="message" required></textarea>
                <div class="button_form_authorization">
                    <button type="submit">Отправить</button>
                    <a href="workplace.php">Назад</a>
                </div>
                
            </form>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>