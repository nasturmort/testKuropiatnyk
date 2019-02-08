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
function tableGetComponent($book_id,$table,$column)
{
    $link = db_connect();
    if(!$link){
        echo "ERROR!";
    }
    if(!is_numeric($book_id)) exit();
    $sql = "select * from tbBook as Book
        join tbAuthorBook as AuthorBook on AuthorBook.idBook=Book.idBook
        join tbAuthor as Author on Author.idAuthor=AuthorBook.idAuthor 
        join tbGenreBook as GenreBook on GenreBook.idBook=Book.idBook
        join tbGenre as Genre on Genre.idGenre=GenreBook.idGenre
    WHERE $table.$column = $book_id";
    $result = mysqli_query($link, $sql);
    $array = mysqli_fetch_all($result, 1);
    return $array;
}
function add_2param($table,$column1,$column2,$value1,$value2){
    $link = db_connect();
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO $table ($column1, $column2)
        VALUES ('$value1','$value2');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
}
function add_3param($table,$column1,$column2,$column3,$value1,$value2,$value3){
    $link = db_connect();
    if(isset($_POST['save'])){
        $sql = mysqli_query($link, "INSERT INTO $table ($column1, $column2,$column3)
        VALUES ('$value1','$value2','$value3');
        ");
        if ($sql) {
            echo '<p>Данные успешно добавлены в таблицу.</p>';
        } else {
            echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
        }
    }
}
function result($table){
    $conn=db_connect();
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    return $result;
}
function result2($column, $table){
    $conn=db_connect();
    $query = "SELECT $column FROM $table";
    $result2 = mysqli_query($conn, $query);
    return $result2;
}
function select_all($table_name){
    $conn=db_connect();
    $query="select * from $table_name ";
    $result=$conn->query($query);
    return $result;
}
function delete(){
    if(isset($_POST['save'])){
        $link=db_connect();
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
?>