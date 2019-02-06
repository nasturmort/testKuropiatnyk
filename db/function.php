<?php
function db_connect(){
    require("config.php");
    $conn=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if($conn->connect_errno){
        echo "Connect failed".$conn->connect_error;
        exit();
    }
    return $conn;
}
function tableGetComponent($book_id)
{
    $link = db_connect();
    $book_id = $_GET['pubid'];
    //$link = mysqli_connect('localhost', 'nasturmort', 'th340858k','Book');
    if(!$link){
        echo "ERROR!";
    }
    if(!is_numeric($book_id)) exit();

    $sql = "select * from tbBook as Book
        join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
        join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor 
        join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
        join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre
    WHERE AuthorBook.idAuthor = $book_id";
    $result = mysqli_query($link, $sql);
    $authors = mysqli_fetch_all($result, 1);

    return $authors;
}
function tableGetComponentg($book_id)
{
    $link = db_connect();
    $book_id = $_GET['genre_id'];

    if(!$link){
        echo "ERROR!";
    }
    if(!is_numeric($book_id)) exit();
    $sql = "select * from tbBook as Book
        join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
        join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor 
        join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
        join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre
    WHERE GenreBook.idGenre = $book_id";
    $result = mysqli_query($link, $sql);
    $genre = mysqli_fetch_all($result, 1);

    return $genre;
}
function index_add(){
    $link = db_connect();
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO `tbBook` (idBook, bookName, description)
        VALUES ('{$_POST["idBook"]}','{$_POST["bookName"]}','{$_POST["description"]}');
        ");
        if ($sql) {
            echo '<p>Данные  успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO `tbAuthor` (idAuthor, AuthorName)
        VALUES ('{$_POST["idAuthor"]}','{$_POST["authorName"]}');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO `tbAuthorBook` (idBook, idAuthor)
        VALUES ('{$_POST["idBook"]}','{$_POST["idAuthor"]}');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO `tbGenre` (idGenre, genre)
        VALUES ('{$_POST["idGenre"]}','{$_POST["genre"]}');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO `tbGenreBook` (idGenre, idBook)
        VALUES ('{$_POST["idGenre"]}','{$_POST["idBook"]}');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
}
function form(){

}
function genre_result(){
    $conn=db_connect();
    $query = "SELECT * FROM tbGenre ORDER BY genre";
    $result = mysqli_query($conn, $query);
    return $result;
}
function genre_result2(){
    $conn=db_connect();
    //$count = 0;
    $query = "SELECT genre FROM tbGenre";
    $result2 = mysqli_query($conn, $query);
    return $result2;
}
function index_all(){
    $conn=db_connect();
    $query="select * from tbBook as Book
join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor
join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre";
    /*$query="select * from tbBook";*/
    $result=$conn->query($query);
    return $result;
}
function delete(){
    if(isset($_POST['save'])){
        $link=db_connect();
        /*$sql = mysqli_query($link, " SET FOREIGN_KEY_CHECKS=0;
     DELETE FROM `tbBook` WHERE `tbBook`.`idBook`='".$_POST["idBook"]."';
     SET FOREIGN_KEY_CHECKS=1;");*/
        $sql = mysqli_query($link, "DELETE from tbBook as Book
        join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
        join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor 
        join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
        join tbGenre as Genre on Genre.idGenre=AuthorBook.idGenre
        WHERE Genre.`idAuthor`");
        if ($sql) {
            echo '<p>Данные  успешно удалены.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
}
function author_result(){
    $conn=db_connect();

    $query = "SELECT * FROM tbAuthor ORDER BY authorName";
    $result = mysqli_query($conn, $query);
    return $result;
}
function author_result2(){
    $conn=db_connect();
    $query = "SELECT authorName FROM tbAuthor";
    $result2 = mysqli_query($conn, $query);
    return $result2;
}
?>