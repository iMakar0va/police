<?php
require "../conn.php";

session_start();
function validate($data)
{
    return htmlspecialchars(trim($data));
}

$number_car = validate($_POST['number_car']);
$comment = validate($_POST['comment']);

$user_id = $_SESSION['user_id'];

$insert_app = "INSERT into applications (user_id, number_car, comment) values ($1,$2,$3);";
$res = pg_query_params($conn, $insert_app, [$user_id, $number_car, $comment]);

if ($res) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => "Ошибка при создание формы"]);
}

pg_close($conn);
