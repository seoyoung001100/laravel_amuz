<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo "DB 연결에 실패했습니다.";
    exit;
}
echo "DB 연결에 성공했습니다.";