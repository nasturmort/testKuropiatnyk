<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form</title>
</head>
<body>
	
	<form action="submit.php" method="POST">
		<p>Имя: <input name="name" required></p>
        <p>Адрес: <input name="adress" required></p>
        <p>Количество экземпляров: <input name="count" required></p>
        <p><button class="send-email">Заказать</button></p>
	</form>
        
<footer></footer>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/cart.js"></script>
</body>
</html> 