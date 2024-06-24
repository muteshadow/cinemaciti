<?php 
function get_category(){
    global $conn;

    $sql = "SELECT * FROM category";

    $result = mysqli_query($conn, $sql);
    $category = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $category;
}

function get_movies(){
    global $conn;
    
    $sql = "SELECT * FROM movies";

    $result = mysqli_query($conn, $sql);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $movies;
}

function get_news(){
    global $conn;
    
    $sql = "SELECT * FROM news";

    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $news;
}

function get_news_with_movies() {
    global $conn;
    
    $sql = "SELECT news.image, movies.title, movies.id 
            FROM news 
            JOIN movies ON news.movie_id = movies.id";
    $result = mysqli_query($conn, $sql);
    
    if ($result === false) {
        return [];
    }

    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $news;
}

function get_movies_with_category_genre(){
    global $conn;
    
    $sql = "SELECT movies.*, category.genre AS category_genre 
            FROM movies 
            LEFT JOIN category ON movies.category_id = category.id";

    $result = mysqli_query($conn, $sql);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $movies;
}

function get_movie_by_id ($movie_id){
    global $conn;
    $sql = "SELECT movies.*, category.genre AS category_genre 
            FROM movies 
            LEFT JOIN category ON movies.category_id = category.id
            WHERE movies.id = '$movie_id'";            

    $result = mysqli_query($conn, $sql);
    $movie = mysqli_fetch_assoc($result);

    return $movie;
}

function get_movie_by_category($category_id){
    global $conn;
    $category_id=mysqli_real_escape_string($conn, $category_id);
    $sql = "SELECT movies.*, category.genre AS category_genre 
            FROM movies 
            LEFT JOIN category ON movies.category_id = category.id
            WHERE movies.category_id = '$category_id'";  
    
    $result = mysqli_query($conn, $sql);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $movies;
}

function delete_new ($movie_id) {
    global $conn;
    $movie_id = mysqli_real_escape_string($conn, $movie_id);
    $sql = "DELETE FROM movies WHERE id =" .$movie_id;
    
    $result = mysqli_query($conn, $sql);
}