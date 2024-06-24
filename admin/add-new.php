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

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Додати новий фільм</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Додання нового фільму</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="check-new.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title" class="form-label">Назва фільму</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">Опис</label>
                        <textarea class="form-control" id="content" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fileName" class="form-label">Посилання на зображення</label>
                        <input type="file" class="form-control" id="fileName" name="image">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Ціна</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="form-label">Жанр</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <?php
                            $categories = get_category();
                            foreach ($categories as $category):
                            ?>
                                <option value="<?=$category['id']?>"><?=$category['genre']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="details_btn">Додати фільм</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>