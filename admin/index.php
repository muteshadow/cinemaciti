<?php
include_once "../assets/config.php";
include "../assets/function.php";

session_start();
$login = 'admin';
$pass = '1234';

if ($_SESSION["login"] !== $login && $_SESSION["password"] !== $pass){
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Адмін-панель</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2>Адміністративна панель</h2>
            </div>
            <div class="col-2">
                <a href="logout.php" class="details_btn">Вихід</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Назва фільму</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $movies = get_movies();
                    ?>
                    <?php foreach ($movies as $movie): ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?=$movie['id']?></th>
                            <td><?=$movie['title']?></td>
                            <td class="admin_btn">
                                <a href="edit-new.php?movie_id=<?=$movie['id']?>" class="details_btn edit">Редагувати</a>
                                <a href="delete-new.php?movie_id=<?=$movie['id']?>" class="details_btn delete">Видалити</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>
                <a href="add-new.php" class="details_btn create">Додати новину</a>
            </div>
        </div>
    </div>
</body>
</html>