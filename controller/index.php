<?php 
if(isset($_POST['name'])){
 include('../models/config.php');
include("../phpqrcode/qrlib.php");



$name = $_POST['name'];


$tempDir = "./Folder/";


$codeContents = $_POST['name'];


$fileName = '005_file_'.md5($codeContents).'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = $tempDir.$fileName;

if(!$urlRelativeFilePath == null){
$sql = "INSERT INTO Attendee (Name, Email, Address, Image) values(?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $Address, $Image);
$email = $_POST['email'];
$Address = $_POST['Adress'];
$Image =$urlRelativeFilePath;
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

// Close the prepared statement and the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
}






if(!file_exists($pngAbsoluteFilePath)){
QRcode::png($codeContents, $pngAbsoluteFilePath);
echo 'Here IS Your QRcode ';
echo '<hr />';
}else{
   
};


echo '<img src="'.$urlRelativeFilePath.'" />';



  
    header("Location: ../Attendee.html?value=".urlencode($urlRelativeFilePath));



}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="name">
            <input type="eamil" placeholder="Email" name="email">
              <input type="eamil" placeholder="Email" name="Adress">
  <input type="text" placeholder="Password"  name="psd">
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php  
}
?>