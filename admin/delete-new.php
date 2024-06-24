<?php
include_once "../assets/config.php";
include "../assets/function.php";

$movie_id = $_GET['movie_id'];
if (!is_numeric($movie_id)) exit();
delete_new($movie_id);

header('location: ../index.php');
?>

<?php
$db = new PDO('mysql:host=sql108.infinityfree.com;dbname=if0_36756299_itblog', 'if0_36756299', 'Pp4Xd16SyKb8');
$db->exec("SET CHARACTER SET utf8");
$db->exec("SET NAMES utf8");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();
$login = 'admin';
$pass = '1234';
if ($_SESSION["login"] !== $login && $_SESSION["password"] !== $pass) {
    header('location: ../index.php');
}

//обробника для завантаження файлу
if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] !=""){
    move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" .$_FILES["image"]["name"]);
    $fileName = "../img/" . $_FILES["image"]["name"];
} else {
    $fileName = "../img/no-image.jpg";
}

$sql = "UPDATE movies SET title = :title, image = :image, content = :content, price = :price, category_id = :category_id WHERE id = :id";

$stmt = $db->prepare($sql);
$stmt->bindValue(":title", $_POST["title"]);
$stmt->bindValue(":image", substr($fileName, 3));
$stmt->bindValue(":price", $_POST["price"]);
$stmt->bindValue(":content", $_POST["description"]);
$stmt->bindValue(":category_id", $_POST["category_id"]);
$stmt->bindValue(":id", $_POST["id"]); 
$stmt->execute();

header("Location: index.php");
