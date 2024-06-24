<?php
$conn = mysqli_connect('sql108.infinityfree.com', 'if0_36756299', 'Pp4Xd16SyKb8', ' if0_36756299_itblog');
mysqli_set_charset($conn, 'utf8');
if (mysqli_connect_errno()){
    echo 'Помилка підключення до БД ('.mysqli_connect_errno().'):'.mysqli_connect_error();
    exit();
}