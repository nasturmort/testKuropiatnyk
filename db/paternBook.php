<?php
$book_id = $_GET['pubid'];
$link = mysqli_connect('localhost', 'nasturmort', 'th340858k','Book');
if(!$link){
    echo "ERROR!";
}
if(!is_numeric($book_id)) exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
<?php
function tableGetComponent($book_id)
{
    global $link;
    $sql = "select * from tbBook as Book
        join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
        join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor 
        join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
        join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre
    WHERE AuthorBook.idAuthor = $book_id";
    $result = mysqli_query($link, $sql);
    $authors = mysqli_fetch_all($result, 1);

    return $authors;
}?>
</head>
<body>
<div class="container">
    <?php
    $getComponent = tableGetComponent($book_id); ?>
    <?php foreach ($getComponent as $value): ?>
        <div class="row">
            <div class="col-md-9">
                <div class="page-header">
                    <h1><?=$value['bookName']?> </h1>
                </div>
                <div class="post-content">
                    <?=$value['description']?>
                </div>
                <div class="post-content"><br>
                    Жанр(ы): <?=$value['genre']?>
                </div>
                <div class="post-content">
                    Автор(а): <?=$value['authorName']?>
                </div>
            </div>
        </div>
        <hr>
        <p><button> <a href="/form/form.php">Заказать</a></button></p>
   <?php endforeach; ?>
</div>
</body>
</html>