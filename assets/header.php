<?php
include_once "assets/config.php";
include "assets/function.php";
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Сайт кінотеатру</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/main.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Include Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">CinemaCiti</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#" data-bs-toggle="modal" data-bs-target="#filtersModal">Фільтри</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalSignin">Вхід</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Modal Filter -->
    <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="filtersModalLabel">Фільтри</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form  method="get" action="category.php">
                        <div class="form-inline">
                            <label class="control-label">Жанр: </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <?php
                                $categories = get_category();
                                ?>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?=$category['id']?>"><?=$category['genre']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                            <button type="submit" class="btn btn-primary">Застосувати фільтри</button>
                            <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Закрити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sign In -->
    <div class="modal fade" id="modalSignin" tabindex="-1" aria-labelledby="modalSigninLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Вхід</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form class="login" action="login/check-login.php" method="post">
                        <div class="form-group">
                            <input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Логін">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
                        </div>
                        <button type="submit" class="details_btn formbtn">Увійти</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="autoplay">
        <?php 
        $news = get_news_with_movies(); 
        ?>
        <?php foreach ($news as $new): ?>
            <div class="slick-slide">
                <div class="slide-image">
                    <img src="<?=$new['image']; ?>" alt="<?=$new['title'];?>" class="img-fluid" />
                    <div class="overlay-content">
                        <h2 class="slide-title"><?=$new['title']?></h2>
                        <a href="movie.php?movie_id=<?=$new['id']?>" class="details_btn">Детальніше</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
