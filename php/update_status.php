<?php
require "../conn.php";

session_start();
function validate($data)
{
    return htmlspecialchars(trim($data));
}

$data = json_decode(file_get_contents("php://input"), true);

$card_id = validate($data['card_id']);
$status = validate($data['status']);

$update_status = "UPDATE applications set status = $1 where application_id = $2;";
$res = pg_query_params($conn, $update_status, [$status, $card_id]);

if ($res) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => "Ошибка обновления"]);
}

pg_close($conn);
