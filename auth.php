<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_main.css">
    <title>Авторизация</title>
    <style>
        .error {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Нарушениям.Нет</h1>
            <h2>Мы рады привествовать вас на нашем сайте!</h2>
        </header>
        <main>
            <form id="authForm">
                <label for="login">Логин: </label>
                <input type="text" id="login" name="login">
                <label for="password">Пароль: </label>
                <input type="password" id="password" name="password" placeholder="Минимально 4 символа">
                <div id="errorMessage"></div>
                <button type="submit">Войти</button>
                <div id="link">
                    Нет аккаунта? <a href="reg.php">Создать</a>
                </div>
            </form>
        </main>
    </div>
    <script src="scripts/auth.js"></script>
</body>

</html>