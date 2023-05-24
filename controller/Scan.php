<?php
include('../models/config.php');


$result = $_POST['decodedText'];

$sql = "SELECT * FROM Attendee WHERE Name = '$result' ";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $name, $email, $Address,$Image);
$data = array();

while (mysqli_stmt_fetch($stmt)) {
    $row = array(
        'name' => $name,
        'email' => $email,
        'Address'=> $Address,
        'Image'=> $Image
    );
    $data[] = $row;
}


header('Content-Type: application/json');
echo json_encode($data);





?>