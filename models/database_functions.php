<?php
function getPubName($conn, $pubid){
    $query = "SELECT authorName FROM tbAuthor WHERE idAuthor = '$pubid'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    if(mysqli_num_rows($result) == 0){
        echo "Empty books ! Something wrong! check again";
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    return $row['publisher_name'];
}

function getAll($conn){
    $query = "SELECT * from books ORDER BY book_isbn DESC";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
    }
    return $result;
}
?>