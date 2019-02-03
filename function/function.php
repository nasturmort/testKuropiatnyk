<?php
function tableGetComponent($book_id)
{
    global $link;
    $sql = "SELECT * FROM table_book AS A JOIN table_authorsOfBook AS B ON A.IdBook = B.IdBook JOIN table_authors AS C ON B.IdAuthor = C.IdAuthor 
        WHERE B.IdAuthor = $book_id";
    $result = mysqli_query($link, $sql);
    $authors = mysqli_fetch_all($result, MYSQL_ASSOC);

    return $authors;
}
?>