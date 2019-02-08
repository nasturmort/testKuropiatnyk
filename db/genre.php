<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Жарны</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    <header>
        <div id="logo" onclick="slowScroll('#top')">
            <span>Книжный каталог</span>
        </div>
        <div id="about">
            <a href="/db/author.php" title="author" onclick="slowScroll('#author')">Автора</a>
            <a href="/db/genre.php" title="genre" onclick="slowScroll('#genre')">Жанры</a>
            <a href="/html/index.html" title="main" onclick="slowScroll('#main')">Главная</a>
        </div>
    </header>
<?php
require_once("function.php");
$result=result('tbGenre');
$conn=db_connect();

if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
   exit;
}
if(mysqli_num_rows($result) == 0){
    echo "Empty genre ! Something wrong! check again";
   exit;
}

$title = "Жанры";
?>
<div id="top">
<h1>Жанры книг</h1>
<h5>
<ul>
    <?php

    while($row = mysqli_fetch_assoc($result)){
        $count = 0;
        $result2 = result2('genre','tbGenre');
        if(!$result2){
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        while ($pubInBook = mysqli_fetch_assoc($result2)){
            if($pubInBook['genre'] == $row['genre']){
                $count++;
            }
        }
        ?>
        <li>
            <a href="peternBookg.php?genre_id=<?=$row['idGenre']; ?>"><?php echo $row['genre']; ?></a>
        </li>
    <?php } ?>
    <li>
        <a href="index.php">Список всех книг</a>
    </li>
</ul>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
