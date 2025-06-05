<?php
require "conn.php";
session_start();

$get_apps = "SELECT * from applications a join users u on u.user_id=a.user_id order by application_id;";
$res_apps = pg_query_params($conn, $get_apps, []);
$applications = pg_fetch_all($res_apps) ?: [];

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
                <h2>Администратор</h2>
                <a href="logout.php">Выйти</a>
            </div>
        </header>
        <main>
            <div class="">Список всех заявок</div>
            <?php
            if (empty($applications)): ?>
                <p>В системе нет заявок</p>
            <?php else: ?>
                <div class="cards">
                    <?php foreach ($applications as $app): ?>
                        <div class="card" data-id="<?= htmlspecialchars($app['application_id']) ?>">
                            <div class="card_id"><?= htmlspecialchars($app['application_id']) ?></div>
                            <div class="card_user"><?= htmlspecialchars($app['last_name']) . htmlspecialchars($app['first_name']) ?></div>
                            <div class="card_status"><?= htmlspecialchars($app['status']) ?></div>
                            <div class="card_car"><?= htmlspecialchars($app['number_car']) ?></div>
                            <div class="card_comment"><?= htmlspecialchars($app['comment']) ?></div>
                            <div class="status_group" <?php if ($app['status'] != "новое"): ?> style="display: none;" <?php endif ?>>
                                <label>
                                    <input type="radio" name="status_<?= $app['status'] ?>" value="подтверждено">подтверждено
                                </label>
                                <label>
                                    <input type="radio" name="status_<?= $app['status'] ?>" value="отклонено">отклонено
                                </label>
                                <button id="btnUpdate">Обновить статус</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </main>
    </div>
    <script src="scripts/update_status.js"></script>
</body>

</html>