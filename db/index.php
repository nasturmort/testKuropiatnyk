<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Полный список книг</title>
</head>
<body>

<?php
require_once("connection.php");

$query="select * from tbBook as Book
join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor
join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre";
/*$query="select * from tbBook";*/
$result=$conn->query($query);

if($result->num_rows>0){
    while ($row=$result->fetch_assoc()){   
        echo "<h3>".$row['bookName']."</h3><br>";
        echo $row['description']."<br>";
        echo "Атор(а): ".$row['authorName']."<br>";
        echo "Жанр(ы): ".$row['genre']."<br>"."<br>";
        echo "<p><button> <a href='/form/form.php'>Заказать</a></button></p>";
        echo "<hr>";    
    }
}else{
    echo "No data:(";
}
?>
</body>
</html>