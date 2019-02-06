<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Удаление книги</title>

</head>
<body>
<?php
require_once("C:/OSPanel/domains/project/db/function.php");
delete();
?>

<form method="post">
    Удаление книги:<br/><br/>
    <label id="first"> ID книги:</label><br/>
    <input type="text" name="idBook"><br/>

    <button type="submit" name="save">Удалить</button>

</form>

</body>
</html>