<?php
require_once('assets/header.php');
?>
<div class="container">
    <div class="row">
        <?php
        $category_id = $_GET['category_id'];
        $movies = get_movie_by_category($category_id);
        ?>
        <?php foreach ($movies as $movie): ?>
            <div class="col-md-6 mb-4">
                <div class="movie-block border rounded overflow-hidden shadow-sm h-250">
                    <div class="movie-image">
                        <img src="<?=$movie['image']; ?>" alt="<?=$movie['title'];?>" class="img-fluid" />
                    </div>
                    <div class="movie-info p-4 d-flex flex-column justify-content-between">
                        <div class="movie-text">
                            <strong class="movie-title d-inline-block mb-2 text-success-emphasis">
                                <?=$movie['title'];?>
                            </strong>
                            <div class="movie-genre mb-1 text-muted">
                                <?=$movie['category_genre'];?>
                            </div>
                            <div class="movie-btn border rounded overflow-hidden shadow-sm h-250 d-flex">
                                <a href="movie.php?movie_id=<?=$movie['id']?>" class="details">Детальніше</a>
                                <span class="movie-price">
                                    <?=$movie['price'];?> ₴
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require "assets/footer.php"
?>