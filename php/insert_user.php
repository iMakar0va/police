<?php
require "../conn.php";

function validate($data)
{
    return htmlspecialchars(trim($data));
}

$last_name = validate($_POST['last_name']);
$fisrt_name = validate($_POST['first_name']);
$father_name = validate($_POST['father_name']);
$phone = validate($_POST['phone']);
$email = validate($_POST['email']);
$password = validate($_POST['password']);
$login = validate($_POST['login']);

$hash_password = password_hash($password, PASSWORD_DEFAULT);

$check_user = "SELECT * from users where login = $1;";
$res = pg_query_params($conn, $check_user, [$login]);

if (pg_num_rows($res) > 0) {
    echo json_encode(['success' => false, 'message' => "Неуникальный логин"]);
    pg_close($conn);
    exit;
}

$insert_user = "INSERT into users (last_name,first_name,father_name,phone,email,login,password) values ($1,$2,$3,$4,$5,$6,$7);";
$res = pg_query_params($conn, $insert_user, [$last_name, $fisrt_name, $father_name, $phone, $email, $login, $hash_password]);

if ($res) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => "Ощибка регистрации"]);
}
pg_close($conn);
