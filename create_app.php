<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_main.css">
    <title>Создание заявки</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Нарушениям.Нет</h1>
            <div class="">
                <h2></h2>
                <a href="logout.php">Выйти</a>
            </div>
        </header>
        <main>
            <form id="createForm">
                <label for="number_car">Номер машиины*:</label>
                <input type="text" id="number_car" name="number_car">
                <label for="number_car">Жалоба*:</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                <div class="">* - обязательные поля</div>
                <div id="errorMessage"></div>
                <button type="submit">Подать жалобу</button>
            </form>
        </main>
    </div>
    <script src="scripts/create_app.js"></script>
</body>

</html>