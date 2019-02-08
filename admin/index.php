<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Добавление книги</title>
</head>
<body>
<?php
require_once("C:/OSPanel/domains/project/db/function.php");
//index_add();
add_3param('tbBook','idBook','bookName','description',$_POST["idBook"],$_POST["bookName"],$_POST["description"]);
add_2param('tbAuthor','idAuthor','AuthorName',$_POST["idAuthor"],$_POST["authorName"]);
add_2param('tbAuthorBook','idBook','idAuthor',$_POST["idBook"],$_POST["idAuthor"]);
add_2param('tbGenre','idGenre','genre',$_POST["idGenre"],$_POST["genre"]);
add_2param('tbGenreBook','idGenre','idBook',$_POST["idGenre"],$_POST["idBook"]);
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