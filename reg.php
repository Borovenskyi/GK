<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<?php
if (!isset($_POST["reg"])) { ?>
    <h1>Регистрация новых поситителей</h1>
    <p>Ты подошел к окну регистрации. Клерк вялым голосом сказал :”для внесения в список ваших данных назовите свое и
        имя и секретное слово которым вы будете пользоваться для прохода”.</p>
    <form action="reg.php" method="post">
        <label>Назови ему свое имя:</label>
        <input type="text" name="log" size="15" maxlength="15"><br>
        <label>Скажи ему свое секретное слово:</label>
        <input type="password" name="pass" size="15" maxlength="15"><br>
        <a href="index.html" class="button"><input type="button" value="Вернуться назад"></a>
        <input type="submit" name="reg" value="Зарегистрироваться">
    </form>
<?php } else {
    $log = $_POST['log'];
    if ($log == '') {
        unset($log);
    }
    $pass = $_POST['pass'];
    if ($pass == '') {
        unset($pass);
    }
    if (empty($log) or empty($pass)) {
        echo "<p>Вы не назвали имя или свое секретное слово, попробуйте еще раз.</p>
        <a href='reg.php' class='button'><input type='button' value='Попробовать снова'></a>";
    } else {
        $host = "localhost";
        $user = "root";
        $password = "321678";
        $database = "gk";
        $bd = mysqli_connect($host, $user, $password, $database);
        $sql = "INSERT INTO visitors (log,pass) VALUES ('$log','$pass')";
        if (mysqli_query($bd, $sql)) {
            echo "<p>Ты успешно внес свои данные в список. Теперь ты можешь пройти дальше.</p><br>
            <a href='gk.php' class='button'><input type='button' value='Подойти к вратам'></a>";
        } else {
            echo "<p>Не удалось внести твои данные, попробуй заново.</p>
            <a href='reg.php' class='button'><input type='button' value='Попробовать снова'></a>";
        }
    }
}
?>
</body>
</html>