<?php
require "../conn.php";

session_start();
function validate($data)
{
    return htmlspecialchars(trim($data));
}

$password = validate($_POST['password']);
$login = validate($_POST['login']);

$check_user = "SELECT * from users where login = $1;";
$res = pg_query_params($conn, $check_user, [$login]);

if (pg_num_rows($res) == 1) {
    $user = pg_fetch_assoc($res);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => "Пароль неправильный"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Логин неправильный"]);
}

pg_close($conn);
