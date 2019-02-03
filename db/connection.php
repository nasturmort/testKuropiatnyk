<?php
$host='project';
$user='nasturmort';
$pass='th340858k';
$dbse='Book';

$conn=new mysqli($host,$user,$pass,$dbse);
if($conn->connect_errno){
    echo "Connect failed".$conn->connect_error;
    exit();
}
?>