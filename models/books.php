<?php
function books_all($link){

}

function book_get($link, $id){
    $query=sprintf("select * from thBook where id=%id",(int)$id);
    $result=mysqli_query($link,$query);
    if(!$result) die (mysqli_error($link));
    $book=mysqli_fetch_assoc($result);
    return $book;
}
?>