<?php
require "assets/header.php";

$movie_id = $_GET['movie_id'];
if (!is_numeric($movie_id)) exit();
$movie = get_movie_by_id($movie_id);
?>

<div class="container">
    <div class="fullstory">
        <div class="fullstory-img">
            <img src="<?=$movie['image']?>" alt="@Model.SelectedMovie.Title" width="220" />
        </div>
        <div class="fullstory-text">
            <h2 class="full-title"><?=$movie['title'];?></h2>

            <table class="description">
                <tr>
                    <td>Жанр</td>
                    <td><?=$movie['category_genre'];?></td>
                </tr>
                <tr>
                    <td>Ціна</td>
                    <td><?=$movie['price'];?> ₴</td>
                </tr>
            </table>
            <h2 class="full-title">Опис фільму</h2>
            <?=$movie['content'];?>
        </div>
    </div> 
</div>

<?php
require "assets/footer.php"
?>
