<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Полный список книг</title>
</head>
<body>

<?php
require_once("function.php");
$result=index_all();

if($result->num_rows>0){
    while ($row=$result->fetch_assoc()){   
        echo "<h3>".$row['bookName']."</h3><br>";
        echo $row['description']."<br>";
        echo "Атор(а): ".$row['authorName']."<br>";
        echo "Жанр(ы): ".$row['genre']."<br>"."<br>";
        echo "<p><button> <a href='/form/form.php'>Заказать</a></button></p>";
        echo "<hr>";    
    }
}else{
    echo "No data:(";
}
?>
</body>
</html>