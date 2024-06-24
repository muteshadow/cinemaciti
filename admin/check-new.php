<?php
session_start();
$login = 'admin';
$pass = '1234';

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== $login || $_SESSION["password"] !== $pass) {
    header('location: ../index.php');
    exit;
}

$fileName = "";
if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != "") {
    $uploadDir = "../img/";
    $fileName = $uploadDir . $_FILES["image"]["name"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileName)) {
    } else {
        echo "Помилка при завантаженні файлу зображення.";
        exit;
    }
} else {
    $fileName = "../img/no-image.jpg";
}

try {
    $db = new PDO('mysql:host=sql108.infinityfree.com;dbname=if0_36756299_itblog', 'if0_36756299', 'Pp4Xd16SyKb8');
    $db->exec("SET CHARACTER SET utf8");
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO movies (title, image, price, content, category_id) 
            VALUES (:title, :image, :price, :content, :category_id)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":title", $_POST["title"]);
    $stmt->bindValue(":image", substr($fileName, 3));
    $stmt->bindValue(":price", $_POST["price"]);
    $stmt->bindValue(":content", $_POST["description"]);
    $stmt->bindValue(":category_id", $_POST["category_id"]);
    $stmt->execute();

    header("Location: index.php");
} catch(PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>