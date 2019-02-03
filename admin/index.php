<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Добавление книги</title>
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
/*if(isset($_POST['save1'])){
    $sql = mysqli_query($link, "INSERT INTO `tbAuthor` (idAuthor, AuthorName)
        VALUES ('{$_POST["idAuthor2"]}','{$_POST["authorName2"]}');
        ");
    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}
if(isset($_POST['save1'])){
    $sql = mysqli_query($link, "INSERT INTO `tbAuthorBook` (idBook, idAuthor)
        VALUES ('{$_POST["idBook"]}','{$_POST["idAuthor2"]}');
        ");
    if ($sql) {
        echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}*/
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
?>

<form method="post">
    Добавление книги:<br/><br/>
    <label id="first"> ID книги:</label><br/>
    <input type="text" name="idBook"><br/>

    <label id="first"> Название книги:</label><br/>
    <input type="text" name="bookName"><br/>

    <label id="first">Описание: </label><br/>
    <input type="text" name="description"><br/>

    <label id="first">Автор ID: </label><br/>
    <input type="text" name="idAuthor"><br/>

    <label id="first">Автор: </label><br/>
    <input type="text" name="authorName"><br/>

    <!--<label id="first">Автор ID2: </label><br/>
    <input type="text" name="idAuthor"><br/>

    <label id="first">Автор2: </label><br/>
    <input type="text" name="authorName"><br/>-->

    <label id="first">Жанр ID: </label><br/>
    <input type="text" name="idGenre"><br/>

    <label id="first">Жанр: </label><br/>
    <input type="text" name="genre"><br/>

    <button type="submit" name="save">save</button>
    <!--<button type="submit" name="save1">добавить автора 2</button>-->

</form>

</body>
</html>