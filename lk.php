<?php
require "conn.php";
session_start();

$user_id = $_SESSION['user_id'];

$get_apps = "SELECT * from applications where user_id=$1;";
$res_apps = pg_query_params($conn, $get_apps, [$user_id]);
$applications = pg_fetch_all($res_apps) ?: [];

$get_user = "SELECT * from users where user_id=$1;";
$res_user = pg_query_params($conn, $get_user, [$user_id]);
$user = pg_fetch_assoc($res_user);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_main.css">
    <title>Личный кабинет</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Нарушениям.Нет</h1>
            <div class="">
                <h2><?= $user['last_name'] . " " . $user['first_name'] ?></h2>
                <a href="logout.php">Выйти</a>
            </div>
        </header>
        <main>
            <div class="">
                <div class="">Список всех заявок</div>
                <a href="create_app.php">Подать жалобу</a>
            </div>
            <?php
            if (empty($applications)): ?>
                <p>У вас пока нет заявок</p>
            <?php else: ?>
                <div class="cards">
                    <?php foreach ($applications as $app): ?>
                        <div class="card">
                            <div class="card_id"><?= htmlspecialchars($app['application_id']) ?></div>
                            <div class="card_status"><?= htmlspecialchars($app['status']) ?></div>
                            <div class="card_car"><?= htmlspecialchars($app['number_car']) ?></div>
                            <div class="card_comment"><?= htmlspecialchars($app['comment']) ?></div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </main>
    </div>
</body>

</html>