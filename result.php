<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$username = isset($_POST['username']) ? $_POST['username'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
 
if (!$username && !$email){
    die ('{error:"bad_request"}');
}

$conn = mysqli_connect('localhost', 'root', '', 'haiquanc_db') or die ('{error:"bad_request"}');
 
$error = array(
    'error' => 'success',
    'username' => '',
    'email' => ''
);
 
// Kiểm tra tên đăng nhập
if ($username)
{
    $query = mysqli_query($conn, 'select count(*) as count from nguoidung where tendangnhap = \''.  addslashes($username).'\'');
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['username'] = 'Tên đăng nhập đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
// Kiểm tra tên email
if ($email)
{
    $query = mysqli_query($conn, 'select count(*) as count from nguoidung where email = \''.  addslashes($email).'\'');
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['email'] = 'Email đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
 
// Tiến hành lưu vào CSDL
//$query = mysqli_query($conn, "insert into nguoidung(tendangnhap, email) value ('$username','$email')");
     
// Trả kết quả về cho client
die (json_encode($error));
?>