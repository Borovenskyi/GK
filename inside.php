<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['id']))
header('Location:http://www.google.com/');
else { ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>У цели!</title>
</head>
<body>
<?php }
if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
    header('Location:http://www.google.com/');
}
if (!isset($_POST['out'])) { ?>
    <h1>Поздравляю у тебя все получилось <?= $_SESSION['login'] ?></h1>
    <form action="inside.php" method="post">
        <input type="submit" name="out" value="Выход">
    </form>
<?php } else {
    $_SESSION = [];
    unset($_COOKIE[session_name()]);
    session_destroy();
    header("Location:index.html");
}
?>
</body>
</html>
