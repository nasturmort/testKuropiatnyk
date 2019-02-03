<?php
    require_once ("db/author.php");
    require_once ("models/books.php");
    $link=db_connect();
    $book=book_get($link,$_GET['id']);
    include ("paternBook.php");
?>