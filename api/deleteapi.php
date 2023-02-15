<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../class/employees.php';
$database = new Database();
$db = $database->getConnection();
$item = new Employee($db);
$data = json_decode(file_get_contents("php://input"));
$stmt = $db->prepare("SELECT `username` FROM `user` WHERE `id` = ?");
$stmt->execute([$data->id]);
$user = $stmt->fetch();
if (!$user) {
    echo "id not found";
    exit();
}
$stmt = $db->prepare("DELETE FROM employees WHERE id = ?");
if ($stmt->execute([$data->id])) {
    echo json_encode("Employee deleted.");
} else {
    echo json_encode("Data could not be deleted");
}
?>