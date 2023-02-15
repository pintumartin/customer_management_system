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
$item->id = $data->id;
if (isset($data->id) && $data->id != NULL) {
    $item->id = $data->id;
}
if (isset($data->username) && $data->username != NULL) {
    $item->username = $data->username;
}
if (isset($data->email) && $data->email != NULL) {
    $item->email = $data->email;
}
if (isset($data->password) && $data->password != NULL) {
    $item->password = md5($data->password);
}
if (isset($data->profile_pic) && $data->profile_pic != NULL) {
    $item->profile_pic = $data->profile_pic;
}
if (isset($data->gender) && $data->gender != NULL) {
    $item->gender = $data->gender;
}
if (isset($data->mobile) && $data->mobile != NULL) {
    $item->mobile = $data->mobile;
}
if (isset($data->city) && $data->city != NULL) {
    $item->city = $data->city;
}
if (isset($data->languages) && $data->languages != NULL) {
    $item->languages = $data->languages;
}

if ($item->updateEmployee()) {
    echo json_encode(["message" => "Employee data updated."]);
} else {
    echo json_encode(["error" => "Data could not be updated"]);
}

?>