<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_main.css">
    <title>Регистрация</title>
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
            <form id="regForm">
                <label for="last_name">Фамилия*: </label>
                <input type="text" id="last_name" name="last_name" required>
                <label for="last_name">Имя*: </label>
                <input type="text" id="first_name" name="first_name" required>
                <label for="last_name">Отчество*: </label>
                <input type="text" id="father_name" name="father_name" required>
                <label for="last_name">Номер телефона*: </label>
                <input type="text" id="phone" name="phone" placeholder="+7(XXX)XXX-XX-XX" required>
                <label for="last_name">Почта*: </label>
                <input type="email" id="email" name="email" required>
                <label for="last_name">Логин*: </label>
                <input type="text" id="login" name="login" required>
                <label for="last_name">Пароль*: </label>
                <input type="password" id="password" name="password" placeholder="Минимально 4 символа" required>
                <div class="">* - обязательные поля</div>
                <div id="errorMessage"></div>
                <button type="submit">Зарегистрироваться</button>
                <div id="link">
                    Уже есть аккаунт? <a href="auth.php">Войти</a>
                </div>
            </form>
        </main>
    </div>
    <script src="scripts/reg.js"></script>
</body>

</html>