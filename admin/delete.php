<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Удаление книги</title>
    <?php
    $host='project';
    $user='nasturmort';
    $pass='th340858k';
    $db_name = 'Book';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
    }
    ?>
</head>
<body>
<?php
if(isset($_POST['save'])){
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

?>

<form method="post">
    Удаление книги:<br/><br/>
    <label id="first"> ID книги:</label><br/>
    <input type="text" name="idBook"><br/>

    <button type="submit" name="save">Удалить</button>

</form>

</body>
</html>