<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страж врат</title>
</head>
<body>
<?php
if (!isset($_POST['gk'])) { ?>
    <h1>У врат.</h1>
    <p>Ты подошел к стражу. Он строго посмотрел на тебя и потребовал от тебя назваться и сказать свое секретное
        слово.</p>
    <form action="gk.php" method="post">
        <label>Назови ему свое имя:</label>
        <input type="text" name="log" size="15" maxlength="15"><br>
        <label>Скажи ему свое секретное слово:</label>
        <input type="password" name="pass" size="15" maxlength="15"><br>
        <a href="reg.php" class="button"><input type="button" value="К регистрации"></a>
        <input type="submit" name="gk" value="Назвать свои данные">
    </form>
<?php } else {
    $log = $_POST['log'];
    if ($log == '') unset($name);
    $pass = $_POST['pass'];
    if ($pass == '') unset($pass);
    if (empty($log) or empty($pass)) {
        echo "<p>Ты не назвал себя или не сказал секретное слово, попробуй ещё раз</p>
            <a href='gk.php' class='button'><input type='button' value='Попробовать снова'></a>";
    } else {
        $host = "localhost";
        $user = "root";
        $password = "321678";
        $database = "gk";
        $bd = mysqli_connect($host, $user, $password, $database);
        $sql = "SELECT * FROM visitors WHERE log='$log'";
        $result = mysqli_query($bd, $sql);
        $myrow = mysqli_fetch_array($result);
        if (empty($myrow['pass'])) {
            echo "<p>Ваше имя или секретное слово неверно, уходите!</p>
                <a href='gk.php' class='button'><input type='button' value='Уйти'></a> ";
        } else {
            if ($myrow['pass'] == $pass) {
                $_SESSION['login'] = $myrow['log'];
                $_SESSION['id'] = $myrow['id'];
                header("Location:inside.php");
            } else {
                echo "<p>Ваше имя или секретное слово неверно, уходите!</p>
                    <a href='gk.php' class='button'><input type='button' value='Уйти'></a> ";
            }
        }
    }
}
?>
</body>
</html>