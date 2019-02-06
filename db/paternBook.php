<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container">
    <?php
    require_once("function.php");
    $getComponent = tableGetComponent($book_id); ?>
    <?php foreach ($getComponent as $value): ?>
        <div class="row">
            <div class="col-md-9">
                <div class="page-header">
                    <h1><?=$value['bookName']?> </h1>
                </div>
                <div class="post-content">
                    <?=$value['description']?>
                </div>
                <div class="post-content"><br>
                    Жанр(ы): <?=$value['genre']?>
                </div>
                <div class="post-content">
                    Автор(а): <?=$value['authorName']?>
                </div>
            </div>
        </div>
        <hr>
        <p><button> <a href="/form/form.php">Заказать</a></button></p>
   <?php endforeach; ?>
</div>
</body>
</html>